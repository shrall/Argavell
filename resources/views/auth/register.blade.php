@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-body font-proxima-nova mx-4">
                        <h1 class="font-elmessiri font-weight-bold fs-4 text-center text-argavell mb-4">Register</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row font-weight-bold">
                                <label class="col-6">First Name<span class="text-danger">*</span> </label>
                                <label class="col-6">Last Name<span class="text-danger">*</span> </label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name"
                                        placeholder="Enter your first name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name"
                                        placeholder="Enter your last name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <label class="col-12">Username<span class="text-danger">*</span> </label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username"
                                        placeholder="Enter your username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <label class="col-12">E-Mail<span class="text-danger">*</span> </label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter your email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <label class="col-12">Password<span class="text-danger">*</span> </label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-11">
                                    <input id="password" type="password"
                                        class="form-control passwordInput @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" required autocomplete="password"
                                        placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-1 py-2" style="cursor: pointer" onclick="togglePassword()">
                                    <span class="fa fa-fw fa-eye eyeToggle"></span>
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <label class="col-12">Confirm Password<span class="text-danger">*</span> </label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-11">
                                    <input id="password-confirm" type="password" class="form-control passwordInput"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm your password">
                                </div>
                                <div class="col-1 py-2" style="cursor: pointer" onclick="togglePassword()">
                                    <span class="fa fa-fw fa-eye eyeToggle"></span>
                                </div>
                            </div>
                            <div class="row px-2 mb-2">
                                <button type="submit" class="btn btn-argavell col-12">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </form>
                        <div class="row py-3">
                            <span class="text-center">Already have an account? <a class="text-dark font-weight-bold"
                                    href="{{ route('login') }}">{{ __('Sign in now') }}</a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            if ($(".passwordInput").attr('type') == 'password') {
                $(".passwordInput").attr('type', 'text');
                $(".eyeToggle").removeClass('fa-eye');
                $(".eyeToggle").addClass('fa-eye-slash');
            } else {
                $(".passwordInput").attr('type', 'password');
                $(".eyeToggle").removeClass('fa-eye-slash');
                $(".eyeToggle").addClass('fa-eye');
            }
        }

    </script>
@endsection
