@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1>Bevenuti</h1>
            <h2>Blog con le ultime notizie</h2>
        </div>

        <div>
            <a class="btn btn-primary" href="{{route("blog")}}">Leggi le ultime news</a>
        </div>
        
    </div>
@endsection