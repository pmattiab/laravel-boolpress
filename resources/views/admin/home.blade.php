@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Ciao
                        <span class="font-weight-bold">{{$user->name}}</span>,
                        cosa vuoi fare?
                    </h5>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary ml-2" href="{{route('admin.posts.create')}}">
                        <i class="fas fa-plus"></i> Aggiungi nuovo post
                    </a>
                    <a class="btn btn-success ml-2" href="{{route('admin.posts.index')}}">
                        <i class="fas fa-edit"></i> Gestisci i post
                    </a>
                    <a class="btn btn-danger ml-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Esegui logout
                    </a>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection