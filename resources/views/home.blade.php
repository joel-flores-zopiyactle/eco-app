@extends('layouts.app')

@section('content')

<div class="container">

    <x-navbar />

    <div class="row">

        <div class="col-2">
            <x-admin.aside />
        </div>

        @if ($categories->count() > 0)
        <div class="col-10 bg-white shadow p-3 h-100" style="min-height: 80vh">
            <div class="row">
                <div class="col-12">
                    <h4>Mis secciones</h4>
                    <hr>
                </div>

                @foreach ($categories as $category)
                    <div class="col-3 mb-4">
                        <a class="card card-category-admin shadow rounded-full card-bg-green"
                        href="{{route('documents', ['show' => $category->name])}}">
                            <div class="card-body">

                                <div class="w-100 d-flex align-items-start">
                                    <img
                                    class="me-1"
                                    src="{{asset('assets/svg/category-bluecom.svg')}}"
                                    alt="icon category" width="30">

                                    <h5 class="card-title mt-1">
                                        <strong>{{$category->name}}</strong>
                                    </h5>
                                </div>

                                <p class="card-text">
                                    {{ $category->description}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach

                <!-- Mostrar la paginación -->
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
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
