<div class="banner-home" style="background-image: url({{ asset('assets/banner.jpg') }})">
    <section>
        <nav class="w-100 d-flex justify-content-between px-4 text-white">
            <div class="logo">
                <h3>App 2023</h3>
            </div>

            <div class="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if (Route::has('login'))
                        <div class="d-flex align-items-center">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                                </li>
                            @else
                                <li class="nav-item ps-3">
                                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login In</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item ps-3">
                                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </div>
                    @endif

                </ul>
            </div>
        </nav>

        <div class="w-100 text-center">
            <h1 class="w-100">Materiales didacticos</h1>
        </div>
    </section>


    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>
