<form class="row" action="{{ route('register-document') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Titulo del documento</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="titleHelp" name="title">
        <div id="titleHelp" class="form-text @error('title') is-invalid @enderror">Ingrese el titulo de tu documento</div>
    </div>

    <div class="mb-3 col-12">
        <label for="description" class="form-label">Resumen</label>
        <textarea class="form-control" id="decsription" rows="3" name="description"></textarea>
    </div>

    <div class="mb-3 col-12">
        <label for="category" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select category" name="category_id">
            <option selected>Seleccione una categoria</option>
            @foreach ($categorys as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-6">
        <label for="file" class="form-label">Portada</label>
        <input class="form-control" type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif">
        <div id="fileHelp" class="form-text">Sube un imagen para la vista de tu documento</div>
    </div>

    <div class="mb-3 col-6">
        <label for="fileDocument" class="form-label">Archivo</label>
        <input class="form-control" type="file" id="fileDocument" name="fileDocument" accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
        <div id="fileDocument" class="form-text">Sube el archivo ligado al documento</div>
    </div>


    <div class="mb-3 form-check col-span-2 col-6">
       <section class="pl-5">
        <input type="checkbox" class="form-check-input" id="published" name="ispublished">
        <label class="form-check-label" for="published">Público</label>
       </section>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</form>
