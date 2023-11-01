@extends('layouts.dashboard')

@section('panel')
    <section class="shadow rounded-2 p-4">

        <div class="w-100 d-flex justify-content-between align-items-center py-3">
            <h4>Lista de documentos</h4>

            <a class="btn btn-primary" href="{{ route('create-document')}}">Nuevo documento</a>
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo de documento</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $dato)
                    <tr>
                        <td>{{ $dato->id }}</td>
                        <td>{{ $dato->title }}</td>
                        <td>{{ $dato->description }}</td>
                        <td>{{ $dato->type }}</td>
                        <td>
                            <section class="d-flex align-items-center justify-content-center">

                                <form action="/document/{{$dato->id}}" method="POST">
                                    @csrf
                                    @method('del')
                                    <button type="submit" class="btn btn-outline-danger d-block">
                                        Eliminar
                                    </button>
                                </form>

                                <button class="btn btn-light ms-3">
                                    Editar
                                </button>

                            </section>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Mostrar la paginación -->
        <div class="d-flex justify-content-center">
            {{ $documents->links() }}
        </div>
    </section>
@endsection
