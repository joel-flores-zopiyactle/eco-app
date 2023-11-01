@extends('layouts.dashboard')

@section('panel')
    <section class="shadow rounded-2 p-4 edit-document-page">

        <div class="w-100 py-3">
            <h4>Actualizar datos del documento</h4>
            <hr>
        </div>

        <form class="row" action="{{ route('register-document') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-12">
                <label for="title" class="form-label">Titulo del documento</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                aria-describedby="titleHelp"
                name="title"
                value="{{$document->title}}">
                <div id="titleHelp" class="form-text @error('title') is-invalid @enderror">Ingrese el titulo de tu documento</div>
            </div>

            <div class="mb-3 col-12">
                <label for="description" class="form-label">Resumen</label>
                <textarea class="form-control" id="decsription" rows="3" name="description"
                >{{$document->description}}</textarea>
            </div>

            <div class="mb-3 col-12">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select category" name="category_id">
                    <option value="{{ $document->category->id }}" selected>{{ $document->category->name }}</option>
                    @foreach ($categorys as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-6">

                <div class="cover-document">
                    <img src="{{ route('show-cover', ["id" => $document->id]) }}" alt="Mi imagen">
                </div>


                <label for="file" class="form-label">Portada</label>
                <input class="form-control" type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif">
                <div id="fileHelp" class="form-text">Sube un imagen para la vista de tu documento</div>
            </div>

            <div class="mb-3 col-6">
                <label for="file" class="form-label">Archivo</label>
                <input class="form-control" type="file" id="file" accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
                <div id="fileHelp" class="form-text">Sube el archivo ligado al documento</div>
            </div>


            <div class="mb-3 form-check col-span-2 col-6">
               <section class="pl-5">
                <input type="checkbox" class="form-check-input" id="published" name="ispublished"
                {{ $document->isPublished ? 'checked' : '' }}>
                <label class="form-check-label" for="published">Público</label>
               </section>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
        </form>

    </section>
@endsection
