@extends('layouts.master')
@section('styles')
@endsection

@section('content')
    <div>
        <a class="ti-btn ti-btn-primary-full mt-4" href="{{ route('users.index') }}"><i class="ti ti-arrow-big-left"></i>
            Back</a>
    </div>

    <div class="container mx-auto flex justify-center items-center pb-8">
        <div class="text-4xl font-bold">Create New User</div>
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
                    Add User
                </div>

            </div>
            <div class="box-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="mainForm">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" placeholder="Name" class="form-control mt-2"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" placeholder="Email" class="form-control mt-2"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input type="password" name="password" placeholder="Password" class="form-control mt-2"
                                    value="{{ old('password') }}">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>Confirm Password:</strong>
                                <input type="password" name="confirm-password" placeholder="Confirm Password"
                                    class="form-control mt-2" value="{{ old('confirm-password') }}">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="showPassword">
                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>Role:</strong>
                                <div class="ti-form-select rounded-sm !py-2 !px-3">
                                    @foreach ($roles as $role)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="roles[]" value="{{ $role }}"
                                                class="form-check-input">
                                            <span class="ml-2">{{ $role }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="ti-btn text-white"
                                style="background-color: #2f31f6">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.querySelector('input[name="password"]');
        const passwordInputTwo = document.querySelector('input[name="confirm-password"]');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
                passwordInputTwo.type = 'text';
            } else {
                passwordInput.type = 'password';
                passwordInputTwo.type = 'password';
            }
        });
    </script>
@endsection
