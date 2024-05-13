@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    <div>
        <a class="ti-btn ti-btn-primary-full mt-4" href="{{ route('users.index') }}"><i class="ti ti-arrow-big-left"></i>
            Back</a>
    </div>

    <div class="container mx-auto flex justify-center items-center pb-8">
        <div class="text-4xl font-bold"> Show User</div>
    </div>




    <div class="table-responsive" style="width: 40rem">
        <table class="table whitespace-nowrap table-bordered min-w-full">
            <tr class="bg-primary/10">
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created By</th>
            </tr>
            <tr class="text-center">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge bg-warning/10 text-warning">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    {{ isset($user->createdBy) ? $user->createdBy->name : 'Owner' }}
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
