@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Testimonial</h1>
            <a class="btn btn-primary m-4" href="{{ route('testimonial.create') }}"> Create Testimonail </a>
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
                                        <th>Ministry</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->testimonial_ministry->title }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->designation }}</td>
                                            <td>
                                                <a href="{{ route('testimonial.edit', $testimonial->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <a href="{{ route('testimonial.delete', $testimonial->id) }}"><i
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