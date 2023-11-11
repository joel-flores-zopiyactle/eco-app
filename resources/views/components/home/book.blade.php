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

        <div class="w-100 d-flex footer p-3">

            <a class="w-100 btn btn-primary d-flex justify-items-center justify-content-center text-white"
            href="{{route('dowloand-file', ['id' => $document->file->id ])}}"
            title="Descargar archivo">
                <span class="material-symbols-outlined me-1">
                    download_2
                </span>
                Descargar documento
            </a>
        </div>
      </div>
</div>
