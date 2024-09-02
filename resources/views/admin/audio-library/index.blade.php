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
                                                <a href="{{ route('audio-library.delete', $audioLibrary->id) }}"><i
                                                        class="fa fa-trash cursor-pointer text-danger"></i></a>
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
    @endsection
