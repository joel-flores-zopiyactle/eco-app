@extends('layouts.dashboard')

@section('panel')

    @if ($successMessage)
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-start align-items-center py-1" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
                <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
            </svg>
            {{$successMessage}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="shadow rounded-2 p-4">

        <div class="w-100 d-flex justify-content-between align-items-center py-3">
            <h4>Lista de categorias</h4>

            <a class="btn btn-primary" href="{{ route('create-category')}}">Nuevo categoría</a>
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorys as $dato)
                    <tr>
                        <td>{{ $dato->id }}</td>
                        <td>{{ $dato->name }}</td>
                        <td>{{ $dato->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Mostrar la paginación -->
        <div class="d-flex justify-content-center">
            {{ $categorys->links() }}
        </div>
    </section>
@endsection
