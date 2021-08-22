@extends('layouts.app')

@section('header')
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientkey') }}"></script>
@endsection

@section('content')
    <?php
    $subtotal = 0;
    $discount = 0;
    $totalqty = 0;
    foreach (Auth::user()->carts->where('transaction_id', null) as $item) {
        $totalqty += $item->qty;
        $subtotal += $item->price * $item->qty;
        $discount += $item->price_discount * $item->qty;
    }
    ?>
    <div class="row w-100 p-0 m-0 bg-light">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <h1 class="text-argavell font-bauer font-weight-bold pt-5 mt-5 text-4xl d-block d-sm-none">Checkout</h1>
            <h1 class="text-argavell font-bauer font-weight-bold py-3 d-none d-sm-block">Checkout</h1>
            {{-- order summary mobile --}}
            <div class="bg-white rounded px-3 py-2 my-3 d-block d-sm-none">
                <h2 class="text-argavell font-bauer font-weight-bold">Order Summary</h2>
                <div class="row text-secondary">
                    <div class="col-3">Product</div>
                    <div class="col-5"></div>
                    <div class="col-4">Price</div>
                </div>
                @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                    <div class="row my-2">
                        <div class="col-3">
                            <img src="{{ asset('products/' . $item->product->img) }}" class="w-100 rounded">
                        </div>
                        <div class="col-5 font-weight-bold">
                            {{ $item->qty }}x {{ $item->product->name }}<span
                                class="ms-1 text-secondary">({{ $item->size }})</span>
                        </div>
                        <div class="col-4">IDR {{ ($item->price - $item->price_discount) * $item->qty }}</div>
                    </div>
                @endforeach
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">{{ $totalqty }} item(s)</span>
                    </div>
                    <div class="col-4">IDR <span class="summary_subtotal">{{ $subtotal - $discount }}</span></div>
                </div>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Shipping Cost
                    </div>
                    <div class="col-4">IDR <span class="summary_shipping_cost"></span></div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Total
                    </div>
                    <div class="col-4">IDR <span class="summary_total"></span></div>
                </div>
            </div>
            <form action="{{ route('user.transaction.store') }}" method="post" id="form-checkout">
                @csrf
                <div class="bg-white rounded px-3 py-2 my-3">
                    <input type="hidden" name="price_total" id="summary_subtotal" value="{{ $subtotal - $discount }}">
                    <input type="hidden" name="qty_total" value="{{ $totalqty }}">
                    <input type="hidden" name="weight_total" value="{{ $weight }}">
                    <input type="hidden" name="shipping_cost" id="shipping_cost">
                    <h2 class="text-argavell font-bauer font-weight-bold">Address Details</h2>
                    <p class="text-secondary">Please complete the following data so that your product arrives correctly and
                        safely.</p>
                    <div class="row font-weight-bold">
                        <label class="col-6">First Name<span class="text-danger">*</span> </label>
                        <label class="col-6">Last Name<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" required disabled
                                autocomplete="first_name" placeholder="Enter your first name"
                                value="{{ Auth::user()->first_name }}">
                        </div>
                        <div class="col-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" required disabled
                                autocomplete="last_name" placeholder="Enter your last name"
                                value="{{ Auth::user()->last_name }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Address<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="address" type="text" class="form-control" name="address" required disabled
                                autocomplete="address" placeholder="Enter your address"
                                value="{{ Auth::user()->address->address }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Phone Number<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="phone_number" type="text" class="form-control" name="phone_number" required disabled
                                autocomplete="phone_number" placeholder="Enter your phone number"
                                value="{{ Auth::user()->address->phone }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Province<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select class="form-select font-proxima-nova font-weight-bold" id="province" name="province"
                                required disabled>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province['province'] }}" @if ($province['province'] == Auth::user()->address->province) selected @endif>{{ $province['province'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">City<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select class="form-select font-proxima-nova font-weight-bold" id="city" name="city" required
                                disabled>
                                @foreach ($cities as $city)
                                    <option value="{{ $city['city_name'] }}" @if ($city['city_name'] == Auth::user()->address->city) selected @endif>
                                        {{ $city['city_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Postal Code<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="postal_code" type="text" class="form-control" name="postal_code" required disabled
                                autocomplete="postal_code" placeholder="Enter your postal code"
                                value="{{ Auth::user()->address->postal_code }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Notes</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <textarea id="notes" type="text" class="form-control" name="notes" autocomplete="notes"
                                placeholder="Write notes here.."></textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded px-3 py-2 my-3">
                    <h2 class="text-argavell font-bauer font-weight-bold">Address Details</h2>
                    <p class="text-secondary">Choose your shipping method.</p>
                    <div class="mb-3">
                        @foreach ($shipments['costs'] as $shipment)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_method"
                                    value="{{ $shipment['service'] }}" id="shipping_radio_{{ $loop->iteration }}" @if ($loop->iteration == 1) checked @endif>
                                <input class="form-check-input" type="hidden" name="shipping_etd"
                                    value="{{ $shipment['cost'][0]['etd'] }}">
                                <label class="form-check-label" for="shipping_radio_{{ $loop->iteration }}">
                                    <span class="font-weight-bold">{{ $shipment['description'] }} -
                                        {{ $shipment['service'] }}</span> : IDR <span
                                        id="shipping_cost_{{ $shipment['service'] }}">{{ $shipment['cost'][0]['value'] }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white rounded px-3 py-2 my-3">
                    <h2 class="text-argavell font-bauer font-weight-bold">Payment Method</h2>
                    <p class="text-secondary">Choose your payment method.</p>
                    <div id="paymentGroup" class="mb-3">
                        @foreach ($payments as $payment)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method"
                                    value="{{ $payment->id }}" id="payment_radio_{{ $payment->id }}"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $payment->id }}" @if ($loop->iteration == 1) checked @endif>
                                <label class="form-check-label" for="payment_radio_{{ $payment->id }}">
                                    {{ $payment->name }}
                                </label>
                                <div class="collapse @if ($loop->iteration == 1) show @endif" id="collapse{{ $payment->id }}" data-bs-parent="#paymentGroup">
                                    <div class="row mb-2">
                                        <div class="col-md-7 bg-light font-weight-bold rounded py-2 px-3">
                                            Account Number : {{ $payment->account_number }}
                                        </div>
                                    </div>
                                    <p class="font-weight-bold">How to pay with Transfer BCA :</p>
                                    <ul>
                                        @foreach ($payment->howto as $howto)
                                            <li>{{ $howto }}</li>
                                        @endforeach
                                    </ul>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" value="1001"
                                id="payment_radio_1001" data-bs-toggle="collapse" data-bs-target="#collapse1001">
                            <label class="form-check-label" for="payment_radio_1001">
                                Online Payment
                            </label>
                            <div class="collapse" id="collapse1001" data-bs-parent="#paymentGroup">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="bg-white rounded px-3 py-2 my-3">
                <button id="pay-button" class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0" @if (count(Auth::user()->carts->where('transaction_id', null)) == 0) disabled @endif>Confirm
                    Order</button>
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
                @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                    <div class="row my-2">
                        <div class="col-3">
                            <img src="{{ asset('products/' . $item->product->img) }}" class="w-100 rounded">
                        </div>
                        <div class="col-5 font-weight-bold">
                            {{ $item->qty }}x {{ $item->product->name }}<span
                                class="ms-1 text-secondary">({{ $item->size }})</span>
                        </div>
                        <div class="col-4">IDR {{ ($item->price - $item->price_discount) * $item->qty }}</div>
                    </div>
                @endforeach
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">{{ $totalqty }} item(s)</span>
                    </div>
                    <div class="col-4">IDR <span class="summary_subtotal">{{ $subtotal - $discount }}</span></div>
                </div>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Shipping Cost
                    </div>
                    <div class="col-4">IDR <span class="summary_shipping_cost"></span></div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Total
                    </div>
                    <div class="col-4">IDR <span class="summary_total"></span></div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

@section('scripts')
    <script>
        function refreshSummary() {
            $('.summary_shipping_cost').html($('#shipping_cost_' + $('input[name=shipping_method]:checked').val()).html())
            $('.summary_total').html(parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').val())
                    .html()) +
                parseInt($('#summary_subtotal').val()));
            $('#shipping_cost').val(parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').val())
                .html()));
        }
        refreshSummary();

        $('input[type=radio][name=shipping_method]').on('change', function() {
            refreshSummary();
        });

        function newTransactionOnline(token, status, snaptoken) {
            $.post('{{ config('app.url') }}' + "/transaction/online/store", {
                    _token: token,
                    data: $("#form-checkout").serializeArray(),
                    status: status,
                    snaptoken: snaptoken
                })
                .done(function(data) {
                    console.log(data);
                    window.location.href = '{{ config('app.url') }}' + "/transaction"
                })
                .fail(function() {
                    console.log("fail");
                })
                .always(function() {
                    console.log("always");
                });
        }

        $('#pay-button').click(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var price = parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').val())
                    .html()) +
                parseInt($('#summary_subtotal').val());
            if ($('#payment_radio_1001').is(':checked')) {
                $.post('{{ config('app.url') }}' + "/transaction/getsnap", {
                        _token: CSRF_TOKEN,
                        price: price
                    })
                    .done(function(data) {
                        window.snap.pay(data, {
                            onSuccess: function(result) {
                                newTransactionOnline(CSRF_TOKEN, '1', data);
                            },
                            onPending: function(result) {
                                newTransactionOnline(CSRF_TOKEN, '0', data);
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                alert("payment failed!");
                                console.log(result);
                            }
                        })
                    })
                    .fail(function() {
                        console.log("fail");
                    })
                    .always(function() {
                        console.log("always");
                    });
            } else {
                document.getElementById('form-checkout').submit();
            }
        });
    </script>
@endsection
