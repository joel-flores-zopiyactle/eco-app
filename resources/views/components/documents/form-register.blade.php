<form>
    <div class="mb-3">
        <label for="title" class="form-label">Titulo del documento</label>
        <input type="text" class="form-control" id="title" aria-describedby="titleHelp">
        <div id="titleHelp" class="form-text">Ingrese el titulo de tu documento</div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Resumen</label>
        <textarea class="form-control" id="decsription" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select category">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
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
