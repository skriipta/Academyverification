@extends('layouts.master')
@section('styles')
@endsection

@section('content')
<div>
    <a class="ti-btn ti-btn-primary-full mt-4 mr-2" href="{{ route('roles.index') }}"><i class="ti ti-arrow-big-left"></i> Back</a>
    <form method="POST" class="ti-btn ti-btn-danger-full" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
        @csrf
        @method('DELETE')
    
        <!-- Your form fields here -->
    
        <button class="ti-btn ti-btn-danger-full" type="submit" onclick="return confirm('Are you sure?')">Delete Role</button>
    </form>
</div>
    
<div class="container mx-auto flex justify-center items-center pb-8">
    <div class="text-4xl font-bold">Edit Role</div>
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
    <form method="POST" action="{{ route('roles.update', $role->id) }}" style="display:inline">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{-- {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!} --}}
                    <input type="text" name="name" placeholder="Name" class="form-control mt-2"
                        value="{{ $role->name }}">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label class="pt-2">
                            {{-- {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                            {{ $value->name }} --}}
                            @if (in_array($value->id, $rolePermissions))
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" checked
                                class="form-check-input mr-2">
                            @else
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input mr-2">
                            @endif
                            {{ $value->name }}
                        </label>
                        <br />
                    @endforeach
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
