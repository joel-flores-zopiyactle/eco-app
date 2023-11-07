@extends('layouts.dashboard')

@section('panel')
    <div class="w-100 d-flex justify-content-between align-items-center py-2">
        <h4><strong>Lista de documentos</strong></h4>

        <a class="btn btn-primary d-flex align-items-center justify-content-center" href="{{ route('create-document')}}">
            <span class="material-symbols-outlined">
                add
            </span>
            Nuevo documento
        </a>
    </div>

    <x-alert></x-alert>

    <section class="shadow rounded-2 p-4 document-page page-admin">

        @if ($documents->count() > 0)

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
                            <td>
                                <div class="badge text-bg-success px-2 py-1 rounded">
                                    {{ $document->category->name}}
                                </div>
                            </td>
                            <td>
                                <section class="d-flex align-items-center justify-content-center">

                                    <form action="{{ route('delete-document', ["id" => $document->id])}}" method="POST" id="delete-item-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        id="delete-item"
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

            <div class="empty-state d-flex justify-content-center align-items-center p-5">
                <img style="width: 30%" src="{{ asset('assets/svg/files.svg')  }}" alt="Not found files">
            </div>

            <div class="d-flex justify-content-center align-items-center px-5 py-2 text-center">
                    <h4>
                        <strong>¡Opps!</strong>
                        <br>
                        <br>
                        <b>Parace que aún no tenemos documentos</b>
                    </h4>
            </div>
        @endif

    </section>
@endsection
