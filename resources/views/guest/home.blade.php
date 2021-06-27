@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="title mb-5">
            <h1>Bevenuti nel Blog di ricette</h1>
        </div>

        <div>
            <a class="btn btn-primary" href="{{route("blog")}}">Leggi i post del Blog</a>
        </div>
        
    </div>
@endsection