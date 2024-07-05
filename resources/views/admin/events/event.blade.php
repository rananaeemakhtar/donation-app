@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1 class="mb-5">Data Tables</h1>
            <a class="btn btn-primary m-4" href="{{ route('create.events') }}"> Create Events </a>
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
                                        <th>
                                            <b>T</b>ittle
                                        </th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                        <th data-type="time">Start Time</th>
                                        <th data-type="time">End Time</th>
                                        <th>Phone Number</th>
                                        <th data-type="url">Website</th>
                                        <th>Zoom Id</th>
                                        <th>Organizer Name</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->tittle }}</td>
                                            <td>{{ $event->date }}</td>
                                            <td>{{ $event->start_time }}</td>
                                            <td>{{ $event->end_time }}</td>
                                            <td>{{ $event->phone_number }}</td>
                                            <td>{{ $event->website }}</td>
                                            <td>{{ $event->zoom_id }}</td>
                                            <td>{{ $event->organizer_name }}</td>
                                            <td>
                                                <a href="{{ route('update.created.events', $event->id) }}"><i
                                                        class="fa fa-pencil cursor-pointer text-success"></i></a>
                                                |
                                                <a href="{{ route('delete.created.events', $event->id) }}"><i
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
