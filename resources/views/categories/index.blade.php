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

            <x-form-search routeUrl="search-documents" placeholder="Buscar por título"></x-form-search>

            <table class="table table-hover rounded p-5">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col" style="width: 20%;">Titulo</th>
                        <th scope="col" style="width: 50%;">Descripción</th>
                        <th scope="col">Público</th>
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
                                <x-badge-item :isPublished="$category->isPublished"></x-badge-item>
                            </td>
                            <td>
                                <section class="d-flex align-items-center justify-content-center">

                                    <x-delete-item-alert
                                    routeUrl="destroy-category"
                                    title="Confirmar Eliminación"
                                    subtitle="¿Estás seguro de que deseas eliminar esta categoría?"
                                    :itemId="$category->id"
                                    ></x-delete-item-alert>

                                    <x-edit-item routeUrl="edit-category" :itemId="$category->id"></x-edit-item>

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
            <x-empty-state-page
            imageUrl="assets/svg/categories.svg"
            title="¡Opps!"
            subtitle="Parace que aún no tenemos categorías">
            </x-empty-state-page>
        @endif
    </section>
@endsection

