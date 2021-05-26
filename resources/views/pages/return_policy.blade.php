@extends('layouts.app')

@section('content')
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <h1 class="text-argavell font-bauer font-weight-bold">Return Policy</h1>
            <div class="pe-4">
                <ul class="list-unstyled">
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Returned item can only be
                        exchanged if the
                        seal on the product is
                        broken or if you receive a wrong item.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Product must be sent back to
                        Argavell 5
                        days after the item was
                        received.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Customers must contact
                        Argavell for
                        confirmation of return, by filling
                        out the return form attached.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Return confirmation can be
                        done at
                        Argavell’s call center in the
                        following number 082143211310.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Return requests will be
                        processed after the
                        product received by Argavell.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Estimated return process 1×24
                        hours after
                        the item is received.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>The shipping cost of returning
                        product is
                        paid by the customer and
                        the shipping costs from Argavell to the customer are borne by
                        Argavell.
                    </li>
                </ul>
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer" data-bs-toggle="modal"
                    data-bs-target="#returnModal">Fill Return Form</div>
            </a>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0">
            <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5 mb-4">
            <h1 class="text-argavell font-bauer font-weight-bold py-4">Return Policy</h1>
            <div class="px-2">
                <ul class="list-unstyled text-start">
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Returned item can only be
                        exchanged if the
                        seal on the product is
                        broken or if you receive a wrong item.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Product must be sent back to
                        Argavell 5
                        days after the item was
                        received.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Customers must contact
                        Argavell for
                        confirmation of return, by filling
                        out the return form attached.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Return confirmation can be
                        done at
                        Argavell’s call center in the
                        following number 082143211310.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Return requests will be
                        processed after the
                        product received by Argavell.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>Estimated return process 1×24
                        hours after
                        the item is received.
                    </li>
                    <li class="mb-2"><span class="fa fa-fw fa-tint text-argavell me-2"></span>The shipping cost of returning
                        product is
                        paid by the customer and
                        the shipping costs from Argavell to the customer are borne by
                        Argavell.
                    </li>
                </ul>
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer" data-bs-toggle="modal"
                    data-bs-target="#returnModal">Fill Return Form</div>
            </a>
        </div>
    </div>
    {{-- form modal --}}
    <div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 justify-content-center position-relative">
                    <h5 class="modal-title text-center text-argavell font-bauer text-4xl" id="returnModalLabel"><img
                            src="{{ asset('images/argan-fruit.png') }}" width="75px">Return Form</h5>
                    <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                        style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-body font-proxima-nova px-5">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="col-form-label font-weight-bold">Your Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="order_number" class="col-form-label font-weight-bold">Order Number<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="order_number" placeholder="Enter your order number">
                        </div>
                        <div>
                            <label for="occasion" class="col-form-label font-weight-bold">Occasion<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occasion" value="wrong"
                                    id="occasion_radio_wrong" checked>
                                <label class="form-check-label" for="occasion_radio_wrong">
                                    Wrong Item
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occasion" value="broken"
                                    id="occasion_radio_broken">
                                <label class="form-check-label" for="occasion_radio_broken">
                                    Broken
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="col-form-label font-weight-bold">Phone Number<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Enter your phone number">
                        </div>
                        <div>
                            <label for="occasion" class="col-form-label font-weight-bold">Occasion<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="condition" id="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0"
                        data-bs-toggle="modal" data-bs-target="#returnModal">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
