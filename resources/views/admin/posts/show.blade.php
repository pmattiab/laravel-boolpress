@extends('layouts.app')

@section('content')

    <div class="container">
        @include("partials.success-error-messages")

        <div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ucfirst($post->title)}}</h2>
                    <div class="mt-3 mb-2">
                        <span class="badge badge-success p-1 mr-1"><i class="fas fa-link"></i> Slug</span>
                        <span class="align-middle">{{$post->slug}}</span>
                    </div>
                    @if ($post->category)
                        <div class="mt-2 mb-2">
                            <span class="badge badge-primary p-1 mr-1"><i class="fas fa-utensils"></i> Categoria</span>
                            <a class="align-middle text-dark" href="{{route("category-page", ["slug" => $post_category->slug])}}">{{$post_category->name}}</a>
                        </div>
                    @endif

                    @if ($post_tags)
                        <div class="mt-2 mb-3">

                            <span class="badge badge-danger text-white p-1 mr-1"><i class="fas fa-tag"></i> Tag</span>

                            @foreach ($post_tags as $tag)
                                <a class="align-middle text-dark" href="{{route("tag-page", ["slug" => $tag->slug])}}">{{$tag->name}}</a>{{$loop->last ? "" : ","}}
                            @endforeach

                        </div>
                    @endif
                    <p class="card-text text-secondary">{{$post->content}}</p>
                    <a href="{{route("admin.posts.edit", ["post" => $post->id])}}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Modifica
                    </a>
                    <form class="form-group d-inline-block" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-danger" type="submit" value="Elimina">
                    </form>

                </div>
            </div>
        </div>

        <div class="mt-3">
            <a class="btn btn-secondary" href="{{route("admin.posts.index")}}"><i class="far fa-arrow-alt-circle-left mr-1"></i>Torna alla lista dei post</a>
        </div>

    </div>

@endsection