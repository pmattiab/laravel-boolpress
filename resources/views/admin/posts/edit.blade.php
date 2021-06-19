@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Modifica post: {{ucfirst($post->title)}}</h1>

        @if ($errors->any())
            <div class="alert alert-primary" role="alert">
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
                <label for="title"><h4>Titolo</h4></label>
                <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
            </div>
        
            <div class="form-group">
                <label for="content"><h4>Contenuto</h4></label>
                <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
            </div>
        
            <input style="margin-bottom: 10px;" type="submit" class="btn btn-primary" value="SALVA">
        
        </form>

        <form style="display: inline-block;" class="form-group" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
            @csrf
            @method("DELETE")

            <input class="btn btn-danger" type="submit" value="Elimina">
        </form>
        
    </div>

@endsection