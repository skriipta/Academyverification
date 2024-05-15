@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('courses create')
        <a type="button" href="{{ route('courses.create') }}" class="btn btn-primary waves-effect waves-light">create</a>
    @endcan

    <div class="col-lg-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="mt-0 header-title mb-3">courses</h4>


                <div class="table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->course_start_date }}</td>
                                    <td>{{ $course->course_end_date }}</td>

                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="dropdown">
                                                    <button class="btn btn-light dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        options <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @can('courses view')
                                                            <a class="dropdown-item"
                                                                href="{{ route('courses.show', $course->id) }}">show</a>
                                                        @endcan
                                                        @can('courses edit')
                                                            <a class="dropdown-item"
                                                                href="{{ route('courses.edit', $course->id) }}">edit</a>
                                                        @endcan
                                                        @can('courses delete')
                                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                                method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Are you sure?')">delete</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $pagedData->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
@section('scripts')
@endsection
