@extends('layouts.admin.app')

@section('title', 'Edit Slider')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Slider</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.slider.update', $slider->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Use 'PUT' method for update --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit slider</h4>
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
                                                <label>Title</label>
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    placeholder="type your title" value="{{ $slider->title }}" required>
                                                @error('title')
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
                                                <trix-editor input="content">{!! $slider->content !!}</trix-editor>
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
                                    <a href="{{ url()->previous() }}" class="btn btn-warning mr-1">
                                        <i class="fa fa-reply-all"></i> Back</a>
                                    <button class="btn btn-primary mr-1" type="submit">
                                        <i class="fa fa-save"></i> Update</button>
                                    <button class="btn btn-light btn-reset" type="reset">
                                        <i class="fa fa-refresh"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
