@extends('layouts.admin.app')

@section('title', 'Edit Team')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Team</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.team.update', $team->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Use 'PUT' method for update --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit team</h4>
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
                                                <label>Fullname</label>
                                                <input type="text" name="fullname"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    placeholder="type your fullname" value="{{ $team->fullname }}" required>
                                                @error('fullname')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" name="jabatan"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    placeholder="type your jabatan" value="{{ $team->jabatan }}" required>
                                                @error('jabatan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook"
                                                    class="form-control @error('facebook') is-invalid @enderror"
                                                    placeholder="type your link facebook" value="{{ $team->facebook }}">
                                                @error('facebook')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter"
                                                    class="form-control @error('twitter') is-invalid @enderror"
                                                    placeholder="type your link twitter" value="{{ $team->twitter }}">
                                                @error('twitter')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram"
                                                    class="form-control @error('instagram') is-invalid @enderror"
                                                    placeholder="type your link instagram" value="{{ $team->instagram }}">
                                                @error('instagram')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" name="linkedin"
                                                    class="form-control @error('linkedin') is-invalid @enderror"
                                                    placeholder="type your link linkedin" value="{{ $team->linkedin }}">
                                                @error('linkedin')
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
