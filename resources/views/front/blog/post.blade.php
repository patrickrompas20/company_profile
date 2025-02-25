@extends('layouts.front.app')

@section('title', 'Berita')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <section class="berita">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <div class="sec-heading" data-aos="fade-down" data-aos-duration="1000" style="margin-bottom: -6px;">
                        <h3 class="sec-title">Berita</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-auto mt-5">
                    @if ($posts->count())
                        <div class="card mb-4">
                            <a href="{{ route('front.berita.show', $posts[0]->id) }}"><img class="card-img-top"
                                    src="{{ $posts[0]->image }}" alt="..."
                                    style="width: 100%; height: 300px; object-fit: cover;" /></a>
                            <div class="card-body">
                                <div class="small text-muted" style="font-size: 14px;"><a href=""
                                        class="text-decoration-none"
                                        style="font-size:14px;">{{ $posts[0]->category->name ?? 'No Data' }}</a>
                                    Last updated
                                    {{ $posts[0]->created_at->diffForHumans() }}</div>
                                <h3 class="card-title mt-2">{{ Str::limit(strip_tags($posts[0]->title), 60) }}</h3>
                                <p class="card-text" style="font-size: 14px;">
                                    <small class="text-body-secondary">
                                        {!! Str::limit(strip_tags($posts[0]->content), 170) !!}
                                    </small>
                                </p>
                                <a class="btn btn-primary" href="{{ route('front.berita.show', $posts[0]->id) }}">Read More
                                    →</a>
                            </div>
                        </div>
                    @else
                        <p class="text-center fs-4">No post found</p>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <a href="{{ route('front.berita.show', $post->id) }}">
                                <img src="{{ $post->image }}" class="card-img-top" alt="..."
                                    style="width: 100%; height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <div class="small text-muted" style="font-size: 14px"><a href=""
                                        class="text-decoration-none">{{ $post->category->name ?? 'No Data' }}</a>
                                    Last updated
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                                <h5 class="card-title">{{ Str::limit(strip_tags($post->title), 50) }}</h5>
                                <p class="card-text" style="font-size: 14px;">
                                    <small class="text-body-secondary">
                                        {!! Str::limit(strip_tags($post->content), 100) !!}
                                    </small>
                                </p>
                                <a href="{{ route('front.berita.show', $post->id) }}" class="btn btn-primary">Read More
                                    →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
