@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Modifica post: {{ucfirst($post->title)}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>! {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route("admin.posts.update", ["post" => $post->id])}}" method="post">
        {{-- <form action="" method="post"> --}}

            @csrf
            @method("PUT")
        
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ucfirst($post->title)}}">
            </div>

            <div class="form-group">
                <label for="title">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="{{$post->slug}}" readonly>
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" rows="10" name="content" id="content">{{$post->content}}</textarea>
            </div>
        
            <input type="submit" class="btn btn-primary" value="Salva">
        
        </form>

        <form class="form-group mt-2    " action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
            @csrf
            @method("DELETE")

            <input class="btn btn-danger" type="submit" value="Elimina">
        </form>
        
    </div>

@endsection