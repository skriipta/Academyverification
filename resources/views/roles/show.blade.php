@extends('layouts.master')
@section('styles')
@endsection

@section('content')
<div>
    <a class="ti-btn ti-btn-primary-full mt-4" href="{{ route('roles.index') }}"><i class="ti ti-arrow-big-left"></i> Back</a>
</div>
    
            <div class="container mx-auto flex justify-center items-center pb-8">
                <div class="text-4xl font-bold"> Show Role</div>
    </div>


    <div class="table-responsive" >
        <table class="table whitespace-nowrap table-bordered min-w-full">
            <tr class="bg-primary/10">
                <th class="w-4">Name</th>
                <th class="text-left">Permissions</th>
            </tr>
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>@if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                            <label class="badge bg-warning/10 text-warning text-base">{{ $v->name }}</label>
                        @endforeach
                    @endif
                </td>
                </tr>
        </table>
    </div>
@endsection
@section('scripts')
@endsection
