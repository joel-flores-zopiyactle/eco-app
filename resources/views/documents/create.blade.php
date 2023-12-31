@extends('layouts.dashboard')

@section('panel')
    <div class="row">
        <div class="col-7 bg-white shadow p-3 rounded">
            <h3 class="mb-4">Registrar documento</h3>

            <x-alert></x-alert>

            <section class="mt-2">
                <x-documents.form-register :categorys="$categorys" />
            </section>
        </div>
        <div class="col-5">
            <div class="empty-state d-flex justify-content-center align-items-center p-5">
                <img style="width: 90%" src="{{ asset('assets/svg/create-document.svg')  }}" alt="Not found files">
            </div>
        </div>
       </div>
@endsection
