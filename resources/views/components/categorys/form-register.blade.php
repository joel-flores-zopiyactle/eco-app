
<x-alert></x-alert>

<form action="/category" method="POST" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Titulo</label>
        <input type="text" id="name" name="name" aria-describedby="titleHelp"
        class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
        <div id="titleHelp" class="form-text">Ingrese el titulo de la categoria</div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripcón</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
        @error('description')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <section class="form-check ">
         <input type="checkbox" class="form-check-input" id="published" name="ispublished">
         <label class="form-check-label" for="published">Público</label>
        </section>
     </div>


   <div class="w-100">
    <button type="submit" class="btn btn-primary w-100">Crear categoria</button>
   </div>

</form>
