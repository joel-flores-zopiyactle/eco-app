<div>
    <div class="card card-book mb-3 shadow bg-white">
        @if ($document->image)
        <img src="{{asset($document->image->url)}}" class="card-img-top" alt="cover">
        @else
        <img src="{{asset('assets/empty-state.png')}}" class="card-img-top" alt="cover">
        @endif

        <div class="card-body">
          <h5 class="card-title">
            <strong>{{$document->title}}</strong>
          </h5>
          <p class="card-text">{{$document->description}}</p>
          <p class="card-text"><small class="text-body-secondary">Creado el {{ $document->created_at->formatLocalized('%d %B %Y') }}</small></p>
        </div>

        <div class="w-100 d-flex footer px-3">

            <a href="#" title="Me gusta">
                <span class="material-symbols-outlined">
                    thumb_up
                </span>
            </a>

            <a class="mx-3" href="#" title="Ver vista previa">
                <span class="material-symbols-outlined">
                    visibility
                </span>
            </a>

            <a href="#" title="Descargar archivo">
                <span class="material-symbols-outlined">
                    download_2
                </span>
            </a>
        </div>
      </div>
</div>
