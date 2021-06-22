@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ucfirst($post->title)}}</h2>
                    <div class="mt-3 mb-3">
                        <button type="button" class="btn btn-outline-primary btn-sm mr-1">
                            <i class="fas fa-link"></i> Slug
                        </button>
                        <span>{{$post->slug}}</span>
                    </div>
                    @if ($post->category)
                        <div class="mt-3 mb-3">
                            <button type="button" class="btn btn-outline-dark btn-sm mr-1"><i class="fas fa-utensils mr-1"></i> Categoria</button>
                            <span class="font-weight-bold">{{$post_category->name}}</span>
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
    </div>

@endsection