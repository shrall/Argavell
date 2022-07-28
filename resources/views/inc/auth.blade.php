<div class="position-fixed d-flex inset-0" style="z-index: 10">
    <div id="overlay" class="position-absolute inset-0 bg-black-50"></div>
    <div class="position-relative bg-white m-auto py-4 px-5" style="z-index: 100; width: 500px; max-width: 90%;">
        <div id="register-form" class="d-none">
            <h1 class="font-elmessiri font-weight-bold fs-4 text-center text-argavell mb-4">Register</h1>
            <form method="POST" action="{{ route('short.register') }}">
                @csrf
                <input type="hidden" name="prev_route" value="{{ Route::current()->getName() }}">
                <input type="hidden" name="product_slug" value="{{ $product->slug ?? '' }}">
                <div class="row font-weight-bold">
                    <label class="col-12">E-Mail<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input id="email" type="text" class="form-control @error('register-email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Enter your email">
                        @error('register-email')
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
                {{-- <input type="hidden" name="from" value=""> --}}
                <div class="row px-2 mb-2">
                    <button type="submit" class="btn btn-argavell col-12">
                        {{ __('Sign Up') }}
                    </button>
                </div>
            </form>

            <div class="row py-3">
                <span class="text-center">Already have an account?
                    <button class="btn text-dark align-baseline font-weight-bold p-0" onclick="moveToLogin()">
                        <u>{{ __('Sign in now') }}</u>
                    </button>
                </span>
            </div>

        </div>

        <div id="login-form" class="">
            <h1 class="font-elmessiri font-weight-bold fs-4 text-center text-argavell mb-4">Login</h1>
            <form method="POST" action="{{ route('short.login') }}">
                @csrf
                <input type="hidden" name="prev_route" value="{{ Route::current()->getName() }}">
                <input type="hidden" name="product_slug" value="{{ $product->slug ?? '' }}">
                <div class="row font-weight-bold">
                    <label class="col-12">Username/Email</label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input id="login" type="text"
                            class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ old('username') ?: old('email') }}" required autofocus
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
                    <button type="submit" class="btn btn-argavell col-12">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>
            <div class="row py-3">
                <span class="text-center">Don't have an account? 
                    <button class="btn text-dark align-baseline font-weight-bold p-0" onclick="moveToRegister()">
                        <u>{{ __('Sign up now') }}</u>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>