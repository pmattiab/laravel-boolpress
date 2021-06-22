@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Gestisci i tuoi post</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">{{ucfirst($post->title)}}</h4>
                            <p class="card-text text-secondary">{{substr($post->content, 0, 120)}}...</p>
                            <a href="{{route("admin.posts.show", ["post" => $post->id])}}" class="btn btn-primary">
                                <i class="far fa-file-alt"></i> Vai al post
                            </a>
                            <a href="{{route("admin.posts.edit", ["post" => $post->id])}}" class="btn btn-success">
                                <i class="fas fa-edit"></i> Modifica
                            </a>
                            <form class="form-group d-inline-block" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <input class="btn btn-danger" type="submit" value="&cross; Elimina">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection