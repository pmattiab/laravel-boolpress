@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ucfirst($post->title)}}</h1>
                    <p class="card-text" style="color:#6c757d;">{{$post->content}}</p>
                    <a href="{{route("admin.posts.edit", ["post" => $post->id])}}" class="btn btn-success">Modifica</a>
                    <form style="display: inline-block;" class="form-group" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
                        @csrf
                        @method("DELETE")
            
                        <input class="btn btn-danger" type="submit" value="Elimina">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection