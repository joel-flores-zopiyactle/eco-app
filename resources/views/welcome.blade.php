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
        <link rel="stylesheet" href="{{ asset('public/css/assets/app-60404678.css') }}">
    </head>
    <body class="bg-light">
        <main>
            <section>
                <x-home.banner></x-home.banner>
            </section>
        </main>

        <x-footer></x-footer>
        <script src="{{ asset('public/css/assets/app-c75e0372.js') }}"></script>
    </body>
</html>
