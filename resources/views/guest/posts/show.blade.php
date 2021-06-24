@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-4">
            <div class="card-body">

              <h1 class="card-title">{{ucfirst($post->title)}}</h1>

              @if ($post->category)
                <div class="mt-3 mb-2">
                  <span class="badge badge-primary p-1 mr-1"><i class="fas fa-utensils"></i> Categoria</span>
                  <a class="align-middle text-dark" href="{{route("category-page", ["slug" => $post_category->slug])}}">{{$post_category->name}}</a>
                </div>
              @endif

              @if ($post->tags)
                <div class="mt-2 mb-3">
                  <span class="badge badge-info text-white p-1 mr-1"><i class="fas fa-tag"></i> Tag</span>
                  <a class="align-middle text-dark" href="{{route("category-page", ["slug" => $post_category->slug])}}">{{$post_category->name}}</a>
                </div>
              @endif

              <p class="card-text text-secondary">{{$post->content}}</p>

            </div>
        </div>

    </div>

@endsection