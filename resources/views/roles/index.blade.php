@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    <div class="sm:flex block items-center justify-between my-[1.5rem] page-header-breadcrumb">
        <div>
            <div class="font-semibold text-[1.125rem] text-defaulttextcolor dark:text-defaulttextcolor/70 !mb-0 ">Role
                Management</div>
        </div>
        <div>
            @can('Roles create')
                <a class="ti-btn ti-btn-primary-full mt-4" style="background: #2f31f6; border-radius:5px"
                    href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive" style="width: 30rem">
        <table class="table whitespace-nowrap table-bordered min-w-full">
            <tr class="bg-primary/10">
                <th class="w-4">No.</th>
                <th>Name</th>
                <th class="w-6">Action</th>
            </tr>
            @foreach ($roles as $key => $role)
                <tr
                    class="border border-inherit border-solid hover:bg-gray-100 dark:border-defaultborder/10 dark:hover:bg-light">
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-success !rounded-full"
                            href="{{ route('roles.show', $role->id) }}"><i class="fe-eye"></i></a>
                        @if ($role->id > 1)
                            @can('Roles edit')
                                <a class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-info !rounded-full"
                                    href="{{ route('roles.edit', $role->id) }}"><i class="fe-edit"></i></a>
                            @endcan
                            @can('Roles delete')
                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Your form fields here -->
                                    <button class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-danger !rounded-full"
                                        type="submit" onclick="return confirm('Are you sure?')"><i
                                            class="fe-trash-2"></i></button>
                                </form>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {!! $roles->render() !!}
@endsection
@section('scripts')
@endsection
