@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Create Events</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12 col-md-6">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title"
                                    value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="inputZip" class="form-label">Organizer Name</label>
                                <input type="text" class="form-control" id="inputZip" name="organizer_name"
                                    value="{{ old('organizer_name') }}">
                                @if ($errors->has('organizer_name'))
                                    <span class="text-danger">{{ $errors->first('organizer_name') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <label for="inputEmail5" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="inputEmail5" name="date"
                                            value="{{ old('date') }}">
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <label for="inputPassword5" class="form-label">Start time</label>
                                        <input type="time" class="form-control" id="inputPassword5" name="start_time"
                                            value="{{ old('start_time') }}">
                                        @if ($errors->has('start_time'))
                                            <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <label for="inputAddress5" class="form-label">End time</label>
                                        <input type="time" class="form-control" id="inputAddres5s" placeholder="22-10-1997"
                                            name="end_time" value="{{ old('end_time') }}">
                                        @if ($errors->has('end_time'))
                                            <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="inputAddress2" class="form-label">Zoom ID</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="00000000"
                                    name="zoom_id" value="{{ old('zoom_id') }}">
                                @if ($errors->has('zoom_id'))
                                    <span class="text-danger">{{ $errors->first('zoom_id') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="inputCity" name="phone_number"
                                    value="{{ old('phone_number') }}">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="inputState" class="form-label">Website</label>
                                <input type="website" class="form-control" id="inputCity" name="website"
                                    value="{{ old('website') }}">
                                @if ($errors->has('website'))
                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="audio" class="form-label">Audio Recording</label>
                                <input class="form-control" type="file" id="audio" name="audio">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
