@extends('layouts.app')

@section('content')
    <div class="row w-100 my-5 pt-5 p-0 align-items-center d-flex d-sm-none">
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
    <div class="row w-100 m-0 p-0 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            <ul class="list-unstyled" id="account-sidebar">
                <li class="my-2"><a href="#" class="text-secondary text-decoration-none">My Profile</a></li>
                <li class="my-2 active"><a href="#" class="text-secondary text-decoration-none active">My Transactions</a></li>
                <li class="my-2"><a href="#" class="text-secondary text-decoration-none">My Address</a></li>
                <li class="my-2"><a href="#" class="text-secondary text-decoration-none">Change Password</a></li>
                <li class="my-2"><a href="{{ route('logout') }}" class="text-danger text-decoration-none">Logout</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <table id="table_id" class="table table-responsive">
                <thead>
                    <tr>
                        <th width="40%">Product</th>
                        <th>Price</th>
                        <th>Inovice</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-6 col-sm-4"><img src="{{ asset('images/argan-oil.jpg') }}" class="w-100 rounded">
                                </div>
                                <div class="col-4 col-sm-6">1x Argan Oil</div>
                            </div>
                        </td>
                        <td>IDR 130.000</td>
                        <td>
                            <p class="my-0">23-03-2021</p>
                            <p class="my-0">INV201931-231231</p>
                            <a href="#" class="text-dark font-weight-bold">See Details</a>
                        </td>
                        <td>
                            <p class="my-0 text-success font-weight-bold">Shipped</p>
                            <p class="btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Buy again</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-6 col-sm-4"><img src="{{ asset('images/argan-oil.jpg') }}" class="w-100 rounded">
                                </div>
                                <div class="col-4 col-sm-6">1x Argan Oil</div>
                            </div>
                        </td>
                        <td>IDR 130.000</td>
                        <td>
                            <p class="my-0">23-03-2021</p>
                            <p class="my-0">INV201931-231231</p>
                            <a href="#" class="text-dark font-weight-bold">See Details</a>
                        </td>
                        <td>
                            <p class="my-0 text-danger font-weight-bold">Canceled</p>
                            <p class="btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Buy again</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
