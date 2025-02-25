@extends('layouts.admin.app')

@section('title', 'Facts')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Facts</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Facts</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Facts</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    @can('facts.create')
                                        <div class="col-6 col-sm-6 col-lg-6">
                                            <a href="{{ route('admin.fact.create') }}" class="btn btn-primary"><i
                                                    class="fa fa-plus-square"></i> Add Data</a>
                                        </div>
                                    @endcan
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <form action="{{ route('admin.fact.index') }}" method="get">
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
                                    <table class="table-bordered table-md table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Success Customers</th>
                                                <th scope="col" class="text-center">Successful Business</th>
                                                <th scope="col" class="text-center">Total Client</th>
                                                <th scope="col" class="text-center">Satisfied Reviews</th>
                                                <th scope="col" class="d-flex justify-content-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($facts as $no => $fact)
                                                <tr>
                                                    <th scope="row" class="text-center align-middle">
                                                        {{ ++$no + ($facts->currentPage() - 1) * $facts->perPage() }}
                                                    </th>
                                                    <td>{{ $fact->success_customers }}</td>
                                                    <td>{{ $fact->successful_business }}</td>
                                                    <td>{{ $fact->total_clients }}</td>
                                                    <td>{{ $fact->satisfied_reviews }}</td>
                                                    <td class="text-center align-middle">
                                                        @can('facts.edit')
                                                            <a href="{{ route('admin.fact.edit', $fact->id) }}"
                                                                class="btn btn-success btn-sm m-2"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('facts.delete')
                                                            <button onClick="Delete(this.id)" class="btn btn-sm  btn-danger"
                                                                id="{{ $fact->id }}"><i class="fas fa-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="text-align: center">
                                        {{ $facts->links() }}
                                    </div>
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
                        url: "/admin/fact/" + id,
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
