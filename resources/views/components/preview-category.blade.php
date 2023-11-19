<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-action mx-3" data-bs-toggle="modal"
data-bs-target="#staticBackdrop{{$category->id}}">
    <img src="{{asset('assets/svg/view.svg')}}" width="25" alt="view">
</button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop{{$category->id}}" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Vista prevía</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>{{$category->name}}</h3>

          <p>{{$category->description}}</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
