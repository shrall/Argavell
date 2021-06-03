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
        <div class="col-md-6">
            <div class="row w-100 mx-0 my-4 p-0 align-items-center">
                <div class="col-md-12 text-center">
                    <div class="d-none d-sm-flex justify-content-between align-items-center bg-light px-3 py-2 rounded">
                        <div class="text-start">
                            <p class="my-0 font-weight-bold fs-3">Manage Your Address</p>
                            <p class="my-0">Add or delete your addresses right here.</p>
                        </div>
                        <p class="btn-argavell text-center w-25 m-0 py-2 cursor-pointer border-0">Add New Address</p>
                    </div>
                    <div class="d-block d-sm-none bg-light rounded px-3 py-2 text-center">
                        <p class="my-0 font-weight-bold fs-3">Manage Your Address</p>
                        <p class="my-0 text-secondary">Add or delete your addresses right here.</p>
                        <p class="btn-argavell text-center w-50 mx-auto my-2 py-2 cursor-pointer border-0">Add New Address
                        </p>
                    </div>
                    <div class="my-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address" value="address_1"
                                id="radio_address_1" checked>
                            <div class="row m-0 p-0 ms-2">
                                <div class="col-3 p-0 text-start">
                                    <p class="my-0 font-weight-bold">John Doe</p>
                                    <p class="my-0 text-secondary">08123132132</p>
                                    <a href="#" class="text-argavell">Edit</a>
                                </div>
                                <div class="col-4 p-0 text-start d-none d-sm-block">
                                    <p class="my-0 font-weight-bold">Home</p>
                                    <p class="my-0 text-secondary">Jl. Mayjend Sungkono 90,
                                        Surabaya
                                    </p>
                                </div>
                                <div class="col-4 p-0 text-start d-none d-sm-block">
                                    <p class="my-0 font-weight-bold">Kota Surabaya</p>
                                    <p class="my-0 text-secondary">Sambikerep, Jawa Timur,
                                        1390123
                                    </p>
                                </div>
                                <div class="col-7 ms-3 p-0 text-start d-block d-sm-none">
                                    <p class="my-0 font-weight-bold">Home</p>
                                    <p class="my-0 text-secondary">Jl. Mayjend Sungkono 90,
                                        Surabaya
                                    </p>
                                    <p class="my-0 font-weight-bold">Kota Surabaya</p>
                                    <p class="my-0 text-secondary">Sambikerep, Jawa Timur,
                                        1390123
                                    </p>
                                </div>
                                <div class="col-1 p-0 text-end">
                                    <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"></span>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address" value="address_2"
                                id="radio_address_2">
                            <div class="row m-0 p-0 ms-2">
                                <div class="col-3 p-0 text-start">
                                    <p class="my-0 font-weight-bold">John Doe</p>
                                    <p class="my-0 text-secondary">08123132132</p>
                                    <a href="#" class="text-argavell">Edit</a>
                                </div>
                                <div class="col-4 p-0 text-start d-none d-sm-block">
                                    <p class="my-0 font-weight-bold">Office</p>
                                    <p class="my-0 text-secondary">Jl. Mayjend Sungkono 90,
                                        Surabaya
                                    </p>
                                </div>
                                <div class="col-4 p-0 text-start d-none d-sm-block">
                                    <p class="my-0 font-weight-bold">Kota Surabaya</p>
                                    <p class="my-0 text-secondary">Sambikerep, Jawa Timur,
                                        1390123
                                    </p>
                                </div>
                                <div class="col-7 ms-3 p-0 text-start d-block d-sm-none">
                                    <p class="my-0 font-weight-bold">Office</p>
                                    <p class="my-0 text-secondary">Jl. Mayjend Sungkono 90,
                                        Surabaya
                                    </p>
                                    <p class="my-0 font-weight-bold">Kota Surabaya</p>
                                    <p class="my-0 text-secondary">Sambikerep, Jawa Timur,
                                        1390123
                                    </p>
                                </div>
                                <div class="col-1 p-0 text-end">
                                    <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
