@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-body font-proxima-nova mx-4">
                        <h1 class="font-bauer font-weight-bold fs-4 text-center text-argavell mb-4">Login</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row font-weight-bold">
                                <label class="col-12">Username/Email</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input id="login" type="text"
                                        class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="login" value="{{ old('username') ?: old('email') }}" required autofocus
                                        placeholder="Enter your username/email">
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <label class="col-12">Password</label>
                            </div>
                            <div class="row">
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
                            <div class="row py-2">
                                <a class="text-argavell text-end text-decoration-none font-weight-bold"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                            <div class="row px-2 mb-2">
                                <button type="submit" class="btn btn-argavell col-12 font-weight-bold">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                        </form>
                        <div class="row py-3">
                            <span class="text-center">Don't have an account? <a class="text-dark font-weight-bold"
                                    href="{{ route('register') }}">{{ __('Sign up now') }}</a> </span>
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
