@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Events</h1>
            <a class="btn btn-primary m-4" href="{{ route('ministry.create') }}"> Create Ministry </a>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th> Title </th>
                                        <th data-type="url">Url</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ministries as $ministry)
                                        <tr>
                                            <td>{{ $ministry->title }}</td>
                                            <td>{{ $ministry->url }}</td>
                                            <td>
                                                <a href="{{ route('ministry.edit', $ministry->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <a href="{{ route('ministry.delete', $ministry->id) }}"><i
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