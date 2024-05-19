@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    {{-- @can('certificate create')
        <a type="button" href="{{ route('certificats.create') }}" class="btn btn-primary waves-effect waves-light">create</a>
    @endcan --}}
    @can('certificate view')
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
                    <h4 class="mt-0 header-title mb-3">certificats</h4>


                    <div class="table">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>student name</th>
                                    <th>student courses</th>
                                    <th>slug</th>
                                    <th>graduated</th>
                                    <th>certificat pdf</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $certificate)
                                    <tr>
                                        <td>{{ $certificate->student->name }}</td>
                                        <td>{{ $certificate->course->course_name }}</td>
                                        <td>{{ $certificate->slug }}</td>

                                        <td>
                                            checkbox
                                            {{-- @foreach ($certificate->courses as $v)
                                                <span class="badge bg-primary h-3 fs-5">{{ $v->course_name }}</span>
                                            @endforeach --}}
                                            {{-- {{ $certificate->courses }} --}}
                                        </td>
                                        <td>download</td>
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
                                                            @can('certificate view')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('certificats.show', $certificate->id) }}">show</a>
                                                            @endcan
                                                            @can('certificate edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('certificats.edit', $certificate->id) }}">edit</a>
                                                            @endcan
                                                            @can('certificate delete')
                                                                <form action="{{ route('certificats.destroy', $certificate->id) }}"
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
    @endcan
@endsection
@section('scripts')
@endsection
