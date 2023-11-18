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

            <x-form-search routeUrl="search-category" placeholder="Buscar por título"></x-form-search>

            <table class="table table-hover w-100 rounded-full p-5">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col" style="width: 20%;">Título</th>
                        <th scope="col" style="width: 50%;">Descripción</th>
                        <th scope="col">Público</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($categories as $category)
                        <tr>
                            <td><strong>{{ $category->id }}</strong></td>
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

            @if ($isNotFound)
                <x-form-search routeUrl="search-category" placeholder="Buscar por título"></x-form-search>
                <div class="w-100 mt-5">

                    <div class="w-100 d-flex justify-content-center py-4">
                        <img width="100" src="{{asset('assets/svg/not-found.svg')}}" alt="" srcset="">
                    </div>

                    <div class="w-100 d-flex justify-content-center my-2">
                        <h3 class="bold">No se encontraron resultados para tu búsqueda.</h3>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <x-back routeUrl="categories"></x-back>
                    </div>
                </div>
            @else
                <x-empty-state-page
                imageUrl="assets/svg/categories.svg"
                title="¡Opps!"
                subtitle="Parace que aún no tenemos categorías">
                </x-empty-state-page>
            @endif
        @endif
    </section>
@endsection

