@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('student view')
        <div class="table">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>courses</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>

                    <td>
                        @foreach ($student->courses as $v)
                            <span class="badge bg-primary h-3 fs-5">{{ $v->course_name }}</span>
                        @endforeach
                        {{-- {{ $student->courses }} --}}
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        options <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('student view')
                                            <a class="dropdown-item" href="{{ route('students.show', $student->id) }}">show</a>
                                        @endcan
                                        @can('student edit')
                                            <a class="dropdown-item" href="{{ route('students.edit', $student->id) }}">edit</a>
                                        @endcan
                                        @can('student delete')
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
