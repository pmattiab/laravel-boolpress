@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-4">
            <div class="card-body">
              <h1 class="card-title">{{ucfirst($post->title)}}</h1>
              <p class="card-text text-secondary">{{$post->content}}</p>
            </div>
        </div>

    </div>

@endsection