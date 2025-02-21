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
        <h1>Update Testimonail</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('testimonial.update', $testimonial->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-sm-12 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $testimonial->name) }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                    value="{{ old('designation', $testimonial->designation) }}">
                                @if ($errors->has('designation'))
                                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ministry_id" class="form-label">Ministry</label>
                                <select name="ministry_id" class="form-control" id="ministry_id">
                                    <option value="">Select Ministry</option>
                                    @if($ministries->isNotEmpty())
                                        @foreach ($ministries as $ministry)
                                            <option value="{{ $ministry->id }}" {{ old('ministry_id', $testimonial->ministry_id) == $ministry->id ? 'selected' : '' }} >{{ $ministry->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('ministry_id'))
                                    <span class="text-danger">{{ $errors->first('ministry_id') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30"
                                    rows="10">{{ old('description', $testimonial->description) }}</textarea>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description');
        });
    </script>
@endsection