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
        <h1>Update Ministry</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('ministry.update', $ministry->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-sm-12 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $ministry->title) }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30"
                                    rows="10">{{ old('description', $ministry->description) }}</textarea>
                            </div>

                            <!-- Testimonials Section -->
                            <h4>Testimonials</h4>
                            <div id="testimonials-container">
                                @if($testimonials->isNotEmpty())
                                    @foreach ($testimonials as $index => $testimonial)
                                        <div class="card mt-4 testimonial-item">
                                        <input type="hidden" name="testimonials[{{ $index }}][id]" value="{{ $testimonial->id }}">
                                            <div class="card-body">
                                                <h5 class="card-title">Testimonial</h5>
                                                <div class="row g-3">
                                                    <div class="col-sm-12 col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control"
                                                            name="testimonials[{{ $index }}][name]"
                                                            value="{{ old("testimonials.$index.name", $testimonial->name) }}" required>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <label class="form-label">Designation</label>
                                                        <input type="text" class="form-control"
                                                            name="testimonials[{{ $index }}][designation]"
                                                            value="{{ old("testimonials.$index.designation", $testimonial->designation) }}" required>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" class="form-control"
                                                            name="testimonials[{{ $index }}][image]">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="testimonials[{{ $index }}][description]"
                                                            class="form-control testimonial-description" cols="30"
                                                            rows="3">{{ old("testimonials.$index.description", $testimonial->description) }}</textarea>
                                                    </div>
                                                    <div class="text-end">
                                                        <button type="button"
                                                            class="btn btn-danger remove-testimonial">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" id="add-testimonial-btn" class="btn btn-success">Add
                                    Testimonial</button>
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

            let testimonialIndex = $('#testimonials-container .testimonial-item').length;

            // Initialize CKEditor for existing testimonials
            $('#testimonials-container').find('.testimonial-description').each(function () {
                let name = $(this).attr('name');
                CKEDITOR.replace(name);
            });

            // Add new testimonial dynamically
            $('#add-testimonial-btn').on('click', function () {
                let testimonialHtml = `
                        <div class="card mt-4 testimonial-item">
                            <div class="card-body">
                                <h5 class="card-title">Testimonial</h5>
                                <div class="row g-3">
                                    <div class="col-sm-12 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="testimonials[${testimonialIndex}][name]" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="testimonials[${testimonialIndex}][designation]" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="testimonials[${testimonialIndex}][image]">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea name="testimonials[${testimonialIndex}][description]" class="form-control testimonial-description" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-danger remove-testimonial">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                $('#testimonials-container').append(testimonialHtml);
                CKEDITOR.replace(`testimonials[${testimonialIndex}][description]`);
                testimonialIndex++;
            });

            // Remove testimonial
            $(document).on('click', '.remove-testimonial', function () {
                $(this).closest('.testimonial-item').remove();
            });
        });
    </script>
@endsection