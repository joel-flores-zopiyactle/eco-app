@extends('layouts.app')

@section('content')

<div class="container">

    <x-navbar />

    <div class="row">

        <div class="col-2">
            <x-admin.aside />
        </div>

        <div class="col-10">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inestigaciones</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ciencia</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Test</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
