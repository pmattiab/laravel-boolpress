@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="title mb-5">
            <h1>Contattaci</h1>
        </div>

        {{-- eventuali errori --}}
        @include("partials.validation-errors")

        {{-- form contattaci --}}
        <form action="{{route("handle-new-contact")}}" method="post" enctype="multipart/form-data">

            @csrf
            @method("POST")

            {{-- nome --}}
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Cognome e Nome">
            </div>

            {{-- email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Indirizzo email">
            </div>

            {{-- messaggio --}}
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea class="form-control" name="message" id="message" rows="10" placeholder="Messaggio"></textarea>
            </div>

            {{-- termini e condizioni --}}
            <div class="form-group form-check d-inline-block mr-5">
                <input type="checkbox" class="form-check-input" name="terms-conditions" id="terms-conditions">
                <label class="form-check-label" for="terms-conditions">Accetta Termini e Condizioni</label>
            </div>

            {{-- termini e condizioni --}}
            <div class="form-group form-check d-inline-block">
                <input type="checkbox" class="form-check-input" name="marketing-terms-conditions" id="marketing-terms-conditions">
                <label class="form-check-label" for="marketing-terms-conditions">Utilizza i miei dati per finalità di marketing</label>
            </div>

            {{-- tasto per inviare --}}
            <button type="submit" class="btn btn-primary mt-3 d-block">
                <i class="fas fa-paper-plane mr-2"></i> Invia
            </button>

        </form>
        
    </div>
@endsection