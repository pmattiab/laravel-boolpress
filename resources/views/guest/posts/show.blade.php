@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-4">
            <div class="card-body">
              <h1 class="card-title">{{ucfirst($post->title)}}</h1>
              @if ($post->category)
              <div class="mt-3 mb-3">
                <button type="button" class="btn btn-outline-dark btn-sm mr-1"><i class="fas fa-utensils mr-1"></i> Categoria</button>
                <span class="font-weight-bold">{{$post_category->name}}</span>
            </div>
              @endif
              <p class="card-text text-secondary">{{$post->content}}</p>
            </div>
        </div>

    </div>

@endsection