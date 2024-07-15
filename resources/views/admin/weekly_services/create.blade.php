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
                        <form class="row g-3 m-auto" action="{{ route('weekly_services.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="inputPassword5" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="inputPassword5" name="image"
                                            value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <label for="inputEmail5" class="form-label">Day</label>
                                        <select name="day" id="day" class="form-select">
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                            <option value="saturday">Saturday</option>
                                        </select>
                                        @if ($errors->has('day'))
                                            <span class="text-danger">{{ $errors->first('day') }}</span>
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Store</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
