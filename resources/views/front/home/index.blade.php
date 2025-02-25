@extends('layouts.front.app')

@section('title', 'Home')

@push('style')
    <!-- CSS Libraries -->
@endpush


@section('main')
    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                @foreach ($sliders as $key => $slider)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $key }}"
                        {{ $key == 0 ? 'class=active' : '' }} aria-label="Slide {{ $key + 1 }}"></li>
                @endforeach
            </ol>
            <!-- Carousel Items -->
            <div class="carousel-inner" role="listbox">
                @if ($sliders->count() > 0)
                    @foreach ($sliders as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $slider->image }}" class="img-fluid" alt="Slide {{ $key + 1 }}">
                            <div class="carousel-caption">
                                <div class="container carousel-content">
                                    <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6>
                                    <h1 class="text-white display-1 mb-4 animated fadeInRight">{{ $slider->title }}</h1>
                                    <p class="mb-4 text-white fs-5 animated fadeInDown">{!! Str::limit(strip_tags($slider->content), 120) !!}</p>
                                    <a href="" class="me-2">
                                        <button type="button"
                                            class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Get
                                            Started</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning">Tidak ada Data Slider untuk saat ini.</div>
                @endif
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Fact Start -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row">
                @foreach ($facts as $fact)
                    @if ($fact->success_customers > 0)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                            <div class="d-flex counter">
                                <h1 class="me-3 text-primary counter-value">{{ $fact->success_customers }}</h1>
                                <h5 class="text-white mt-1">Success in getting happy customer</h5>
                            </div>
                        </div>
                    @endif
                    @if ($fact->successful_business > 0)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                            <div class="d-flex counter">
                                <h1 class="me-3 text-primary counter-value">{{ $fact->successful_business }}</h1>
                                <h5 class="text-white mt-1">Thousands of successful business</h5>
                            </div>
                        </div>
                    @endif
                    @if ($fact->total_clients > 0)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                            <div class="d-flex counter">
                                <h1 class="me-3 text-primary counter-value">{{ $fact->total_clients }}</h1>
                                <h5 class="text-white mt-1">Total clients who love HighTech</h5>
                            </div>
                        </div>
                    @endif
                    @if ($fact->satisfied_reviews > 0)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                            <div class="d-flex counter">
                                <h1 class="me-3 text-primary counter-value">{{ $fact->satisfied_reviews }}</h1>
                                <h5 class="text-white mt-1">Stars reviews given by satisfied clients</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Fact End -->

    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative about-img">
                        <img src="{{ asset('front/img/about-3.jpg') }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('front/img/about-4.jpg') }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">About Us</h5>
                    <h1 class="mb-4">About PT</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum.
                        Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus,
                        ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec
                        elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo nec erat
                        vestibulum, et malesuada augue laoreet.</p>
                    <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet
                        leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque
                        quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
                    <a href="{{ route('front.about.index') }}"
                        class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Services</h5>
                <h1>Layanan yang Dibangun Khusus Untuk Bisnis Anda</h1>
            </div>
            <div class="row g-5 services-inner">
                @if ($services->count() > 0)
                    @foreach ($services->slice(0, 6) as $service)
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                            <div class="services-item bg-light">
                                <div class="p-4 text-center services-content">
                                    <div class="services-content-icon">
                                        <i class="fa {{ $service->icon }} fa-3x mb-4 text-primary"></i>
                                        <h5 class="mb-3">{{ Str::limit(strip_tags($service->name), 30) }}</h5>
                                        <p class="small mb-4">{!! Str::limit(strip_tags($service->content), 160, '') !!}</p>
                                        <a href="{{ route('front.service.show', $service->slug) }}"
                                            class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Tidak ada Data Service untuk saat ini.</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Project</h5>
                <h1>Proyek Kami yang Baru Selesai</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @if ($projects->count() > 0)
                    @foreach ($projects->slice(0, 6) as $project)
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                            <div class="project-item">
                                <div class="project-img">
                                    <img src="{{ $project->image }}" class="img-fluid w-100 rounded" alt="Project Photo"
                                        style="height: 300px; object-fit:cover">
                                    <div class="project-content">
                                        <a href="#" class="text-center">
                                            <h4 class="text-secondary">{{ $project->title }}</h4>
                                            <p class="m-0 text-white">
                                                {!! Str::limit(strip_tags($project->description), 20, '') !!}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Tidak ada Data Project untuk saat ini.</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Project End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Blog</h5>
                <h1>Blog & Berita Terbaru</h1>

            </div>
            <div class="row g-5 justify-content-center">
                @if ($posts->count() > 0)
                    @foreach ($posts->slice(0, 3) as $post)
                        <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                            <div class="blog-item position-relative bg-light rounded">
                                <img src="{{ $post->image }}" class="img-fluid w-100 rounded-top"
                                    style="height: 250px; object-fit: cover;" alt="">
                                <span class="position-absolute px-4 py-3 bg-primary text-white rounded"
                                    style="top: -28px; right: 20px;">{{ $post->category->name ?? 'No Data' }}</span>
                                <div class="blog-btn d-flex justify-content-between position-relative px-3"
                                    style="margin-top: -75px;">
                                    <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                        <a href="{{ route('front.blog.show', $post->slug) }}" class="btn text-white">Read
                                            More</a>
                                    </div>
                                    <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                        <div class="blog-icon-1">
                                            <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                                        </div>
                                        <div class="blog-icon-2">
                                            <a href="" class="btn me-1" target="_blank"><i
                                                    class="fab fa-facebook-f text-white"></i></a>
                                            <a href="" class="btn me-1"><i
                                                    class="fab fa-twitter text-white"></i></a>
                                            <a href="" class="btn me-1"><i
                                                    class="fab fa-instagram text-white"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                    <img src="{{ $post->team->image ?? 'No data' }}"
                                        class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <h6 class="">{{ $post->team->fullname ?? 'No data' }}</h6>
                                    <span class="text-secondary small">Last updated
                                        {{ $post->created_at->diffForHumans() }}</span>
                                    <p class="small py-2 text-center">{!! Str::limit(strip_tags($post->content), 170) !!}</p>
                                </div>
                                <div
                                    class="blog-coment d-flex justify-content-between px-4 py-3 border bg-primary rounded-bottom">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Tidak ada Postingan Blog saat ini.</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Team</h5>
                <h1>Temui Tim ahli kami</h1>
            </div>
            <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                @if ($teams->count() > 0)
                    @foreach ($teams as $team)
                        <div class="rounded team-item">
                            <div class="team-content">
                                <div class="team-img-icon">
                                    <div class="team-img rounded-circle">
                                        <img src="{{ $team->image }}" class="img-fluid w-100 rounded-circle"
                                            style="height: 300px; object-fit: cover;" alt="">
                                    </div>
                                    <div class="team-name text-center py-3">
                                        <h4 class="">{{ $team->fullname }}</h4>
                                        <p class="m-0">{{ $team->jabatan }}</p>
                                    </div>
                                    <div class="team-icon d-flex justify-content-center pb-4">
                                        <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                            href="{{ $team->facebook }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                            href="{{ $team->twitter }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                            href="{{ $team->instagram }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                            href="{{ $team->linkedin }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Tidak ada Data Team untuk saat ini.</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Testimonial</h5>
                <h1>Kata Klien Kami!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
                @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item border p-4" style="height: 350px">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <img src="{{ $testimonial->image }}" class="rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                </div>
                                <div class="ms-4">
                                    <h5 class="text-secondary">{{ $testimonial->name }}</h4>
                                        <p class="m-0 pb-3 small">{{ $testimonial->profession }}</p>
                                        <div class="d-flex pe-5">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->star)
                                                    <i class="fas fa-star me-1 text-primary"></i>
                                                @else
                                                    <i class="far fa-star me-1 text-primary"></i>
                                                @endif
                                            @endfor
                                        </div>
                                </div>
                            </div>
                            <div class="border-top mt-4 pt-1">
                                <p class="mb-0">"{!! Str::limit(strip_tags($testimonial->content), 270) !!}"
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Tidak ada Data Testimonial untuk saat ini.</div>
                @endif

            </div>
        </div>
    </div>

    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;"
                id="contact">
                <h5 class="text-primary">Get In Touch</h5>
                <h1 class="mb-3">Hubungi untuk pertanyaan apa pun</h1>
                {{-- <p class="mb-2">The contact form is currently inactive. Get a functional and working contact form with
                    Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a
                        href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
            </div>
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Address</h4>
                                <a href="https://maps.app.goo.gl/EBb1jzh47phJVBHPA" target="_blank" class="h5">Depan
                                    Indomaret, Jl. Raya Politeknik, Kota Manado</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Call Us</h4>
                                <a class="h5" href="https://wa.me/6285183045676" target="_blank">085183045676</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Email Us</h4>
                                <a class="h5" href="mailto:info@example.com" target="_blank">info@example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="p-5 h-100 rounded contact-map">
                            <iframe class="rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4203504037005!2d124.88549427469832!3d1.516780261017111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287a18483361a39%3A0xf39844adda82eb95!2sPT.%20Solusi%20Inovasi%20Informatika!5e0!3m2!1sid!2sid!4v1710862286361!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="p-5 rounded contact-form">
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control border-0 py-3" placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Project">
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Message"></textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg-primary text-white py-3 px-5" type="button">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection


@push('scripts')
    <!-- JS Libraies -->
@endpush
