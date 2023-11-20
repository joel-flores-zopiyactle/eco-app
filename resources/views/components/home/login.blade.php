<nav class="w-100 d-flex justify-content-between px-4 text-white">
    <div class="logo py- text-dark pt-2">
        <a class="h4" style="text-decoration: none" href="{{ route('welcome')}}">Materiales <strong class="text-primary">2024</strong></a>
    </div>

    <div class="menu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-2">

            @if (Route::has('login'))
                <div class="d-flex align-items-center">
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-outline-light px-3 rounded-full" aria-current="page" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        @if ($showLoginIn)
                        <li class="nav-item ps-3">
                            <a class="btn btn-outline-light px-3 rounded-full" aria-current="page" href="{{ route('login') }}">Login In</a>
                        </li>
                        @endif
                    @endauth
                </div>
            @endif

        </ul>
    </div>
</nav>
