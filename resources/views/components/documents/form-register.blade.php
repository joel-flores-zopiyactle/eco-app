<form action="{{ route('register-document') }}" method="POST">
    @csrf

    {{ $errors}}
    <div class="mb-3">
        <label for="title" class="form-label">Titulo del documento</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="titleHelp" name="title">
        <div id="titleHelp" class="form-text @error('title') is-invalid @enderror">Ingrese el titulo de tu documento</div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Resumen</label>
        <textarea class="form-control" id="decsription" rows="3" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select category" name="category_id">
            <option selected>Seleccione una categoria</option>
            @foreach ($categorys as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Portada</label>
        <input class="form-control" type="file" id="file" accept=".jpg, .jpeg, .png, .gif">
        <div id="fileHelp" class="form-text">Sube un imagen para la vista de tu documento</div>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Archivo</label>
        <input class="form-control" type="file" id="file" accept=".jpg, .jpeg, .png, .gif, .pdf, .mp3, .mp4, .avi, .mov">
        <div id="fileHelp" class="form-text">Sube el archivo ligado al documento</div>
    </div>


    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="published">
        <label class="form-check-label" for="published">Público</label>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
