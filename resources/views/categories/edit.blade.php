@extends('layouts.dashboard')



@section('panel')

   <x-alert></x-alert>

<div class="row">
    <div class="col-8">
        <section class="shadow rounded-2 p-4 page-admin">

            <div class="w-100 d-flex justify-content-between align-items-center py-3">
                <h4>Actualizar categoría</h4>
            </div>

            <form action="{{route('update-category', ['id' => $category->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Titulo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="titleHelp"
                    value="{{$category->name}}">
                    @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text">Ingrese el titulo de la categoria</div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripcón</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{$category->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


               <div class="w-100">
                <button type="submit" class="btn btn-primary w-100">Actualizar categoria</button>
               </div>

            </form>
        </section>
    </div>
    <div class="col-4"></div>
</div>
@endsection
