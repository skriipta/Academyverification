@extends('layouts.master')
@section('styles')
@endsection

@section('content')
<div>
    <a class="ti-btn ti-btn-primary-full mt-4" href="{{ route('users.index') }}"><i class="ti ti-arrow-big-left"></i> Back</a>
</div>
    
            <div class="container mx-auto flex justify-center items-center pb-8">
                <div class="text-4xl font-bold">Edit New User</div>
            </div>
        
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="xl:col-span-12 col-span-12">
        <div class="box">
            <div class="box-header justify-between">
                <div class="box-title">
                    Edit User
                </div>

            </div>
            <div class="box-body">
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="mainForm">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input name="name"type="text" placeholder="Name" value="{{ $user->name }}" class="form-control mt-2">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input name="email"type="text" placeholder="Email" value="{{ $user->email }}" class="form-control mt-2">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Role:</strong>

                    <div class="ti-form-select rounded-sm !py-2 !px-3">
                        @foreach ($roles as $role)
                            <label class="flex items-center">
                                <input type="checkbox" name="roles[]" value="{{ $role }}" class="form-check-input"
                                    {{ in_array($role, old('roles', $userRole)) ? 'checked' : '' }}
                                >
                                <span class="ml-2">{{ $role }}</span>
                            </label>
                        @endforeach
                    </div>

                    {{-- {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!} --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="ti-btn text-white" style="background-color: #2f31f6">Submit</button>
            </div>
        </div>
    </form>
    </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
