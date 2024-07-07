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
    <h1>Update Content</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <!-- Multi Columns Form -->
                    <form class="row g-3 m-auto" action="{{ route('content.update', $content->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-sm-12 col-md-6">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" class="form-control" id="section" name="section" value="{{ old('section', $content->section) }}">
                            @if ($errors->has('section'))
                                <span class="text-danger">{{ $errors->first('section') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content', $content->content) }}</textarea>
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