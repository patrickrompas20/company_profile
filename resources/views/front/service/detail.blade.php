@extends('layouts.front.app')

@section('title', 'Services')

@push('style')
    <!-- Tambahkan gaya tambahan di sini -->
    <style>
        .detail-berita {
            padding-top: 80px;
            /* Menyesuaikan jarak dari atas */
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
                    <h2 class="mb-3 text-center">{{ $service->name }}</h2>
                    <img src="{{ $service->image }}" alt="{{ $service->name }}"
                        class="w-100 img-fluid img-thumbnail mx-auto d-block rounded">
                    <article class="my-3 shadow-sm p-3 bg-body-tertiary rounded">
                        {!! $service->content !!}
                    </article>
                    <a href="{{ route('front.service.index') }}" class="btn btn-danger btn-sm btn-back mt-4">
                        <i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
