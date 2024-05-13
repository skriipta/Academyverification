@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    @can('Roles create')
    <div>
        <a class="ti-btn ti-btn-primary-full mt-4" href="{{ route('roles.index') }}"><i class="ti ti-arrow-big-left"></i> Back</a>
    </div>
        
                <div class="container mx-auto flex justify-center items-center pb-8">
                    <div class="text-4xl font-bold">Create New Role</div>
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
                        Add Role
                    </div>
    
                </div>
                <div class="box-body">
        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" id="mainForm">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role Name:</strong>
                        <input type="text" placeholder="Name" class="form-control mt-2" name="name" id="name">
                        {{-- {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!} --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br>
                        {{-- @foreach ($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                        <br />
                    @endforeach --}}
                        @foreach ($permission as $value)
                            <label class="pt-2">
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input mr-2"
                                    {{ old('permission') ? (in_array($value->id, old('permission')) ? 'checked' : '') : '' }}>
                                {{ $value->name }}
                            </label>
                            <br>
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
    @endcan
@endsection
@section('scripts')
@endsection
