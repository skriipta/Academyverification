@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('student create')
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

                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">name</label>
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Enter Student Name..." value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter Student E-mail..." value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    {{-- <div class="mb-3">
                                    <label for="password" class="form-label">Show/Hide Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div> --}}
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">phone</label>
                                        <input type="tel" id="phone" class="form-control" placeholder="+201234567890"
                                            name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h4 class="header-title">Custom checkbox - Basic</h4>

                                                <p class="sub-header">
                                                    Supports bootstrap brand colors: <code>.form-check</code>,
                                                    <code>.form-check-*</code> etc.
                                                </p>
                                                @foreach ($courses as $course)
                                                    <div class="form-check mb-2 form-check-success">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $course->id }}" name="courses[]" id="customckeck2">
                                                        <label class="form-check-label"
                                                            for="customckeck2">{{ $course->course_name }}</label>
                                                    </div>
                                                @endforeach
                                            </div> <!-- end row -->
                                        </div> <!-- end card body -->

                                    </div> <!-- end card -->

                                    <button type="submit" class="btn btn-primary waves-effect waves-light mx-auto"
                                        style="width:auto">Submit</button>
                                </div> <!-- end col -->
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
