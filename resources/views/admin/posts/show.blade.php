@extends('layouts.app')

@section('content')

    <div class="container">

        @include("partials.success-error-messages")

        <div class="card">

            <div class="card-body">

                {{-- titolo --}}
                <h2 class="card-title">{{ucfirst($post->title)}}</h2>

                {{-- slug --}}
                <div class="mt-3 mb-2">
                    <span class="badge badge-success p-1 mr-1"><i class="fas fa-link"></i> Slug</span>
                    <span class="align-middle">{{$post->slug}}</span>
                </div>

                {{-- categorie --}}
                @if ($post->category)
                    <div class="mt-2 mb-2">
                        <span class="badge badge-primary p-1 mr-1"><i class="fas fa-utensils"></i> Categoria</span>
                        <a class="align-middle text-dark" href="{{route("category-page", ["slug" => $post_category->slug])}}">{{$post_category->name}}</a>
                    </div>
                @endif

                {{-- tags[] --}}
                @if ($post_tags)
                    <div class="mt-2 mb-3">
                        <span class="badge badge-danger text-white p-1 mr-1"><i class="fas fa-tag"></i> Tag</span>
                        @foreach ($post_tags as $tag)
                            <a class="align-middle text-dark" href="{{route("tag-page", ["slug" => $tag->slug])}}">{{$tag->name}}</a>{{$loop->last ? "" : ","}}
                        @endforeach
                    </div>
                @endif

                {{-- paragrafo contenuto --}}
                <p class="card-text text-secondary">{{$post->content}}</p>
                <div class="text-secondary position-absolute" style="top: 20px; right: 20px; font-size: 13px;">
                    <span>creato il: {{$post->created_at->format("d/m/Y")}}</span>
                </div>

                {{-- cover img --}}
                @if ($post->cover)
                    <div class="mt-2 mb-3">
                        <img src="{{asset("storage/" . $post->cover)}}" alt="{{$post->title}}" style="max-height:200px;">
                    </div>
                @endif

                {{-- tasto per andare ad edit --}}
                <a href="{{route("admin.posts.edit", ["post" => $post->id])}}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Modifica
                </a>

                {{-- tasto per cancellare --}}
                <form class="form-group d-inline-block" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-danger" type="submit" value="Elimina">
                </form>

            </div>

        </div>

        {{-- tasto per tornare alla lista dei post --}}
        <div class="mt-3">
            <a class="btn btn-secondary" href="{{route("admin.posts.index")}}"><i class="far fa-arrow-alt-circle-left mr-1"></i>Torna alla lista dei post</a>
        </div>

    </div>

@endsection