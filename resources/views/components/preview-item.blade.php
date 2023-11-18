<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-action mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{$document->id}}">
    <img src="{{asset('assets/svg/view.svg')}}" width="25" alt="view">
</button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$document->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$document->id}}" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-4">Vista prevía</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="modal-title fs-3 mb-2" id="exampleModalLabel">{{$document->title}}</h1>
                </div>

                <div class="col-5">
                    <div class="w-100">
                        <img class="w-100 object-fit-none border rounded" src="{{$document->image->url}}" alt="" srcset="">
                    </div>
                </div>
                <div class="col-6">
                    <section>
                        <p>
                            {{$document->description}}
                        </p>
                    </section>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
