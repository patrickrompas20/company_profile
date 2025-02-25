@extends('layouts.front.app')

@section('title', 'Blog')

@push('style')
    <!-- Tambahkan gaya tambahan di sini -->
    <style>
        .detail-berita {
            padding-top: 80px;
            /* Menyesuaikan jarak dari atas */
        }

        .detail-berita .berita-meta {
            font-size: 14px;
            color: #6c757d;
        }

        .detail-berita img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .detail-berita article {
            font-size: 16px;
            line-height: 1.6;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
@endpush

@section('main')
    <section class="detail-berita my-4" id="detail-berita">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <div class="berita-meta mb-4">
                        <span class="small">Category: <a href="#"
                                class="text-decoration-none">{{ $post->category->name ?? 'No Data' }}</a></span>
                        <span class="mx-1">•</span>
                        <span class="small">Author: {{ $post->team->fullname ?? 'No data' }}</span>
                        <span class="mx-1">•</span>
                        <span class="small"><i class="fas fa-calendar-week"></i> Last updated:
                            {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
                    <article class="my-3">
                        {!! $post->content !!}
                    </article>
                    <a href="{{ route('front.blog.index') }}" class="btn btn-danger btn-sm btn-back mt-4">
                        <i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
