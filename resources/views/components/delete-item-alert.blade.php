<!-- Button trigger modal -->
<button type="button"
id="delete-item"
class="btn btn-outline-danger btn-action"
data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$itemId}}">
    <span class="material-symbols-outlined text-sm">
        delete
    </span>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$itemId}}" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-4" id="staticBackdropLabel{{$itemId}}">{{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body fs-5">
        {{$subtitle}}
    </div>

    <form  class="modal-footer border-0" action="{{ route($routeUrl, ["id" => $itemId])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Continuar</button>
    </form>
    </div>
</div>
</div>

