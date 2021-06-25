@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>{{ucfirst($tag->name)}}</h1>

        <div class="row">
            @foreach ($tag->posts as $post)
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                          <h4 class="card-title">{{$post->title}}</h4>
                          <p class="card-text text-secondary">{{substr($post->content, 0, 250)}}...</p>
                          <a href="{{route("blog-page", ["slug" => $post->slug])}}" class="btn btn-primary">
                            <i class="far fa-file-alt"></i> Leggi il post
                          </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection