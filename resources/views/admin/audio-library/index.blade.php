@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Audio Library Entries</h1>
            <a class="btn btn-primary m-4" href="{{ route('audio-library.create') }}"> Create Library Entry </a>
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
                                        <th> Recording Date </th>
                                        <th> Updated Date </th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $audioLibrary)
                                        <tr>
                                            <td>{{ $audioLibrary->title }}</td>
                                            <td>{{ $audioLibrary->description }}</td>
                                            <td>{{ $audioLibrary->date_of_recording }}</td>
                                            <td>{{ $audioLibrary->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('audio-library.edit', $audioLibrary->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <!-- <a href="{{ route('audio-library.delete', $audioLibrary->id) }}"><i
                                                                class="fa fa-trash cursor-pointer text-danger"></i></a> -->
                                                <a href="javascript:void(0);" onclick="confirmDelete({{ $audioLibrary->id }})">
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
            function confirmDelete(audioLibraryId) {
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
                        window.location.href = "{{ url('/dashboard/audio-library') }}/" + audioLibraryId + "/delete";
                    }
                });
            }
        </script>
@endsection