@extends('layouts.app')

@section('content')
    <div class="row w-100 mt-5 pt-5 p-0 mx-0 align-items-center d-flex d-sm-none">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
                <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, Jane Doe!</span>
            </div>
            <p class="text-secondary">Welcome back to your personal page, where you can manage your
                orders, exchange & accounts right here.</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row w-100 my-4 p-0 align-items-center d-none d-sm-flex">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
                <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, Jane Doe!</span>
            </div>
            <p class="text-secondary">Welcome back to your personal page, where you can manage your
                orders, exchange & accounts right here.</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row w-100 m-0 p-0">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('inc.profile_sidebar')
        </div>
        <div class="col-md-5">
            <div class="row w-100 mx-0 my-4 p-0 align-items-center">
                <div class="col-md-12 text-start">
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
                            <input id="new_password" type="password" class="form-control" name="new_password"
                                required autocomplete="new_password">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12 text-start">Confirm New Password</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation"
                                required autocomplete="new_password_confirmation">
                        </div>
                    </div>
                    <button type="submit" class="btn-argavell text-center w-50 mt-2 mb-4 py-2 cursor-pointer border-0">Save
                        Changes</button>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
