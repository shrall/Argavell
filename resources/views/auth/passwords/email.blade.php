@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-md-3">
                <div class="card">
                    <div class="card-body font-proxima-nova mx-4">
                        <h1 class="font-bauer font-weight-bold fs-4 text-center text-argavell mb-2">Hello Again!</h1>
                        <h1 class="fs-6 text-center text-secondary mb-4">Enter your email address and we’ll send
                            you a link to reset your password</h1>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Enter your E-Mail">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-argavell col-12">
                                    {{ __('Send E-Mail') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
