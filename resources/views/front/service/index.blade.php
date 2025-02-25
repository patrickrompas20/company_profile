@extends('layouts.front.app')

@section('title', 'Service')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Services</h5>
                <h1>Services Built Specifically For Your Business</h1>
            </div>
            <div class="row g-5 services-inner">
                @if ($services->count() > 0)
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                            <div class="services-item bg-light">
                                <div class="p-4 text-center services-content">
                                    <div class="services-content-icon">
                                        <i class="fa {{ $service->icon }} fa-3x mb-4 text-primary"></i>
                                        <h5 class="mb-3">{{ Str::limit(strip_tags($service->name), 30) }}</h5>
                                        <p class="small mb-4">{!! Str::limit(strip_tags($service->content), 180) !!}</p>
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

                <div class="text-center">
                    {{ $services->links() }}
                </div>

                {{-- <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-file-code fa-3x mb-4 text-primary"></i>
                                <h4 class="mb-3">Web Development</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-external-link-alt fa-3x mb-4 text-primary"></i>
                                <h4 class="mb-3">UI/UX Design</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fas fa-user-secret fa-3x mb-4 text-primary"></i>
                                <h4 class="mb-3">Web Cecurity</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                    More</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-envelope-open fa-3x mb-4 text-primary"></i>
                                <h4 class="mb-3">Digital Marketing</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fas fa-laptop fa-3x mb-4 text-primary"></i>
                                <h4 class="mb-3">Programming</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Services End -->



@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
