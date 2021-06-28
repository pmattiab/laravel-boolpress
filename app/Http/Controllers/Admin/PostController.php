<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'DESC')->get();

        $data = [

            "posts" => $posts
        ];

        return view("admin.posts.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            "categories" => $categories,
            "tags" => $tags
        ];

        return view("admin.posts.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        // Creiamo lo slug
        $post_slug = Str::slug($form_data["title"], "-");
        $base_slug = $post_slug;

        // Cerchiamo un post con lo stesso slug del posto che stiamo inserendo
        $post_existing_slug = Post::where("slug", "=", $post_slug)->first();
        $counter = 2;

        // Finchè troverà uno slug uguale già esistente
        while ($post_existing_slug) {

            // aggiungiamo - e il numero del counter
            $post_slug = $base_slug . "-" . $counter;

            // incrementiamo il counter
            $counter++;

            // e cerchiamo di nuovo se esiste già
            $post_existing_slug = Post::where("slug", "=", $post_slug)->first();
        }

        // se non entra (o non entra più) nel while
        // salviamo lo slug nel form data
        $form_data["slug"] = $post_slug;

        // cover-image
        if (isset($form_data["cover-image"])) {
            $img_path = Storage::put("posts-cover", $form_data["cover-image"]);

            if ($img_path) {
                $form_data["cover"] = $img_path;
            }
        }

        // e creiamo l'istanza
        $post = new Post();
        $post->fill($form_data);
        $post->save();

        // tags[]
        if (isset($form_data["tags"]) && is_array($form_data["tags"])) {
            $post->tags()->sync($form_data["tags"]);
        }

        return redirect()->route("admin.posts.show", ["post" => $post->id])->with("success", "Salvataggio avvenuto correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            "post" => $post,
            "post_category" => $post->category,
            "post_tags" => $post->tags
        ];

        return view("admin.posts.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ];

        return view("admin.posts.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());
        
        $form_data = $request->all();

        $post = Post::find($id);

        // Impostiamo lo slug di default
        $form_data["slug"] = $post->slug;

        // Se il titolo viene cambiato, anche lo slug cambierà
        if($form_data["title"] != $post->title) {

            // Creiamo lo slug
            $new_slug = Str::slug($form_data["title"], '-');
            $base_slug = $new_slug;

            // Cerchiamo un post con lo stesso slug del posto che stiamo inserendo
            $post_existing_slug = Post::where("slug", "=", $new_slug)->first();
            $counter = 2;

            // Finchè troverà uno slug uguale già esistente
            while ($post_existing_slug) {

                // aggiungiamo - e il numero del counter
                $new_slug = $base_slug . "-" . $counter;

                // incrementiamo il counter
                $counter++;

                // e cerchiamo di nuovo se esiste già
                $post_existing_slug = Post::where("slug", "=", $new_slug)->first();
            }

            // Quando finalmente troviamo uno slug libero, popoliamo i data da salvare
            $form_data["slug"] = $new_slug;
        }

        $post->update($form_data);

        if (isset($form_data["tags"]) && is_array($form_data["tags"])) {
            $post->tags()->sync($form_data["tags"]);
        } else {
            $post->tags()->sync();
        }
        
        return redirect()->route("admin.posts.show", ["post" => $post->id])->with("success", "Salvataggio avvenuto correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route("admin.posts.index")->with("success", "Cancellazione avvenuta correttamente");
    }

    private function getValidationRules() {
        return [
            "title" => "required|max:50",
            "content" => "required|max:65000",
            "category_id" => "nullable|exists:categories,id",
            "tags" => "nullable|exists:tags,id",
            "cover-image" => "nullable|image"
        ];
    }
}