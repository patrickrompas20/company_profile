@extends('layouts.admin.app')

@section('title', 'Teams')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Teams</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Teams</a></div>
                    <div class="breadcrumb-item">New Team</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add new team</h4>
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
                                                    placeholder="type your fullname" value="{{ old('fullname') }}" required>
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
                                                    placeholder="type your jabatan" value="{{ old('jabatan') }}" required>
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
                                                    placeholder="type your link facebook" value="{{ old('facebook') }}">
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
                                                    placeholder="type your link twitter" value="{{ old('twitter') }}">
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
                                                    placeholder="type your link instagram" value="{{ old('instagram') }}">
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
                                                    placeholder="type your link linkedin" value="{{ old('linkedin') }}">
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
                                    <a href="{{ url()->previous() }}" class="btn btn-warning mr-1"><i
                                            class="fa fa-reply"></i>Back</a>
                                    <button class="btn btn-primary mr-1" type="submit"><i
                                            class="fa fa-save"></i>Save</button>
                                    <button class="btn btn-light btn-resent" type="reset"><i
                                            class="fa fa-refresh"></i>Reset</button>
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

    <!-- Page Specific JS File -->
@endpush
