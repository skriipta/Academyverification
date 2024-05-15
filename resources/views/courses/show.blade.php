@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('courses view')
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
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_start_date }}</td>
                    <td>{{ $course->course_end_date }}</td>

                    <td>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        options <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('courses view')
                                            <a class="dropdown-item" href="{{ route('courses.show', $course->id) }}">show</a>
                                        @endcan
                                        @can('courses edit')
                                            <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}">edit</a>
                                        @endcan
                                        @can('courses delete')
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
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
                </tbody>
            </table>
        </div>
    @endcan
@endsection
@section('scripts')
@endsection
