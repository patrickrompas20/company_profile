@extends('layouts.front.app')

@section('title', 'Project')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">Project</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Project</h5>
                <h1>Our Recently Completed Projects</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
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
                <div class="text-center">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
