@extends('layouts.app')

@section('header-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('footer-scripts')
    <script src="{{asset("js/posts.js")}}"></script>
@endsection

@section('content')
    <div id="root">
        <div class="container">

            <h1>@{{title}}</h1>

            <div class="row">
                <div v-for="post in posts">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">@{{post.title}}</h4>
                            <div class="mt-3 mb-2">
                                <span class="badge badge-primary p-1 mr-1"><i class="fas fa-utensils"></i> Categoria</span>
                                <span class="align-middle text-dark">@{{post.category}}</span>
                            </div>
                            <div v-if="post.tags.length > 0" class="mt-2 mb-3">
                                <span class="badge badge-danger text-white p-1 mr-1"><i class="fas fa-tag"></i> Tag</span>
                                <span v-for="(tag, index) in post.tags" class="align-middle text-dark">
                                    @{{tag.name}}<span v-if="index != (post.tags.length-1)">, </span>
                                </span>
                            </div>
                            <p class="card-text text-secondary">@{{post.content}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection