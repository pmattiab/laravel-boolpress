@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="title">
            <h1>Bevenuti</h1>
        </div>

        <div class="sub_title mt-3 mb-5">
            <h2>Blog con le ultime notizie</h2>
        </div>

        <div>
            <a class="btn btn-primary" href="{{route("blog")}}">Leggi le ultime news</a>
        </div>
        
    </div>
@endsection