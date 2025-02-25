@extends('layouts.admin.app')

@section('title', 'Edit Service')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Service</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.service.update', $service->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Use 'PUT' method for update --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit service</h4>
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
                                                <label>Service Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="type your service name" value="{{ $service->name }}"
                                                    required>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <input type="text" name="icon"
                                                    class="form-control @error('icon') is-invalid @enderror"
                                                    placeholder="Tempelkan kelas ikon Font Awesome di sini (contoh: fas fa-home)"
                                                    value="{{ $service->icon }}" required>
                                                <small class="text-muted">Kunjungi situs web <a
                                                        href="https://fontawesome.com/icons" target="_blank">Font
                                                        Awesome</a> untuk menemukan ikon dan nama kelasnya yang
                                                    sesuai.</small>
                                                @error('icon')
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
                                                <trix-editor input="content">{!! $service->content !!}</trix-editor>
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
