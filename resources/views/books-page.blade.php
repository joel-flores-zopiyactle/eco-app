<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Busqueda - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Inter" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="shortcut icon" href="{{asset('assets/logo.jpg')}}" type="image/x-icon">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('public/css/assets/app-60404678.css') }}">
        <style>
            body {
                font-family: 'Inter'
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="py-3">
            <x-home.login :showLoginIn="false"></x-home.login>
        </div>

        <main>
            <section class="container py-5">

                <div class="row">

                    <div class="col-lg-3 col-12 pt-4">
                        <div style="position: sticky; top: 10px">
                            <x-home.menu-category :categorys="$categorys"></x-home.menu-category>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">

                       <div class="d-flex justify-content-between align-items-center bg-light" style="position: sticky; top:0px; padding-top: 10px; z-index: 2;">
                            <section class="w-100">
                                <h2 class="p-0 m-0">Lista de materiales</h2>
                            </section>

                            <form action="{{ route('search-documents-index')}}" class="d-flex py-4 w-100" role="search" method="POST">
                                @csrf
                                <input class="form-control me-2" name="keywords" type="search" placeholder="Comienza buscado por el título ...." aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">Buscar</button>
                            </form>
                       </div>

                       <hr>

                        <x-home.books :documents="$documents"></x-home.books>
                        <!-- Mostrar la paginación -->
                        <div class="d-flex justify-content-center">
                            {{ $documents->links() }}
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <script src="{{ asset('public/css/assets/app-c75e0372.js') }}"></script>
    </body>
</html>
