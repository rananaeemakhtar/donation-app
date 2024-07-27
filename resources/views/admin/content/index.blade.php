@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Content Entries</h1>
            @if(count($entries) === 0)
                <a class="btn btn-primary m-4" href="{{ route('content.create') }}"> Create Content Entry </a>
            @endif
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
                                        <th> Section </th>
                                        <th> Content </th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $content)
                                        <tr>
                                            <td>{{ $content->section }}</td>
                                            <td>{{ $content->content }}</td>
                                            <td>
                                                <a href="{{ route('content.edit', $content->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <a href="{{ route('content.delete', $content->id) }}"><i
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
