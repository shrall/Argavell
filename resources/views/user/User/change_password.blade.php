@extends('layouts.app')

@section('content')
    @include('user.User.inc.header')
    <div class="row w-100 m-0 p-0">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('user.User.inc.sidebar')
        </div>
        <div class="col-md-5">
            <div class="row w-100 mx-0 mb-4 p-0 align-items-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('Error'))
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <li>{{ session('Error') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session('Success'))
                    <div class="alert alert-success">
                        <ul class="mb-0">
                            <li>{{ session('Success') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 text-start">
                    <form action="{{ route('user.updatepassword') }}" method="post">
                        @csrf
                        <div class="row font-weight-bold">
                            <label class="col-12 text-start">Current Password</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="current_password" type="password" class="form-control" name="current_password"
                                    required autocomplete="current_password">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12 text-start">New Password</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="new_password" type="password" class="form-control" name="new_password" required
                                    autocomplete="new_password">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12 text-start">Confirm New Password</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="new_password_confirmation" type="password" class="form-control"
                                    name="new_password_confirmation" required autocomplete="new_password_confirmation">
                            </div>
                        </div>
                        <button type="submit"
                            class="btn-argavell text-center w-50 mt-2 mb-4 py-2 cursor-pointer border-0">Save
                            Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
