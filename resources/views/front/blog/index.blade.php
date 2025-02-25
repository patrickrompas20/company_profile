@extends('layouts.front.app')

@section('title', 'Blog')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Our Blog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Blog</h5>
                <h1>Latest Blog & News</h1>

            </div>
            <div class="row g-5 justify-content-center">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
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
                                            <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
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
                                    <p class="small py-2">{!! Str::limit(strip_tags($post->content), 170) !!}</p>
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
                <div class="text-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
