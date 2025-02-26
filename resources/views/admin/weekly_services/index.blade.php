@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Announcements</h1>
            <a class="btn btn-primary m-4" href="{{ route('weekly_services.create') }}"> Create Announcement </a>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th> Title </th>
                                        <th> Description </th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                <a href="{{ route('weekly_services.edit', $service->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <!-- <a href="{{ route('weekly_services.delete', $service->id) }}"><i
                                                                class="fa fa-trash cursor-pointer text-danger"></i></a> -->
                                                <a href="javascript:void(0);" onclick="confirmDelete({{ $service->id }})">
                                                    <i class="fa fa-trash cursor-pointer text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(announcementId) {
                Swal.fire({
                    title: "You won't be able to revert this!",
                    text: "Are you sure you want to delete or remove?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/dashboard/weekly-services') }}/" + announcementId + "/delete";
                    }
                });
            }
        </script>
@endsection