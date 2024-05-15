@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('courses create')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Types</h4>
                        <p class="sub-header">
                            Most common form control, text-based input fields. Includes support for all HTML5 types:
                            <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>,
                            <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>,
                            <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                        </p>

                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="course_name" class="form-label">Course Name</label>
                                        <input type="text" id="course_name" class="form-control" name="course_name"
                                            placeholder="Enter course Name..." value="{{ old('course_name') }}">
                                        @error('course_name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="crt_header" class="form-label">crt header</label>
                                        <input type="text" id="crt_header" class="form-control" name="crt_header"
                                            placeholder="Enter course header..." value="{{ old('crt_header') }}">
                                        @error('crt_header')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_start_date" class="form-label">Start Date</label>
                                        <input class="form-control" id="course_start_date" type="date"
                                            value="{{ old('course_start_date') }}" name="course_start_date">
                                        @error('course_start_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="crt_title" class="form-label">crt title</label>
                                        <input type="text" id="crt_title" class="form-control" name="crt_title"
                                            placeholder="Enter course title..." value="{{ old('crt_title') }}">
                                        @error('crt_title')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="crt_footer" class="form-label">crt footer</label>
                                        <input type="text" id="crt_footer" class="form-control" name="crt_footer"
                                            placeholder="Enter course footer..." value="{{ old('crt_footer') }}">
                                        @error('crt_footer')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label for="course_end_date" class="form-label">End Date</label>
                                        <input class="form-control" id="course_end_date" type="date" name="course_end_date"
                                            value="{{ old('course_end_date') }}">
                                        @error('course_end_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div> <!-- end col -->
                                <button type="submit" class="btn btn-primary waves-effect waves-light mx-auto"
                                    style="width:auto">Submit</button>
                            </div> <!-- end row-->
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    @endcan
@endsection
@section('scripts')
@endsection
