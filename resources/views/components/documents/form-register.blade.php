<form class="row" action="{{ route('register-document') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título del documento</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="titleHelp" name="title">
        @error('title')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror

        <div id="titleHelp" class="form-text @error('title') is-invalid @enderror">Ingrese el título de tu documento</div>
    </div>

    <div class="mb-3 col-12">
        <label for="description" class="form-label">Resumen</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>
        @error('description')
         <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-12">
        <label for="category" class="form-label">Categoría</label>
        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select category" name="category_id">
            <option selected>Seleccione una categoría</option>
            @foreach ($categorys as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>

        @error('category_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-6">
        <label for="cover" class="form-label">Portada</label>
        <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" accept=".jpg, .jpeg, .png, .gif">
        @error('cover')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
        <div id="fileHelp" class="form-text">Sube un imagen para la vista de tu documento</div>
    </div>

    <div class="mb-3 col-6">
        <label for="file" class="form-label">Archivo</label>
        <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
        @error('file')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
        <div id="fileDocument" class="form-text">Sube el archivo ligado al documento</div>
    </div>


    <div class=" col-span-2 col-6 mb-3">
       <section class="pl-5 form-check ">
        <input type="checkbox" class="form-check-input" id="published" name="ispublished">
        <label class="form-check-label" for="published">Público</label>
       </section>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Subir documento</button>
    </div>
</form>
