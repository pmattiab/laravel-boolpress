@extends('layouts.app')

@section('content')
    
    <div class="container">

        {{-- tasto per tornare alla pagina admin --}}
        <div class="mb-4">
            <a class="btn btn-secondary" href="{{route("admin.home")}}"><i class="far fa-arrow-alt-circle-left mr-1"></i>Torna alla dashboard</a>
        </div>

        {{-- titolo crea --}}
        <h1>Crea un nuovo post</h1>

        {{-- eventuali errori --}}
        @include("partials.validation-errors")
        
        {{-- form crea --}}
        <form action="{{route("admin.posts.store")}}" method="post" enctype="multipart/form-data">

            @csrf
            @method("POST")

            {{-- titolo --}}
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo" value="{{old("title")}}">
            </div>

            {{-- immagine --}}
            <div class="form-group">
                <label for="cover-image">Immagine</label>
                <input type="file" class="form-control-file" name="cover-image" id="cover-image">
            </div>

            {{-- paragrafo contenuto --}}
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" rows="10" placeholder="Inserisci contenuto">{{old("content")}}</textarea>
            </div>

            {{-- categoria --}}
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>
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
                        <input class="custom-control-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? "checked" : ""}}>
                        <label class="custom-control-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>

            {{-- tasto per creare --}}
            <button type="submit" class="btn btn-primary mt-4">
                <i class="fas fa-plus"></i> Aggiungi
            </button>

        </form>

        {{-- tasto per refreshare la pagina --}}
        <div class="text-right">
            <a class="btn btn-outline-dark" href="{{route("admin.posts.create")}}" style="transform: translateY(-38px)">Svuota i campi</a>
        </div>

    </div>

@endsection