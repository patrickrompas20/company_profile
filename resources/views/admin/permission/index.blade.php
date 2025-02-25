@extends('layouts.admin.app')

@section('title', 'Permissions')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permissions</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Permissions</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Permissions</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <form action="{{ route('admin.permission.index') }}" method="get">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="q" placeholder="Type name..."
                                                        class="form-control">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-info"><i
                                                                class="fa fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Permissions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $no => $permission)
                                                <tr>
                                                    <th scope="row">
                                                        {{ ++$no + ($permissions->currentPage() - 1) * $permissions->perPage() }}
                                                    </th>
                                                    <td>
                                                        {{ $permission->name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        {{ $permissions->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
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
