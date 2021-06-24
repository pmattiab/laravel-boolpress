@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Categorie</h1>

        <div class="row">

            @foreach ($categories as $category)
                <div class="col-6">
                    <div class="card mt-3">
                        <div class="card-body">
                          <h4 class="card-title">{{ucfirst($category->name)}}</h4>
                          <a href="{{route("category-page", ["slug" => $category->slug])}}" class="btn btn-primary">
                            <i class="far fa-file-alt"></i> Visualizza i post
                          </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection