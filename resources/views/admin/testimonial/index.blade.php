@extends('layouts.admin.app')

@section('title', 'Testimonials')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Testimonials</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Testimonials</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Testimonials</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    @can('testimonials.create')
                                        <div class="col-6 col-sm-6 col-lg-6">
                                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary"><i
                                                    class="fa fa-plus-square"></i> Add Data</a>
                                        </div>
                                    @endcan
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <form action="{{ route('admin.testimonial.index') }}" method="get">
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
                                                <th scope="col" class="text-center">Image</th>
                                                <th scope="col" class="text-center">Name</th>
                                                <th scope="col" class="text-center">Profession</th>
                                                <th scope="col" class="text-center">Star</th>
                                                <th scope="col" class="text-center">Content</th>
                                                <th scope="col" class="d-flex justify-content-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $no => $testimonial)
                                                <tr>
                                                    <th scope="row" class="text-center align-middle">
                                                        {{ ++$no + ($testimonials->currentPage() - 1) * $testimonials->perPage() }}
                                                    </th>
                                                    <td class="text-center">
                                                        <img src="{{ $testimonial->image }}" alt="Testimonial Photo"
                                                            style="width: 100px; height: 100px; object-fit: cover;"
                                                            class="m-1 border rounded">
                                                    </td>
                                                    <td>{{ $testimonial->name }}</td>
                                                    <td>{{ $testimonial->profession }}</td>
                                                    <td>{{ $testimonial->star }}</td>
                                                    <td>
                                                        {!! Str::limit(strip_tags($testimonial->content), 150, '...') !!}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @can('testimonials.edit')
                                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                                class="btn btn-success btn-sm m-2"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('testimonials.delete')
                                                            <button onClick="Delete(this.id)" class="btn btn-sm  btn-danger"
                                                                id="{{ $testimonial->id }}"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="text-align: center">
                                        {{ $testimonials->links() }}
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
                        url: "/admin/testimonial/" + id,
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
