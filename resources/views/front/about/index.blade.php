@extends('layouts.front.app')

@section('title', 'About')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
                    <h1 class="mb-4">About HighTech Agency And It's Innovative IT Solutions</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum.
                        Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus,
                        ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec
                        elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo nec erat
                        vestibulum, et malesuada augue laoreet.</p>
                    <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet
                        leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque
                        quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Team</h5>
                <h1>Meet our expert Team</h1>
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
                                            href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
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

@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
