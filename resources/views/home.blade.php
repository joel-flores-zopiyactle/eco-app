@extends('layouts.app')

@section('content')

<div class="container">

    <x-navbar />

    <div class="row">

        <div class="col-2">
            <x-admin.aside />
        </div>

        @if ($categories->count() > 0)
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <h4>Mis secciones</h4>
                    <hr>
                </div>

                @foreach ($categories as $category)
                    <div class="col-3">
                        <a class="card card-category-admin" href="{{route('documents', ['show' => $category->name])}}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <strong>{{$category->name}}</strong>
                                </h5>
                                <p class="card-text">
                                    {{ $category->description}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @else

        <div class="col-6">
            <div class="d-flex justify-content-center align-items-center text-left flex-wrap">
                <h4 class="w-100">
                    ¡Bienvenido a tu CRM de organización!
                </h4>

                <p class="w-100">
                    Comienza por publicar tus materiales y documentos para compártir con tu público.
                </p>
            </div>
            <div class="empty-state d-flex justify-content-center align-items-center p-5">
                <img style="width: 70%" src="{{ asset('assets/svg/not-categories.svg')  }}" alt="Not found files">
            </div>


            <section>
                <h4>Pasos para comenzar a trabajar</h4>

                <ol>
                    <li>
                        Crear categoría
                    </li>

                    <li>
                        Crear documento
                    </li>
                </ol>
            </section>
        </div>

        @endif


    </div>


</div>
@endsection
