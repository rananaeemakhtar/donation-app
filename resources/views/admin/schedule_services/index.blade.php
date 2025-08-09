@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Services Schedule</h1>
            <a class="btn btn-primary m-4" href="{{ route('schedule_services.create') }}"> Create Service Schedule </a>
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
                                        <th> Name </th>
                                        <th> Description </th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->name }}</td>
                                            <td>{!! $service->description !!}</td>
                                            <td>
                                                <a href="{{ route('schedule_services.edit', $service->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <a href="javascript:void(0);" onclick="confirmDelete({{ $service->id }})">
                                                    <i class="fa fa-trash cursor-pointer text-danger"></i>
                                                </a>

                                                <form id="delete-form-{{ $service->id }}"
                                                    action="{{ route('schedule_services.destroy', $service->id) }}"
                                                    method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

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
            function confirmDelete(serviceId) {
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
                        document.getElementById('delete-form-' + serviceId).submit();
                    }
                });
            }
        </script>
@endsection