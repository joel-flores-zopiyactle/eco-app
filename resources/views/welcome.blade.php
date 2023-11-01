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

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-light">

        <nav class="w-100 d-flex justify-content-between px-4">
            <div class="logo">
                <h3>App 2023</h3>
            </div>


            <div class="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if (Route::has('login'))
                        <div class="d-flex align-items-center">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                                </li>
                            @else
                                <li class="nav-item ps-3">
                                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login In</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item ps-3">
                                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </div>
                    @endif

                </ul>
            </div>
        </nav>
    </body>
</html>
