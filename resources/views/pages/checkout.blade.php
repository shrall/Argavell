@extends('layouts.app')

@section('content')
    <div class="row w-100 p-0 m-0 bg-light">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <h1 class="text-argavell font-bauer font-weight-bold pt-5 mt-5 text-4xl d-block d-sm-none">Checkout</h1>
            <h1 class="text-argavell font-bauer font-weight-bold py-3 d-none d-sm-block">Checkout</h1>
            <div class="bg-white rounded px-3 py-2 my-3 d-block d-sm-none">
                <h2 class="text-argavell font-bauer font-weight-bold">Order Summary</h2>
                <div class="row text-secondary">
                    <div class="col-3">Product</div>
                    <div class="col-5"></div>
                    <div class="col-4">Price</div>
                </div>
                <div class="row my-2">
                    <div class="col-3">
                        <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100 rounded">
                    </div>
                    <div class="col-5 font-weight-bold">
                        1x Argan Oil
                    </div>
                    <div class="col-4">IDR 130.000</div>
                </div>
                <div class="row my-2">
                    <div class="col-3">
                        <img src="{{ asset('images/argan-oil-shampoo.jpg') }}" class="w-100 rounded">
                    </div>
                    <div class="col-5 font-weight-bold">
                        1x Argan Shampoo
                    </div>
                    <div class="col-4">IDR 130.000</div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">2 item(s)</span>
                    </div>
                    <div class="col-4">IDR 260.000</div>
                </div>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Shipping Cost
                    </div>
                    <div class="col-4" class="summary_shipping_cost">IDR 7.000</div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Total
                    </div>
                    <div class="col-4" class="summary_total">IDR 267.000</div>
                </div>
            </div>
            <div class="bg-white rounded px-3 py-2 my-3">
                <h2 class="text-argavell font-bauer font-weight-bold">Address Details</h2>
                <p class="text-secondary">Please complete the following data so that your product arrives correctly and
                    safely.</p>
                <div class="row font-weight-bold">
                    <label class="col-6">First Name<span class="text-danger">*</span> </label>
                    <label class="col-6">Last Name<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input id="first_name" type="text" class="form-control" name="first_name" required
                            autocomplete="first_name" placeholder="Enter your first name">
                    </div>
                    <div class="col-6">
                        <input id="last_name" type="text" class="form-control" name="last_name" required
                            autocomplete="last_name" placeholder="Enter your last name">
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">Phone Number<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input id="phone_number" type="text" class="form-control" name="phone_number" required
                            autocomplete="phone_number" placeholder="Enter your phone number">
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">Country<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <select class="form-select font-proxima-nova font-weight-bold" id="country" name="country">
                            <option value="id">Indonesia</option>
                            <option value="sg">Singapore</option>
                            <option value="my">Malaysia</option>
                        </select>
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">Province<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <select class="form-select font-proxima-nova font-weight-bold" id="province" name="province">
                            <option value="jawatimur">Jawa Timur</option>
                            <option value="jawatengah">Jawa Tengah</option>
                            <option value="jawabarat">Jawa Barat</option>
                        </select>
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">City<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <select class="form-select font-proxima-nova font-weight-bold" id="city" name="city">
                            <option value="sby">Surabaya</option>
                            <option value="mlg">Malang</option>
                            <option value="mdr">Madura</option>
                        </select>
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">Postal Code<span class="text-danger">*</span> </label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input id="postal_code" type="text" class="form-control" name="postal_code" required
                            autocomplete="postal_code" placeholder="Enter your postal code">
                    </div>
                </div>
                <div class="row font-weight-bold">
                    <label class="col-12">Notes</label>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <textarea id="notes" type="text" class="form-control" name="notes" required autocomplete="notes"
                            placeholder="Write notes here.."> </textarea>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded px-3 py-2 my-3">
                <h2 class="text-argavell font-bauer font-weight-bold">Address Details</h2>
                <p class="text-secondary">Choose your shipping method.</p>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipping_method" value="oke"
                            id="shipping_radio_1" checked>
                        <label class="form-check-label" for="shipping_radio_1">
                            <span class="font-weight-bold">JNE - OKE</span> : IDR 7.000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipping_method" value="yes"
                            id="shipping_radio_2">
                        <label class="form-check-label" for="shipping_radio_2">
                            <span class="font-weight-bold">JNE - YES</span> : IDR 15.000
                        </label>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded px-3 py-2 my-3">
                <h2 class="text-argavell font-bauer font-weight-bold">Payment Method</h2>
                <p class="text-secondary">Choose your payment method.</p>
                <div id="paymentGroup" class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="bca" id="payment_radio_1"
                            data-bs-toggle="collapse" data-bs-target="#collapseBCA" checked>
                        <label class="form-check-label" for="payment_radio_1">
                            Transfer BCA
                        </label>
                        <div class="collapse show" id="collapseBCA" data-bs-parent="#paymentGroup">
                            <div class="row mb-2">
                                <div class="col-md-7 bg-light font-weight-bold rounded py-2 px-3">
                                    Account Number : 02839128312830
                                </div>
                            </div>
                            <p class="font-weight-bold">How to pay with Transfer BCA :</p>
                            <ul>
                                <li>Lorem ipsum is a simply dummy text</li>
                                <li>Lorem ipsum is a simply dummy text</li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="mandiri"
                            id="payment_radio_2" data-bs-toggle="collapse" data-bs-target="#collapseMandiri">
                        <label class="form-check-label" for="payment_radio_2">
                            Transfer Mandiri
                        </label>
                        <div class="collapse" id="collapseMandiri" data-bs-parent="#paymentGroup">
                            <div class="row mb-2">
                                <div class="col-md-7 bg-light font-weight-bold rounded py-2 px-3">
                                    Account Number : XXXXXXXXXX
                                </div>
                            </div>
                            <p class="font-weight-bold">How to pay with Transfer Mandiri :</p>
                            <ul>
                                <li>Lorem ipsum is a simply dummy text</li>
                                <li>Lorem ipsum is a simply dummy text</li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded px-3 py-2 my-3">
                <button type="submit" class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Pay
                    Now</button>
            </div>
        </div>
        {{-- order summary desktop --}}
        <div class="col-md-3 d-none d-sm-block">
            <h1 class="text-light font-bauer font-weight-bold py-3">Checkout</h1>
            <div class="bg-white rounded px-3 py-2 my-3">
                <h2 class="text-argavell font-bauer font-weight-bold">Order Summary</h2>
                <div class="row text-secondary">
                    <div class="col-3">Product</div>
                    <div class="col-5"></div>
                    <div class="col-4">Price</div>
                </div>
                <div class="row my-2">
                    <div class="col-3">
                        <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100 rounded">
                    </div>
                    <div class="col-5 font-weight-bold">
                        1x Argan Oil
                    </div>
                    <div class="col-4">IDR 130.000</div>
                </div>
                <div class="row my-2">
                    <div class="col-3">
                        <img src="{{ asset('images/argan-oil-shampoo.jpg') }}" class="w-100 rounded">
                    </div>
                    <div class="col-5 font-weight-bold">
                        1x Argan Shampoo
                    </div>
                    <div class="col-4">IDR 130.000</div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">2 item(s)</span>
                    </div>
                    <div class="col-4">IDR 260.000</div>
                </div>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Shipping Cost
                    </div>
                    <div class="col-4" class="summary_shipping_cost">IDR 7.000</div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Total
                    </div>
                    <div class="col-4" class="summary_total">IDR 267.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
