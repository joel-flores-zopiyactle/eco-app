@extends('layouts.dashboard')

@section('panel')
    <section class="shadow rounded-2 p-4 document-page page-admin">

        <div class="w-100 d-flex justify-content-between align-items-center py-3">
            <h4>Lista de documentos</h4>

            <a class="btn btn-primary" href="{{ route('create-document')}}">Nuevo documento</a>
        </div>


        {{-- Search --}}
        <section class="w-50">
            <form action="{{ route('search-documents')}}" class="d-flex mb-3" role="search" method="POST" autocomplete="off">
                @csrf
                <input class="form-control me-2" type="search" name="keywords" placeholder="Buscar por titulo, id, categoría..." aria-label="Search">
                <button class="btn btn-outline-secondary text-dark d-flex" type="submit">
                    <span class="material-symbols-outlined ms-1">
                        search
                    </span>
                    Buscar
                </button>
            </form>
        </section>

        @if ($documents->count() > 0)
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Tipo de documento</th>
                        <th scope="col">Categoría</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->id }}</td>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->description }}</td>
                            <td>{{ $document->type }}</td>
                            <td> {{ $document->category->name}} </td>
                            <td>
                                <section class="d-flex align-items-center justify-content-center">

                                    <form action="{{ route('delete-document', ["id" => $document->id])}}" method="POST" id="delete-document-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        id="delete-document"
                                        class="btn btn-outline-danger btn-action">
                                            <span class="material-symbols-outlined text-sm">
                                                delete
                                            </span>
                                        </button>
                                    </form>

                                    <a href="{{ route('edit-document', ['id' => $document->id]) }}" class="btn btn-light ms-3 btn-action">
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>

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
        @else

            <div class="d-flex justify-content-center align-items-center pt-5">
                <span class="material-symbols-outlined" style="font-size: 4rem;">
                    insert_page_break
                </span>
            </div>

            <div class="d-flex justify-content-center align-items-center pb-5">
               <a class="btn btn-light bold" href="{{route('documents')}}">Mostrar todo</a>
            </div>

            <div class="alert alert-warning text-center">
                <strong>No hay resulatdos con la busqueda....</strong>
            </div>
        @endif

    </section>
@endsection
