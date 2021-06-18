@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Gestisci i tuoi post</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-6">
                    <div class="card" style="width: 34rem; margin: 10px 0">
                        <div class="card-body">
                          <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                          <a href="#" class="btn btn-primary">Vai al post</a>
                          <a href="#" class="btn btn-success">Modifica</a>
                          <a href="#" class="btn btn-danger">Elimina</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection