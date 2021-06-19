@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Ultime news</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 ">
                    <div class="card" style="margin: 10px 0">
                        <div class="card-body">
                          <h4 class="card-title">{{ucfirst($post->title)}}</h4>
                          <p class="card-text" style="color:#6c757d;">{{substr($post->content, 0, 150)}}...</p>
                          <a href="{{route("blog-page", ["slug" => $post->slug])}}" class="btn btn-primary">Leggi il post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection