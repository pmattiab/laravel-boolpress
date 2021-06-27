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

              {{-- @if ($post_tags->toArray()) --}}
              @if ($post_tags->isNotEmpty())
                <div class="mt-2 mb-3">
                    <span class="badge badge-danger text-white p-1 mr-1"><i class="fas fa-tag"></i> Tag</span>
                    @foreach ($post_tags as $tag)
                      <a class="align-middle text-dark" href="{{route("tag-page", ["slug" => $tag->slug])}}">{{$tag->name}}</a>{{$loop->last ? "" : ","}}
                    @endforeach
                </div>
              @endif
              <p class="card-text text-secondary">{{$post->content}}</p>
            </div>
            <div class="text-secondary position-absolute" style="top: 20px; right: 20px; font-size: 13px;">
              <span>creato il: {{$post->created_at->format("d/m/Y")}}</span>
            </div>
        </div>
        <div class="mt-3">
          <a class="btn btn-secondary" href="{{route("blog")}}"><i class="far fa-arrow-alt-circle-left mr-1"></i>Torna al blog</a>
        </div>
    </div>
@endsection