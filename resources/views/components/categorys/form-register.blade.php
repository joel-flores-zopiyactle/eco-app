<form action="/category" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="titleHelp">
        <div id="titleHelp" class="form-text">Ingrese el titulo de la categoria</div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripcón</label>
        <textarea class="form-control" id="decsription" name="description" rows="3"></textarea>
    </div>


   <div class="w-100">
    <button type="submit" class="btn btn-primary w-100">Crear categoria</button>
   </div>

</form>
