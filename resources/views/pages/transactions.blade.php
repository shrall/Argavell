@extends('layouts.app')

@section('content')
    <div class="row w-100 my-5 pt-5 p-0 align-items-center d-flex d-sm-none">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
                <span class="text-argavell font-elmessiri font-weight-bold text-4xl">Hello, Jane Doe!</span>
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
                <span class="text-argavell font-elmessiri font-weight-bold text-4xl">Hello, Jane Doe!</span>
            </div>
            <p class="text-secondary">Welcome back to your personal page, where you can manage your
                orders, exchange & accounts right here.</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row w-100 m-0 p-0 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('inc.profile_sidebar')
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
                                <div class="col-6 col-sm-4"><img src="{{ asset('images/argan-oil.jpg') }}"
                                        class="w-100 rounded">
                                </div>
                                <div class="col-4 col-sm-6">1x Argan Oil</div>
                            </div>
                        </td>
                        <td>IDR 130.000</td>
                        <td>
                            <p class="my-0">23-03-2021</p>
                            <p class="my-0">INV201931-231231</p>
                            <a href="#" class="text-dark font-weight-bold" data-bs-toggle="modal"
                                data-bs-target="#transactionModal" role="button">See Details</a>
                        </td>
                        <td>
                            <p class="my-0 text-success font-weight-bold">Shipped</p>
                            <p class="btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Buy again</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-6 col-sm-4"><img src="{{ asset('images/argan-oil.jpg') }}"
                                        class="w-100 rounded">
                                </div>
                                <div class="col-4 col-sm-6">1x Argan Oil</div>
                            </div>
                        </td>
                        <td>IDR 130.000</td>
                        <td>
                            <p class="my-0">23-03-2021</p>
                            <p class="my-0">INV201931-231231</p>
                            <a href="#" class="text-dark font-weight-bold" data-bs-toggle="modal"
                                data-bs-target="#transactionModal" role="button">See Details</a>
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
    {{-- transaction modal --}}
    <div class="modal fade p-0" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel"><span
                            class="text-argavell font-elmessiri fs-3 me-2">Transaction Details</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3">
                        <div class="row bg-light rounded w-100 m-0 px-3 py-2 align-items-center justify-content-between">
                            <div class="col-6">
                                <p class="my-0 text-secondary">23-03-2021</p>
                                <p class="my-0 fs-5 font-weight-bold">INV201931-231231</p>
                            </div>
                            <div class="col-6 justify-content-end">
                                <p class="my-0 text-success font-weight-bold text-end">Shipped</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row justify-content-between">
                            <div class="col-2">Product</div>
                            <div class="col-2 text-end">Price</div>
                        </div>
                    </div>
                    <div class="col-12 mx-2 my-2">
                        <div class="row">
                            <div class="col-2"><img src="{{ asset('images/argan-oil.jpg') }}" class="w-100 rounded"></div>
                            <div class="col-7">1x Argan Oil</div>
                            <div class="col-3 pe-4 text-end">IDR 130.000</div>
                        </div>
                    </div>
                    <div class="col-12 mx-2 my-2">
                        <div class="row">
                            <div class="col-2"><img src="{{ asset('images/argan-oil-shampoo.jpg') }}"
                                    class="w-100 rounded">
                            </div>
                            <div class="col-7">1x Argan Shampoo</div>
                            <div class="col-3 pe-4 text-end">IDR 130.000</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-0 px-0">
                    <div class="col-12 p-0 m-0 px-4 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="text-secondary">Subtotal 2 item(s)</div>
                            <div class="font-weight-bold">IDR 260.000</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-secondary">Shipping Cost</div>
                            <div class="font-weight-bold">IDR 7.000</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-secondary">Payment Method</div>
                            <div class="font-weight-bold">BCA</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-secondary">Shipment Method</div>
                            <div class="font-weight-bold">JNE-OKE</div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <div>Total</div>
                            <div>IDR 800.000</div>
                        </div>
                    </div>
                    <div class="row bg-light px-4">
                        <div class="col-12 p-0 m-0">
                            <div class="font-weight-bold">Shipping Details</div>
                        </div>
                        <div class="col-7 p-0 m-0 mb-2">
                            <p class="my-0 text-argavell">Name</p>
                            <p class="my-0">Jane Doe</p>
                        </div>
                        <div class="col-5 p-0 m-0 mb-2">
                            <p class="my-0 text-argavell">Phone Number</p>
                            <p class="my-0">08123125415</p>
                        </div>
                        <div class="col-7 p-0 m-0">
                            <p class="my-0 text-argavell">Home</p>
                            <p class="my-0">Jl Lorem Ipsum Blok A No 15/16
                                Citraland, Sambikerep, Surabaya
                                Jawa Timur, Indonesia 123102
                            </p>
                        </div>
                        <div class="col-5 p-0 m-0"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
