@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- titolo modifica --}}
        <h1>Modifica post: {{ucfirst($post->title)}}</h1>

        {{-- eventuali errori --}}
        @include("partials.validation-errors")

        {{-- form modifica --}}
        <form action="{{route("admin.posts.update", ["post" => $post->id])}}" method="post" enctype="multipart/form-data">

            @csrf
            @method("PUT")
        
            {{-- titolo --}}
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ucfirst($post->title)}}">
            </div>

            {{-- immagine --}}
            <div class="form-group">
                <label for="cover-image">Immagine</label>
                <input type="file" class="form-control-file" name="cover-image" id="cover-image">

                @if ($post->cover)
                    <div class="mt-3 mb-2">
                        <div><span>anteprima immagine</span></div>
                        <img src="{{asset("storage/" . $post->cover)}}" alt="{{$post->title}}" style="max-height:200px;">
                    </div>                    
                @endif
            </div>

            {{-- slug --}}
            <div class="form-group">
                <label for="title">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="{{$post->slug}}" readonly>
            </div>

            {{-- paragrafo contenuto --}}
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" rows="10" name="content" id="content">{{$post->content}}</textarea>
            </div>

            {{-- categoria --}}
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- tags[] --}}
            <div class="form-group">
                <label for="" class="d-block">Tag</label>
                @foreach ($tags as $tag)
                    <div class="custom-control custom-switch d-inline-block mr-4">

                        @if ($errors->any())
                            <input class="custom-control-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? "checked" : ""}}>
                        @else
                            <input class="custom-control-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" {{$post->tags->contains($tag->id) ? "checked" : ""}}>
                        @endif
                        
                        <label class="custom-control-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
        
            {{-- tasto per salvare --}}
            <input type="submit" class="btn btn-success" value="&checkmark; Salva">
        
        </form>

        {{-- tasto per eliminare --}}
        <form class="form-group text-right mt-2" action="{{route("admin.posts.destroy", ["post" => $post->id])}}" method="post">
            @csrf
            @method("DELETE")
            <input class="btn btn-danger" type="submit" value="&cross; Elimina post" style="transform: translateY(-45px)">
        </form>

        {{-- tasto per tornare alla lista dei post --}}
        <div>
            <a class="btn btn-secondary" href="{{route("admin.posts.index")}}"><i class="far fa-arrow-alt-circle-left mr-1"></i>Torna alla lista dei post</a>
        </div>
        
    </div>

@endsection