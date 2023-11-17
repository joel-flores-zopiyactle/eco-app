@extends('layouts.dashboard')



@section('panel')


    <x-title-header-section
    title="Lista de categorías"
    routeUrl="create-category"
    colorBtn="btn-primary"
    titleBtn="Nueva categoría">
    </x-title-header-section>

    <x-alert></x-alert>

    <section class="shadow rounded-2 p-4 page-admin bg-white">
        @if ($categories->count() > 0)
            <table class="table table-hover rounded p-5">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <section class="d-flex align-items-center justify-content-center">

                                    <form action="{{ route('destroy-category', ["id" => $category->id])}}" method="POST" id="delete-item-form">
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

                                    <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-light ms-3 btn-action">
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
                {{ $categories->links() }}
            </div>
        @else
            <div class="empty-state d-flex justify-content-center align-items-center p-5">
                <img style="width: 30%" src="{{ asset('assets/svg/categories.svg')  }}" alt="Not found files">
            </div>

            <div class="d-flex justify-content-center align-items-center px-5 py-2 text-center">
                    <h4>
                        <strong>¡Opps!</strong>
                        <br>
                        <br>
                        <b>Parace que aún no tenemos categorías</b>
                    </h4>
            </div>
        @endif
    </section>
@endsection

