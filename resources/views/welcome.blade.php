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
    </head>
    <body class="bg-light">
        <main>
            <section>
                <x-home.banner></x-home.banner>
            </section>

            <section class="container py-5">

                <div class="row">

                    <div class="col-lg-3 col-12">
                        <x-home.menu-category :categorys="$categorys"></x-home.menu-category>
                    </div>
                    <div class="col-lg-9 col-12">

                       <div class="d-flex justify-content-between align-items-center">
                            <section class="w-100">
                                <h2 class="p-0 m-0">Lista de materiales</h2>
                            </section>

                            <form action="{{ route('search-documents-index')}}" class="d-flex py-4 w-100" role="search" method="POST">
                                @csrf
                                <input class="form-control me-2" name="keywords" type="search" placeholder="Comienza buscado por el titulo ...." aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">Search</button>
                            </form>
                       </div>

                        <x-home.books :documents="$documents"></x-home.books>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
