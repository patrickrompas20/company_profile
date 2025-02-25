@extends('layouts.admin.app')

@section('title', 'Testimonial')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Testimonial</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Testimonials</a></div>
                    <div class="breadcrumb-item">New Testimonial</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add new testimonial</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image"
                                                    class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="type your name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Profession</label>
                                                <input type="text" name="profession"
                                                    class="form-control @error('profession') is-invalid @enderror"
                                                    placeholder="type your profession" value="{{ old('profession') }}"
                                                    required>
                                                @error('profession')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Star</label>
                                                <select name="star" id="star"
                                                    class="form-control selectric @error('star') is-invalid @enderror">
                                                    <option value="">-- Choose Stars --</option>
                                                    <option value="1" {{ old('star') == '1' ? 'selected' : '' }}>1 Star
                                                    </option>
                                                    <option value="2" {{ old('star') == '2' ? 'selected' : '' }}>2
                                                        Stars</option>
                                                    <option value="3" {{ old('star') == '3' ? 'selected' : '' }}>3
                                                        Stars</option>
                                                    <option value="4" {{ old('star') == '4' ? 'selected' : '' }}>4
                                                        Stars</option>
                                                    <option value="5" {{ old('star') == '5' ? 'selected' : '' }}>5
                                                        Stars</option>
                                                </select>
                                                @error('star')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <input id="content" type="hidden" name="content">
                                                <trix-editor input="content"></trix-editor>
                                                @error('content')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-warning mr-1"><i
                                            class="fa fa-reply"></i> Back</a>
                                    <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-save"></i>
                                        Save</button>
                                    <button class="btn btn-light btn-resent" type="reset"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
