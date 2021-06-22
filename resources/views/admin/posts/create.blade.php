@extends('layouts.app')

@section('content')
    
    <div class="container">

        <h1>Crea un nuovo post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route("admin.posts.store")}}" method="post">

            @csrf
            @method("POST")

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" rows="10" placeholder="Inserisci contenuto">{{old("content")}}</textarea>
            </div>

            {{-- <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Aggiungi
            </button>

        </form>

        <div class="text-right">
            <a class="btn btn-outline-dark" href="{{route("admin.posts.create")}}" style="transform: translateY(-38px)">Svuota i campi</a>
        </div>

    </div>

@endsection