@extends('layouts.app')

@section('content')
    {{-- mobile --}}
    <div class="row w-100 my-5 pt-5 p-0 align-items-center d-flex d-sm-none">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
                <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, {{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}!</span>
            </div>
            <p class="text-secondary">Welcome back to your personal page, where you can manage your
                orders, exchange & accounts right here.</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    {{-- desktop --}}
    <div class="row w-100 my-4 p-0 align-items-center d-none d-sm-flex">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
                <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, {{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}!</span>
            </div>
            <p class="text-secondary">Welcome back to your personal page, where you can manage your
                orders, exchange & accounts right here.</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row w-100 m-0 p-0">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('user.User.inc.sidebar')
        </div>
        <div class="col-md-5">
            <form action="{{ route('user.user.update', Auth::user()->id) }}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row font-weight-bold">
                    <label class="col-6">First Name</label>
                    <label class="col-6">Last Name</label>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input id="first_name" type="text" class="form-control" name="first_name" required
                            autocomplete="first_name" placeholder="Enter your first name"
                            value="{{ Auth::user()->first_name }}">
                    </div>
                    <div class="col-6">
                        <input id="last_name" type="text" class="form-control" name="last_name" required
                            autocomplete="last_name" placeholder="Enter your last name"
                            value="{{ Auth::user()->last_name }}">
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-6">Gender</label>
                    <label class="col-6">Date of Birth</label>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <select class="form-select font-proxima-nova" id="gender" name="gender">
                            <option value="0" @if (Auth::user()->gender == '0') selected @endif>Male</option>
                            <option value="1" @if (Auth::user()->gender == '1') selected @endif>Female</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input id="dob" type="date" class="form-control" name="dob" required autocomplete="dob"
                            value="{{ Auth::user()->dob }}">
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">E-Mail</label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input id="email" type="email" class="form-control" name="email" required autocomplete="email"
                            value="{{ Auth::user()->email }}" disabled>
                    </div>
                </div>
                <button type="submit" class="btn-argavell text-center w-50 mt-2 mb-4 py-2 cursor-pointer border-0">Save
                    Changes</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
