@extends('layouts.app')

@section('content')

<div class="container">

    <x-navbar />

    <div class="row">

        <div class="col-2">
            <x-admin.aside />
        </div>

        <div class="col-10">
            @yield('panel')
        </div>
    </div>


</div>
@endsection

