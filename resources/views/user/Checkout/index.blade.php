@extends('layouts.app')

@section('header')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientkey') }}"></script>
@endsection
@php
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
@endphp
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
            <h1 class="text-argavell font-elmessiri font-weight-bold pt-5 mt-5 text-4xl d-block d-sm-none">Checkout</h1>
            <h1 class="text-argavell font-elmessiri font-weight-bold py-3 d-none d-sm-block">Checkout</h1>
            {{-- order summary mobile --}}
            <div class="bg-white rounded px-3 py-2 my-3 d-block d-sm-none">
                <h2 class="text-argavell font-elmessiri font-weight-bold">Order Summary</h2>
                <div class="row text-secondary">
                    <div class="col-3">Product</div>
                    <div class="col-5"></div>
                    <div class="col-4">Price</div>
                </div>
                @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                    <div class="row my-2">
                        <div class="col-3">
                            <img src="{{ asset('uploads/products/' . $item->product->img) }}" class="w-100 rounded">
                        </div>
                        <div class="col-5 font-weight-bold">
                            {{ $item->qty }}x {{ $item->product->name }}
                            @if ($item->product->bundle == '0') <span class="ms-1 text-secondary">({{ $item->size }})</span> @endif
                        </div>
                        <div class="col-4">IDR {{ rupiah(($item->price - $item->price_discount) * $item->qty) }}
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">{{ $totalqty }} item(s)</span>
                    </div>
                    <div class="col-4">IDR <span
                            class="summary_subtotal">{{ rupiah($subtotal - $discount) }}</span>
                    </div>
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
                    <input type="hidden" id="summary_total">
                    <input type="hidden" name="qty_total" value="{{ $totalqty }}">
                    <input type="hidden" name="weight_total" value="{{ $weight }}">
                    <input type="hidden" name="shipping_cost" id="shipping_cost">
                    <h2 class="text-argavell font-elmessiri font-weight-bold">Address Details</h2>
                    <p class="text-secondary">Please complete the following data so that your product arrives correctly and
                        safely.</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row font-weight-bold">
                        <label class="col-6">First Name<span class="text-danger">*</span></label>
                        <label class="col-6">Last Name<span class="text-danger">*</span></label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" required
                                @if (Auth::user()->first_name) disabled @endif autocomplete="first_name" placeholder="Enter your first name"
                                value="{{ Auth::user()->first_name }}">
                        </div>
                        <div class="col-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" required
                                @if (Auth::user()->last_name) disabled @endif autocomplete="last_name" placeholder="Enter your last name"
                                value="{{ Auth::user()->last_name }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Address<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="address" type="text" class="form-control" name="address" required
                                @if (Auth::user()->address_id) disabled @endif autocomplete="address" placeholder="Enter your address"
                                value="{{ Auth::user()->address->address ?? null }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Phone Number<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="phone_number" type="number" class="form-control" name="phone_number" required
                                @if (Auth::user()->address_id) disabled @endif autocomplete="phone_number" placeholder="Enter your phone number"
                                value="{{ Auth::user()->address->phone ?? null }}">
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Province<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select class="form-select font-proxima-nova" id="province" name="province" required
                                @if (Auth::user()->address_id) disabled @endif>
                                @if (!Auth::user()->address_id)
                                    <option class="tempprovince" selected>Please select your province</option>
                                @endif
                                @foreach ($provinces as $province)
                                    <option value="{{ $province['province'] }}" @if (Auth::user()->address_id) @if ($province['province'] == Auth::user()->address->province) selected @endif @endif>
                                        {{ $province['province'] }}
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
                            <select class="form-select font-proxima-nova" id="city" name="city" required disabled>
                                @if (Auth::user()->address_id)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['city_name'] }}" @if ($city['city_name'] == Auth::user()->address->city) selected @endif>
                                            {{ $city['city_name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row font-weight-bold">
                        <label class="col-12">Postal Code<span class="text-danger">*</span> </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="postal_code" type="number" class="form-control" name="postal_code" required
                                @if (Auth::user()->address_id) disabled @endif autocomplete="postal_code" placeholder="Enter your postal code"
                                value="{{ Auth::user()->address->postal_code ?? null }}">
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
                    <h2 class="text-argavell font-elmessiri font-weight-bold">Shipping Method</h2>
                    <p class="text-secondary">Choose your shipping method.</p>
                    <div class="mb-3" id="container-shipment">
                        @if (Auth::user()->address_id)
                            @foreach ($shipments['costs'] as $shipment)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        data-order={{ $loop->iteration }}
                                        value="{{ $shipments['name'] . ' - ' . $shipment['service'] }}"
                                        id="shipping_radio_{{ $loop->iteration }}" @if ($loop->iteration == 1) checked @endif>
                                    <input class="form-check-input" type="hidden" name="shipping_etd"
                                        value="{{ $shipment['cost'][0]['etd'] }}">
                                    <label class="form-check-label" for="shipping_radio_{{ $loop->iteration }}">
                                        <span class="font-weight-bold">{{ $shipment['description'] }} -
                                            {{ $shipment['service'] }}</span> : IDR <span
                                            id="shipping_cost_{{ $loop->iteration }}">{{ rupiah($shipment['cost'][0]['value']) }}</span>
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <h5 class="mb-0">Please Complete Your Address First</h5>
                        @endif
                    </div>
                </div>
                <div class="bg-white rounded px-3 py-2 my-3">
                    <h2 class="text-argavell font-elmessiri font-weight-bold">Payment Method</h2>
                    <p class="text-secondary">Choose your payment method.</p>
                    <div id="paymentGroup" class="mb-3">
                        @foreach ($payments as $payment)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method"
                                    value="{{ $payment->id }}" id="payment_radio_{{ $payment->id }}"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $payment->id }}"
                                    @if ($loop->iteration == 1) checked @endif>
                                <label class="form-check-label" for="payment_radio_{{ $payment->id }}">
                                    {{ $payment->name }}
                                </label>
                                <div class="collapse @if ($loop->iteration == 1) show @endif" id="collapse{{ $payment->id }}"
                                    data-bs-parent="#paymentGroup">
                                    <div class="row mb-2">
                                        <div class="col-md-7 bg-light font-weight-bold rounded py-2 px-3">
                                            Account Number : {{ $payment->account_number }} - a/n Louis Yuwono
                                        </div>
                                    </div>
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
                <button id="pay-button" type="submit"
                    class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0"
                    @if (count(Auth::user()->carts->where('transaction_id', null)) == 0) disabled @endif>Confirm
                    Order
                </button>
            </div>
        </div>
        {{-- order summary desktop --}}
        <div class="col-md-3 d-none d-sm-block">
            <h1 class="text-light font-elmessiri font-weight-bold py-3">Checkout</h1>
            <div class="bg-white rounded px-3 py-2 my-3">
                <h2 class="text-argavell font-elmessiri font-weight-bold">Order Summary</h2>
                <div class="row text-secondary">
                    <div class="col-3">Product</div>
                    <div class="col-5"></div>
                    <div class="col-4">Price</div>
                </div>
                @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                    <div class="row my-2">
                        <div class="col-3">
                            <img src="{{ asset('uploads/products/' . $item->product->img) }}" class="w-100 rounded">
                        </div>
                        <div class="col-5 font-weight-bold">
                            {{ $item->qty }}x {{ $item->product->name }}
                            @if ($item->product->bundle == '0') <span class="ms-1 text-secondary">({{ $item->size }})</span> @endif
                        </div>
                        <div class="col-4">IDR
                            {{ rupiah(($item->price - $item->price_discount) * $item->qty) }}</div>
                    </div>
                @endforeach
                <hr>
                <div class="row my-2">
                    <div class="col-8 font-weight-bold">
                        Subtotal <span class="text-secondary">{{ $totalqty }} item(s)</span>
                    </div>
                    <div class="col-4">IDR <span
                            class="summary_subtotal">{{ rupiah($subtotal - $discount) }}</span>
                    </div>
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
        Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
            var n = this,
                decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSeparator = decSeparator == undefined ? "." : decSeparator,
                thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
                sign = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" +
                thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
        };

        function refreshSummary() {
            $('.summary_shipping_cost').html($('#shipping_cost_' + $('input[name=shipping_method]:checked').data("order"))
                .html())
            $('.summary_total').html(
                (parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').data("order")).html().replace(
                    '.',
                    '')) + parseInt($('#summary_subtotal').val())).formatMoney(0, '.', ''));
            $('#shipping_cost').val(parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').data("order"))
                .html().replace('.', '')));
            $('#summary_total').val(parseInt($('#shipping_cost_' + $('input[name=shipping_method]:checked').data("order"))
                .html()
                .replace('.', '')) + parseInt($('#summary_subtotal').val()));
        }
        @if (Auth::user()->address_id)
            refreshSummary();
        @endif

        $('input[type=radio][name=shipping_method]').on('change', function() {
            refreshSummary();
        });

        function newTransactionOnline(token, status, snaptoken) {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/transaction/online/store", {
                    _token: token,
                    shipping_method: $("input[name=shipping_method]:checked").val(),
                    shipping_cost: $("input[name=shipping_cost]").val(),
                    price_total: $("input[name=price_total]").val(),
                    qty_total: $("input[name=qty_total]").val(),
                    weight_total: $("input[name=weight_total]").val(),
                    payment_method: $("input[name=payment_method]:checked").val(),
                    shipping_etd: $("input[name=shipping_etd]").val(),
                    status: status,
                    snaptoken: snaptoken,
                    phone_number: $('#phone_number').val(),
                    city: $('#city').val(),
                    address: $('#address').val(),
                    province: $('#province').val(),
                    postal_code: $('#postal_code').val(),
                })
                .done(function(data) {
                    window.location.href = '{{ config('app.url') }}' + "/transaction"
                })
                .fail(function(e) {
                    console.log(e);
                });
        }

        var payButtonClicked = false;

        $('#pay-button').click(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var price = parseInt($('#summary_total').val());
            if ($('#payment_radio_1001').is(':checked')) {
                var hostname = "{{ request()->getHost() }}"
                var url = ""
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                } else {
                    url = "{{ config('app.url') }}"
                }
                $.post(url + "/transaction/getsnap", {
                        _token: CSRF_TOKEN,
                        price: price,
                        phone: $('#phone_number').val()
                    })
                    .done(function(data) {
                        window.snap.pay(data, {
                            onSuccess: function(result) {
                                newTransactionOnline(CSRF_TOKEN, '5', data);
                            },
                            onPending: function(result) {
                                newTransactionOnline(CSRF_TOKEN, '0', data);
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                alert("payment failed!");
                            }
                        })
                    })
                    .fail(function(e) {
                        console.log(e);
                    });
            } else {
                if (!payButtonClicked) {
                    document.getElementById('form-checkout').submit();
                    payButtonClicked = true;
                }
            }
        });
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#province').on('change', function(e) {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/cart/getcity", {
                    _token: CSRF_TOKEN,
                    province: $('#province').val(),
                })
                .done(function(data) {
                    $('.tempprovince').remove();
                    $('#city').prop("disabled", false);
                    $('#city').html('');
                    Object.values(data).forEach((element, index) => {
                        if (index == 0) {
                            get_shipment(element.city_id);
                        }
                        $('#city').append('<option onchange="get_shipment(' + element.city_id +
                            ');" value="' + element.city_name +
                            '">' +
                            element.city_name + '</option>')
                    });
                })
                .fail(function(e) {
                    console.log(e);
                });
        });

        function get_shipment(city_id) {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/cart/getshipment", {
                    _token: CSRF_TOKEN,
                    weight: {{ $weight }},
                    city_id: city_id,
                })
                .done(function(data) {
                    $('#container-shipment').html(data);
                    refreshSummary();
                })
                .fail(function(e) {
                    console.log(e);
                });
        }
    </script>
@endsection
