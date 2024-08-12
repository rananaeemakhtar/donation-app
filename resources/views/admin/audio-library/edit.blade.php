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
    <h1>Update Audio Library Entry</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <!-- Multi Columns Form -->
                    <form class="row g-3 m-auto" action="{{ route('audio-library.update', $audioLibrary->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12 col-md-6">
                            <label for="inputName5" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $audioLibrary->title) }}" />
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <label for="inputZip" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $audioLibrary->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <label for="inputZip" class="form-label">Date of Recording</label>
                            <input name="date_of_recording" id="date_of_recording" type="date" class="form-control" value="{{ old('date_of_recording', $audioLibrary->date_of_recording) }}" />
                            @if ($errors->has('date_of_recording'))
                                <span class="text-danger">{{ $errors->first('date_of_recording') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="audio" class="form-label">Audio Recording</label>
                            <input class="form-control" type="file" id="audio" name="audio" accept="audio/*" value="{{ old('audio', $audioLibrary->audio) }}">
                            @if ($errors->has('audio'))
                                <span class="text-danger">{{ $errors->first('audio') }}</span>
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