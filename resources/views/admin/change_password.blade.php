@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Change Password</h1>
            <h6 class="text-secondary">Anda dapat mengganti password Anda.</h6>
        </div>
        <div class="col-6"></div>
        <div class="col-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row mb-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('Error'))
            <div class="alert alert-danger">
                <ul class="mb-0 list-unstyled">
                    <li>{{ session('Error') }}</li>
                </ul>
            </div>
        @endif
        @if (session('Success'))
            <div class="alert alert-success">
                <ul class="mb-0 list-unstyled">
                    <li>{{ session('Success') }}</li>
                </ul>
            </div>
        @endif
        <div class="col-md-12 text-start">
            <form action="{{ route('admin.updatepassword') }}" method="post">
                @csrf
                <div class="row font-weight-bold">
                    <label class="col-12 text-start">Current Password</label>
                </div>
                <div class="row mb-3">
                    <div class="col-11">
                        <input id="current_password" type="password" class="form-control passwordInput"
                            name="current_password" required autocomplete="current_password"
                            placeholder="Masukkan password">
                    </div>
                    <div class="col-1 py-2" style="cursor: pointer" onclick="togglePassword()">
                        <span class="fa fa-fw fa-eye eyeToggle"></span>
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12 text-start">New Password</label>
                </div>
                <div class="row mb-3">
                    <div class="col-11">
                        <input id="new_password" type="password" class="form-control passwordInput" name="new_password"
                            required autocomplete="new_password" placeholder="Masukkan password baru">
                    </div>
                    <div class="col-1 py-2" style="cursor: pointer" onclick="togglePassword()">
                        <span class="fa fa-fw fa-eye eyeToggle"></span>
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-11 text-start">Confirm New Password</label>
                </div>
                <div class="row mb-3">
                    <div class="col-11">
                        <input id="new_password_confirmation" type="password" class="form-control passwordInput"
                            name="new_password_confirmation" required autocomplete="new_password_confirmation"
                            placeholder="Konfirmasi password baru">
                    </div>
                    <div class="col-1 py-2" style="cursor: pointer" onclick="togglePassword()">
                        <span class="fa fa-fw fa-eye eyeToggle"></span>
                    </div>
                </div>
                <button type="submit"
                    class="btn btn-admin-argavell text-center w-25 mt-2 mb-4 py-2 cursor-pointer rounded-lg border-0">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
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
