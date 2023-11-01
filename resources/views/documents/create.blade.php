@extends('layouts.dashboard')

@section('panel')
    <section class="shadow rounded-2 p-4">
        <x-documents.form-register :categorys="$categorys" />
    </section>
@endsection
