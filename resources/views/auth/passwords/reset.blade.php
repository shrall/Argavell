@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-md-3">
                <div class="card">
                    <div class="card-body font-proxima-nova mx-4">
                        <h1 class="font-bauer font-weight-bold fs-4 text-center text-argavell mb-2">Welcome Back!</h1>
                        <h1 class="fs-6 text-center text-secondary mb-4">Reset your password</h1>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            <div class="row font-weight-bold">
                                <label class="col-12">New Password</label>
                            </div>
                            <div class="row mb-2">
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
                            <div class="row px-2 mb-2 col-8 mx-auto">
                                <button type="submit" class="btn btn-argavell col-12">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
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
