<div class="banner-home">
    <section class="banner-secction-info">
        <div class="py-3">
            <x-home.login></x-home.login>
        </div>
        <section class="container wrapper">
            <div class="content w-100">
                <div class="wrapper-content d-flex justify-items-center">
                    <section class="w-100">
                        <div class="text-center mb-5">
                            <h1 class="w-100 mt-lg-5 pb-3">Materiales didácticos</h1>

                            <section class="mt-3 mb-5 text-left w-75">
                                <p>
                                    Explora los recursos más destacados de investigación y documentación en diversas áreas, como física, economía, material didáctico, productividad,
                                    entre otras, desarrollados por estudiantes y profesores.
                                </p>
                            </section>
                        </div>

                        <div class="d-flex justify-content-start">
                            <a class="btn btn-success w-50 btn-init-show-documents" href="{{ route('books-page') }}">
                                Empezar busqueda
                            </a>
                        </div>
                    </section>
                </div>

                <div class="wrapper-img">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" style="min-height: 500px; max-height: 500px">
                          <div class="carousel-item active">
                            <img style="object-fit: cover; width: 100%;" src="{{asset('assets/banner.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img  style="object-fit: cover;  width: 100%;" src="{{asset('assets/svg/banner.svg')}}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img style="object-fit: cover;  width: 100%;" src="{{asset('assets/banner-2.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    {{-- <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{asset('assets/banner.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('assets/bg-home-min.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('assets/banner-2.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div> --}}
                </div>
            </div>
        </section>
    </section>
</div>
