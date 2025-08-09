@extends('layouts.admin')

@section('content')
    <style>
        .cke_notification_warning {
            display: none;
        }
    </style>
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
        <h1>Create Service Schedule</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('schedule_services.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12 col-md-6">
                                <label for="inputName5" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName5" name="name"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30"
                                    rows="10">{{ old('description') }}</textarea>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description');
        });
    </script>
@endsection