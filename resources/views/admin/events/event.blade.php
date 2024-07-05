@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1 class="mb-5">Data Tables</h1>
            <a class="btn btn-primary m-3" href="{{ route('create.events') }}"> Create Events </a>
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
                                        <th>Organizer Name</th>
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
                                            <td>{{ $event->organizer_name }}</td>
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
