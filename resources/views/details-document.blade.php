<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Inter" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Inter'
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="shadow py-3">
            <x-home.login :showLoginIn="false"></x-home.login>
        </div>
        <main>
            <section class="container py-5">

                <div class="row">
                    <div class="col-12">
                        <h1 class="fs-1">Detalles del documento</h1>
                        <hr>
                    </div>

                    <div class="card p-3 border-0">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{$document->image->url}}" class="img-fluid rounded"
                            height="300px"
                            alt="{{$document->title}}">
                          </div>
                          <div class="col-md-8">

                            <div class="card-body">
                              <h5 class="card-title fs-1">{{$document->title}}</h5>
                              <p class="card-text py-4">
                                {{$document->description}}
                              </p>

                              <section class="mb-2">
                                <strong>Categoría</strong>
                                <br>
                                <div class="badge text-bg-secondary px-2 rounded">
                                    <p class="py-1 m-0 text-white">{{ $document->category->name}}</p>
                                </div>
                              </section>

                              <p class="card-text"><small class="text-body-secondary">Públicado el {{ $document->created_at->formatLocalized('%d %B %Y') }}</small></p>
                            </div>

                            {{-- Btns --}}
                            <div class="row">
                                <div class="col-6 d-flex">
                                    <a class="mx-3 w-50 btn btn-primary d-flex justify-items-center justify-content-center text-white"
                                    href="{{route('dowloand-file', ['id' => $document->file->id ])}}"
                                    title="Descargar archivo">
                                    <span class="material-symbols-outlined me-1">
                                        download_2
                                    </span>
                                    Descargar documento
                                    </a>

                                    <x-back routeUrl="books-page"></x-back>
                                </div>
                            </div>

                        </div>
                        </div>

                      </div>
                </div>
            </section>
        </main>
    </body>
</html>
