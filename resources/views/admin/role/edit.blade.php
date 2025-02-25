@extends('layouts.admin.app')

@section('title', 'Edit Role')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Role</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Roles</a></div>
                    <div class="breadcrumb-item">Edit Role</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.role.update', $role->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Use PUT method for update --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Role</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Role Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $role->name }}" placeholder="Type your role name">
                                                @error('name')
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
                                                <label class="d-block">Permissions</label>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" id="select-all-permissions"
                                                        class="form-check-input permission-checkbox"
                                                        {{ count($role->permissions) == count($permissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label">select all</label>
                                                </div>
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="permissions[]"
                                                            class="form-check-input permission-checkbox"
                                                            value="{{ $permission->name }}" id="{{ $permission->id }}"
                                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                        <label class="form-check-label">{{ $permission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('admin.role.index') }}" class="btn btn-warning mr-1"><i
                                            class="fa fa-reply"></i> Back</a>
                                    <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-save"></i>
                                        Update</button>
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
    <script>
        // Select All Permissions
        $('#select-all-permissions').click(function() {
            $('.permission-checkbox').prop('checked', $(this).prop('checked'));
        });

        // Handle individual permission checkbox
        $('.permission-checkbox').change(function() {
            if ($('.permission-checkbox:checked').length == $('.permission-checkbox').length) {
                $('#select-all-permissions').prop('checked', true);
            } else {
                $('#select-all-permissions').prop('checked', false);
            }
        });
    </script>
    <!-- Page Specific JS File -->
@endpush
