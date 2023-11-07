<nav class="navbar navbar-expand-lg bg-light text-while mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home')}}">CRM Docs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active d-flex align-items-center" aria-current="page" href="{{ route('home')}}">
            <span class="material-symbols-outlined pr-2">
                home
            </span>
            Home
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
