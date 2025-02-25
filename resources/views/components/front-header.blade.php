<!-- Spinner Start -->
<div id="spinner"
    class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-dark py-2 d-none d-md-flex">
    <div class="container">
        <div class="d-flex justify-content-between topbar">
            <div class="top-info">
                <small class="me-3 text-white-50"><a href="https://maps.app.goo.gl/EBb1jzh47phJVBHPA" target="_blank"><i
                            class="fas fa-map-marker-alt me-2 text-secondary"></i></a>Depan Indomaret, Jl. Raya
                    Politeknik, Kota Manado</small>
                <small class="me-3 text-white-50"><a href="#"><i
                            class="fas fa-envelope me-2 text-secondary"></i></a>Email@Example.com</small>
            </div>
            <div class="top-link">
                <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i
                        class="fab fa-facebook-f text-primary"></i></a>
                <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i
                        class="fab fa-twitter text-primary"></i></a>
                <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i
                        class="fab fa-instagram text-primary"></i></a>
                <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i
                        class="fab fa-linkedin-in text-primary"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid bg-primary bg-gradient">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-white fw-bold d-block">P<span class="text-secondary">T</span> </h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="{{ route('front.home.index') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('front.about.index') }}"
                        class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('front.service.index') }}"
                        class="nav-item nav-link {{ Request::is('service*') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('front.project.index') }}"
                        class="nav-item nav-link {{ Request::is('project') ? 'active' : '' }}">Projects</a>
                    <a href="{{ route('front.blog.index') }}"
                        class="nav-item nav-link {{ Request::is('blog*') ? 'active' : '' }}">Blog</a>
                    <a href="{{ route('front.home.index') }}#contact" class="nav-item nav-link ">Contact</a>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shirink-0">
                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                    <a href="https://wa.me/6285183045676" class="position-relative animated tada infinite">
                        <i class="fa fa-phone-alt text-white fa-2x"></i>
                        <div class="position-absolute" style="top: -7px; left: 20px;">
                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                        </div>
                    </a>
                </div>
                <div class="d-flex flex-column pe-4 border-end">
                    <span class="text-white-50">Ada pertanyaan?</span>
                    <span class="text-secondary">Hubungi: <a href="https://wa.me/6285183045676" class="text-secondary"
                            target="_blank">085183045676</a></span>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
