@extends('layouts.dashboard')

@section('panel')

   <div class="row">
    <div class="col-8">
        @if ($success)
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-start align-items-center py-1" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
                    <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                </svg>
                {{$success}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="shadow rounded-2 p-4 edit-document-page bg-white">

            <div class="w-100 py-3">
                <h4>Actualizar datos del documento</h4>
                <hr>
            </div>

            <form class="row" action="{{ route('update-document', ["id" => $document->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 col-12">
                    <label for="title" class="form-label">Título del documento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    aria-describedby="titleHelp"
                    name="title"
                    value="{{$document->title}}">
                    <div id="titleHelp" class="form-text @error('title') is-invalid @enderror">Ingrese el título de tu documento</div>
                </div>

                <div class="mb-3 col-12">
                    <label for="description" class="form-label">Resumen</label>
                    <textarea class="form-control" id="decsription" rows="3" name="description"
                    >{{$document->description}}</textarea>
                </div>

                <div class="mb-3 col-12">
                    <label for="category" class="form-label">Categoría</label>
                    <select class="form-select" aria-label="Default select category" name="category_id">
                        <option value="{{ $document->category->id }}" selected>{{ $document->category->name }}</option>
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-8">

                    <div class="cover-document">
                        @if ($document->image)
                        <img src="{{asset($document->image->url)}}" class="card-img-top" alt="cover"
                        onerror="this.onerror=null; this.src='{{asset('assets/svg/not-found-img.svg')}}'">

                        <section class="pt-2">
                            <label for="file" class="form-label">Portada</label>
                            <input class="form-control  is-valid" type="file" id="file" name="newFile" accept=".jpg, .jpeg, .png, .gif">
                            <div id="fileHelp" class="form-text">Sube un imagen para la vista prevía de tu documento</div>
                        </section>

                        @else
                            <div class="alert alert-danger">
                                <label for="file" class="form-label">No hay una partada asociado al documento</label>
                                <input class="form-control" type="file" id="file" name="newFile" accept=".jpg, .jpeg, .png, .gif">
                                <div id="fileHelp" class="form-text">Sube un imagen para la vista prevía de tu documento</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-3 col-8">
                    <div class="upload-file-document">
                        @if ($document->file)
                        <img src="{{asset('assets/svg/upload-file.svg')}}" class="card-img-top mb-2" alt="cover">
                        <label for="file" class="form-label text-success">Archivo subido</label>
                        <input class="form-control  is-valid" type="file" name="updateFile" id="file" accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
                        <div id="fileHelp" class="form-text">Sube el archivo ligado al documento</div>
                        @else
                            <div class="alert alert-danger">
                                <strong>No hay archivo asociado al documento</strong><br>
                                <input class="form-control mt-2" type="file" name="updateFile" id="updateFile"
                                accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
                                <div id="fileHelp" class="form-text">Sube el archivo ligado al documento</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 form-check">
                        <section class="pl-5">
                         <input type="checkbox" class="form-check-input" id="published" name="ispublished"
                         {{ $document->isPublished ? 'checked' : '' }}>
                         <label class="form-check-label" for="published">Público</label>
                        </section>
                     </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
                </div>
            </form>

        </section>
    </div>

    <div class="col-4"></div>
   </div>
@endsection
