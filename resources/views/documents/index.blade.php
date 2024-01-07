@extends('layouts.dashboard')

@section('panel')

    <x-title-header-section
    title="Lista de documentos ({{$documents->count()}})"
    routeUrl="create-document"
    colorBtn="btn-primary"
    titleBtn="Nuevo documento">
    </x-title-header-section>

    <x-alert></x-alert>

    <section class="shadow rounded-2 p-4 document-page page-admin bg-white">

        @if ($documents->count() > 0)

            <x-form-search routeUrl="search-documents" placeholder="Buscar por título"></x-form-search>

            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">
                            <section class="d-flex align-items-center">
                                Id
                                <x-admin.order-by
                                routeUrl="documents"
                                :showList="$categoryName"
                                orderColumn="id"
                                :orderBy="$orderBy === 'desc' ? 'asc': 'desc'"
                                ></x-admin.order-by>
                            </section>

                        </th>
                        <th scope="col" style="width: 25%;">
                            <section class="d-flex align-items-center">
                                Título
                                <x-admin.order-by
                                routeUrl="documents"
                                :showList="$categoryName"
                                orderColumn="title"
                                :orderBy="$orderBy === 'desc' ? 'asc': 'desc'"
                                ></x-admin.order-by>
                            </section>


                        </th>
                        <th scope="col" style="width: 45%;">Descripción</th>
                        <th scope="col" style="width: 8%;">
                            <div class="d-flex align-items-center">
                                Tipo
                            </div>
                        </th>
                        <th scope="col" style="width: 8%;">
                            <section class="d-flex align-items-center">
                                Público
                                <x-admin.order-by
                                routeUrl="documents"
                                :showList="$categoryName"
                                orderColumn="isPublished"
                                :orderBy="$orderBy === 'desc' ? 'asc': 'desc'"
                                ></x-admin.order-by>
                            </section>
                        </th>
                        <th scope="col">Categoría</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td><strong>{{ $document->id }}</strong></td>
                            <td class="text-truncate text-break" style="max-width: 230px;">{{ $document->title }}</td>
                            <td class="text-truncate text-break" style="max-width: 150px;">{{ $document->description }}</td>
                            <td>
                               <section class="d-flex align-content-center justify-content-center">
                                @if ($document->file)
                                    <strong>{{ Str::upper($document->file->type ?? 'N/A') }}</strong>
                                @else
                                    <div class="badge text-bg-danger px-3 py-2">N/A</div>
                                @endif
                               </section>
                            </td>
                            <td>
                                <x-badge-item :isPublished="$document->isPublished"></x-badge-item>
                            </td>

                            <td>
                                <div class="badge text-bg-success px-2 rounded">
                                    <p class="py-1 m-0 text-truncate text-break" style="max-width: 100px;">{{ $document->category->name}}</p>
                                </div>
                            </td>

                            <td>
                                <section class="d-flex align-items-center justify-content-center">

                                    <x-preview-item :document="$document"></x-preview-item>

                                    <x-delete-item-alert
                                    routeUrl="delete-document"
                                    title="Confirmar Eliminación"
                                    subtitle="¿Estás seguro de que deseas eliminar el documento?"
                                    :itemId="$document->id"
                                    ></x-delete-item-alert>

                                    <x-edit-item routeUrl="edit-document" :itemId="$document->id"></x-edit-item>

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
            @if ($isNotFound ?? false)
                <x-form-search routeUrl="search-category" placeholder="Buscar por título"></x-form-search>
                <div class="w-100 mt-5">

                    <div class="w-100 d-flex justify-content-center py-4">
                        <img width="100" src="{{asset('assets/svg/not-found.svg')}}" alt="" srcset="">
                    </div>

                    <div class="w-100 d-flex justify-content-center my-2">
                        <h3 class="bold">No se encontraron resultados para tu búsqueda.</h3>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <x-back routeUrl="documents" param="all"></x-back>
                    </div>
                </div>
            @else
                <x-empty-state-page
                imageUrl="assets/svg/files.svg"
                title="¡Opps!"
                subtitle="Parace que aún no tenemos documentos {{$isShowDocumentsByCategory ? 'en la categoría: ' . $categoryName  : ''}}">
                </x-empty-state-page>
            @endif
        @endif

    </section>
@endsection
