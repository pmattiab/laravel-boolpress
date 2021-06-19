@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Gestisci i tuoi post</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-6">
                    <div class="card" style="width: 34rem; margin: 10px 0">
                        <div class="card-body">
                            <h4 class="card-title">{{ucfirst($post->title)}}</h4>
                            <p class="card-text" style="color:#6c757d;">{{substr($post->content, 0, 120)}}...</p>
                            <a href="{{route("admin.posts.show", ["post" => $post->id])}}" class="btn btn-primary">Vai al post</a>
                            <a href="{{route("admin.posts.edit", ["post" => $post->id])}}" class="btn btn-success">Modifica</a>
                            <form style="display: inline-block;" class="form-group" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
                                @csrf
                                @method("DELETE")
        
                                <input class="btn btn-danger" type="submit" value="Elimina">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection