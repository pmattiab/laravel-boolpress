@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$post->title}}</h1>

        <div>
            <p>{{$post->content}}</p>
        </div>
    </div>

@endsection