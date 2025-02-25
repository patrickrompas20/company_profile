@extends('layouts.admin.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    @can('users.create')
                                        <div class="col-6 col-sm-6 col-lg-6">
                                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary"> <i
                                                    class="fa fa-plus-square"></i> Add
                                                Data</a>
                                        </div>
                                    @endcan
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <form action="{{ route('admin.user.index') }}" method="get">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Profile Image</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col" style="width: 15%;text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $no => $user)
                                            <tr>
                                                <th scope="row" style="text-align:center">
                                                    {{ ++$no + ($users->currentPage() - 1) * $users->perPage() }}</th>
                                                <td>
                                                    <img src="{{ $user->image }}" alt="Post User"
                                                        style="width: 100px; height:100px; object-fit: cover;"
                                                        class="m-1 border rounded">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->getRoleNames() as $role)
                                                        @php
                                                            $roleClass = '';
                                                            if ($role === 'admin') {
                                                                $roleClass = 'badge-warning'; // Misalnya, berikan warna biru untuk peran admin
                                                            } elseif ($role === 'user') {
                                                                $roleClass = 'badge-success'; // Misalnya, berikan warna kuning untuk peran writer
                                                            } elseif ($role === 'mahasiswa') {
                                                                $roleClass = 'badge-danger';
                                                            } else {
                                                                $roleClass = 'badge-secondary'; // Warna default untuk peran lainnya
                                                            }
                                                        @endphp
                                                        <span class="badge {{ $roleClass }}">{{ $role }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    @can('users.edit')
                                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                                            class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                    @endcan
                                                    @can('users.delete')
                                                        <button onClick="Delete(this.id)" class="btn btn-sm  btn-danger"
                                                            id="{{ $user->id }}"><i class="fas fa-trash"></i></button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div style="text-align: center">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
    <script>
        //ajax delete
        function Delete(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "ARE YOU SURE ?",
                text: "WANT TO DELETE THIS DATA!",
                icon: "warning",
                buttons: [
                    'CANCEL',
                    'YES'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    // AJAX delete
                    jQuery.ajax({
                        url: "/admin/user/" + id,
                        data: {
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal("SUCCESS!", "DELETE DATA SUCCESSFULLY!", "success");
                                location.reload();
                            } else {
                                swal("FAILED!", "DELETE DATA FAILED!", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            swal("ERROR!", "An error occurred while deleting data.", "error");
                        }
                    });
                }
            });
        }
    </script>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
