@extends('layouts.dashboard')

@section('panel')
   <div class="row">
    <div class="col-7">
        <h3 class="mb-4">Registrar categoría</h3>
        <section class="shadow rounded-2 p-4">
            <x-categorys.form-register/>
        </section>
    </div>
    <div class="col-5">
        <div class="empty-state d-flex justify-content-center align-items-center p-5">
            <img style="width: 90%" src="{{ asset('assets/svg/create-category.svg')  }}" alt="Not found files">
        </div>
    </div>
   </div>
@endsection
