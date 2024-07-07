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
        <h1>Create Content Entry</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 m-auto" action="{{ route('content.store') }}" method="post">
                            @csrf
                            <div class="col-sm-12 col-md-6">
                                <label for="inputName5" class="form-label">Section</label>
                                <select name="section" id="section" class="form-select">
                                    <option value="word_of_week"> Word of Week </option>
                                </select>
                                @if ($errors->has('section'))
                                    <span class="text-danger">{{ $errors->first('section') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <label for="inputZip" class="form-label">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                                @if ($errors->has('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
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
