<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function index() {

        // $posts = Post::all();
        $posts = Post::orderBy('id', 'DESC')->get();

        $data = [
            "posts" => $posts
        ];

        return view("guest.posts.index", $data);
    }

    public function show($slug) {

        $post = Post::where("slug", "=", $slug)->first();

        if (!$post) {
            abort("404");
        }

        $data = [
            "post" => $post,
            "post_category" => $post->category,
            "post_tags" => $post->tags
        ];

        return view("guest.posts.show", $data);
    }
}
