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
                <div class="col-12">
                    <h4>Documentos por categoría</h4>
                </div>

                @foreach ($categories as $category)
                    <div class="col-3">
                        <div class="card card-category-admin">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">
                                {{ $category->description}}
                            </p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</div>
@endsection
