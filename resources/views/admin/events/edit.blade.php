@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <section class="sign-up">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Update Events</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('actual.update.created.events', $update_event->id) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="tittle"
                                    value="{{ old('tittle', $update_event->tittle) }}">
                                @if ($errors->has('tittle'))
                                    <span class="text-danger">{{ $errors->first('tittle') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Date</label>
                                <input type="date" class="form-control" id="inputEmail5" name="date"
                                    value="{{ old('date', $update_event->date) }}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Start time</label>
                                <input type="time" class="form-control" id="inputPassword5" name="start_time"
                                    value="{{ old('start_time', $update_event->start_time) }}">
                                @if ($errors->has('start_time'))
                                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="inputAddress5" class="form-label">End time</label>
                                <input type="time" class="form-control" id="inputAddres5s" name="end_time"
                                    value="{{ old('end_time', $update_event->end_time) }}">
                                @if ($errors->has('end_time'))
                                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Zoom ID</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="0000000"
                                    name="zoom_ID" value="{{ old('zoom_ID', $update_event->zoom_id) }}">
                                @if ($errors->has('zoom_ID'))
                                    <span class="text-danger">{{ $errors->first('zoom_ID') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="inputCity" name="phone_no"
                                    value="{{ old('phone_no', $update_event->phone_number) }}">
                                @if ($errors->has('phone_no'))
                                    <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Website</label>
                                <input type="website" class="form-control" id="inputCity" name="website"
                                    value="{{ old('website', $update_event->website) }}">
                                @if ($errors->has('website'))
                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Organizer Name</label>
                                <input type="text" class="form-control" id="inputZip" name="organizer_name"
                                    value="{{ old('organizer_name', $update_event->organizer_name) }}">
                                @if ($errors->has('organizer_name'))
                                    <span class="text-danger">{{ $errors->first('organizer_name') }}</span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
