@extends('layouts.admin.app')

@section('title', 'Edit Fact')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Fact</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.fact.index') }}">Facts</a></div>
                    <div class="breadcrumb-item">Edit Fact</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.fact.update', $fact->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit fact</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 col-lg-3 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Success Customers</label>
                                                <input type="number" name="success_customers"
                                                    class="form-control @error('success_customers') is-invalid @enderror"
                                                    placeholder="Type your success_customers"
                                                    value="{{ $fact->success_customers }}" required>
                                                @error('success_customers')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3 col-lg-3 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Successful Business</label>
                                                <input type="number" name="successful_business"
                                                    class="form-control @error('successful_business') is-invalid @enderror"
                                                    placeholder="Type your successful_business"
                                                    value="{{ $fact->successful_business }}" required>
                                                @error('successful_business')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3 col-lg-3 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Total Clients</label>
                                                <input type="number" name="total_clients"
                                                    class="form-control @error('total_clients') is-invalid @enderror"
                                                    placeholder="Type your total_clients" value="{{ $fact->total_clients }}"
                                                    required>
                                                @error('total_clients')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3 col-lg-3 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Satisfied Reviews</label>
                                                <input type="number" name="satisfied_reviews"
                                                    class="form-control @error('satisfied_reviews') is-invalid @enderror"
                                                    placeholder="Type your satisfied_reviews"
                                                    value="{{ $fact->satisfied_reviews }}" required>
                                                @error('satisfied_reviews')
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
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
