<div class="banner-home" >
    <div class="py-3">
        <x-home.login></x-home.login>
    </div>
    <section class="container wrapper">
        <div class="content w-100">
            <div class="wrapper-content d-flex justify-items-center">
                <section class="w-100">
                    <div class="text-center mb-5">
                        <h1 class="w-100 mt-lg-5 mt-2 pb-3">Materiales didácticos</h1>

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
                <img class="mt-5" src="{{ asset('assets/svg/banner.svg') }}" alt="File">
            </div>
        </div>
    </section>
</div>
