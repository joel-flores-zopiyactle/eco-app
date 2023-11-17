{{-- Search --}}
<section class="w-50">
    <form action="{{ route($routeUrl)}}" class="d-flex mb-3" role="search" method="POST" autocomplete="off">
        @csrf
        <input class="form-control me-2" type="search" name="keywords" placeholder="{{$placeholder}}" aria-label="Search">
        <button class="btn btn-outline-secondary text-dark d-flex" type="submit">
            <span class="material-symbols-outlined ms-1">
                search
            </span>
            {{$labelBtn}}
        </button>
    </form>
</section>
