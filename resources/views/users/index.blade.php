@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    <div class="md:flex block items-center justify-between my-[1.5rem] page-header-breadcrumb">
        <div>
            <div class="font-semibold text-[1.125rem] text-defaulttextcolor dark:text-defaulttextcolor/70 !mb-0 ">Users
                Management</div>
        </div>
        <div>
            <a class="ti-btn ti-btn-primary-full mt-4" style="background: #2f31f6; border-radius:5px"
                href="{{ route('users.create') }}"> Create New User</a>
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table whitespace-nowrap table-bordered min-w-full">
            <tr class="bg-primary/10">
                <th class="w-3">No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created by</th>
                <th class="w-6">Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr
                    class="border border-inherit border-solid hover:bg-gray-100 dark:border-defaultborder/10 dark:hover:bg-light text-center">
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge bg-warning/10 text-warning">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ isset($user->createdBy) ? $user->createdBy->name : 'Owner' }}</td>
                    <td>
                        <a class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-success !rounded-full"
                            href="{{ route('users.show', $user->id) }}"><i class="fe-eye"></i></a>
                        @if (!$user->created_by == null)
                            <a class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-info !rounded-full"
                                href="{{ route('users.edit', $user->id) }}"> <i class="fe-edit"></i></i></a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-danger !rounded-full"
                                    type="submit" onclick="return confirm('Are you sure?')"><i
                                        class="fe-trash-2"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {!! $data->render() !!}
@endsection

@section('scripts')
@endsection
