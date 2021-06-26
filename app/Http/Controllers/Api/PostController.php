<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function index() {

        $posts = Post::all();

        $response_posts = [];
        foreach ($posts as $post) {

            $response_posts[] = [
                "id" => $post->id,
                "title" => $post->title,
                "content" => $post->content,
                "category" => $post->category ? $post->category->name : "",
                "tags" => $post->tags->toArray()
            ];
        }

        $result = [
            "posts" => $response_posts,
            "success" => true
        ];

        return response()->json($result);
    }
}