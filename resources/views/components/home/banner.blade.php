<div class="banner-home">
    <section class="banner-secction-info">
        <div class="py-3">
            <x-home.login></x-home.login>
        </div>

        <section class="container banner-home-img" style="background-image: url({{asset('assets/banner.jpg')}})">
        </section>

        <section class="container wrapper">
            <div class="content w-100">

                <div class="wrapper-img">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" style="min-height: 500px; max-height: 500px">
                          <div class="carousel-item active">
                            <img style="object-fit: cover; width: 100%;" src="{{asset('assets/bg-home-min.jpg')}}" class="d-block w-100" alt="...">
                          </div>

                          <div class="carousel-item">
                            <img style="object-fit: cover;  width: 100%;" src="{{asset('assets/banner-2.jpg')}}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper-content d-flex justify-items-center">
                    <section class="w-100">
                        <div class="text-center mb-5">
                            <h1 class="w-100 pb-3">Materiales didácticos</h1>

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

            </div>
        </section>
    </section>
</div>
