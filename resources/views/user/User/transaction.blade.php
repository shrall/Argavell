@extends('layouts.app')

@section('header')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientkey') }}"></script>
@endsection

@section('content')
    @include('user.User.inc.header')
    <div class="row w-100 m-0 p-0 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('user.User.inc.sidebar')
        </div>
        <div class="col-md-6">
            <table id="table_id" class="table table-responsive">
                <thead>
                    <tr>
                        <th width="40%">Product</th>
                        <th>Price</th>
                        <th>Invoice</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-6 col-sm-4"><img
                                            src="{{ asset('uploads/products/' . $transaction->carts[0]->product->img) }}"
                                            class="w-100 rounded">
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <ul class="list-unstyled">
                                            @foreach ($transaction->carts as $item)
                                                <li>{{ $item->qty }}x {{ $item->product->name }}
                                                    @if ($item->product->bundle == '0')
                                                        ({{ $item->product->size[$item->key] }} ml)
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>IDR
                                {{ number_format($transaction->price_total + $transaction->shipping_cost, 0, ',', '.') }}
                            </td>
                            <td>
                                <p class="my-0">{{ $transaction->date }}</p>
                                <p class="my-0">{{ $transaction->order_number }}</p>
                                <a href="#" class="text-dark font-weight-bold" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal{{ $transaction->id }}" role="button">See Details</a>
                            </td>
                            <td>
                                @if ($transaction->status == '0' && count($transaction->proofs) > 0)
                                    <p class="my-0 text-secondary font-weight-bold">Payment Info in Progress</p>
                                @elseif ($transaction->status == '0')
                                    <p class="my-0 text-secondary font-weight-bold">Waiting for Payment</p>
                                @elseif ($transaction->status == '1' && count($transaction->refunds->where('transaction_id', $transaction->id)->where('status', 1)) > 0)
                                    <p class="my-0 text-success font-weight-bold">Refund Status: Accepted</p>
                                @elseif ($transaction->status == '1' && count($transaction->refunds->where('transaction_id', $transaction->id)->where('status', 0)) > 0)
                                    <p class="my-0 text-warning font-weight-bold">Refund Status: Pending</p>
                                @elseif ($transaction->status == '1' && count($transaction->refunds->where('transaction_id', $transaction->id)->where('status', 2)) > 0)
                                    <p class="my-0 text-danger font-weight-bold">Refund Status: Rejected</p>
                                @elseif($transaction->status == '1')
                                    <p class="my-0 text-success font-weight-bold">Shipped</p>
                                @elseif($transaction->status == '2')
                                    <p class="my-0 text-danger font-weight-bold">Canceled</p>
                                @elseif($transaction->status == '3')
                                    <p class="my-0 text-warning font-weight-bold">On Delivery</p>
                                @elseif($transaction->status == '4')
                                    <p class="my-0 text-black font-weight-bold">Waiting for Confirmation</p>
                                @elseif($transaction->status == '5')
                                    <p class="my-0 text-primary font-weight-bold">Confirmed</p>
                                @endif
                                @if ($transaction->status == '0')
                                    @if ($transaction->payment_id != 1001)
                                        <a onclick="event.preventDefault();
                                                        document.getElementById('paynowform').submit();"
                                            class="btn btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Pay
                                            Now
                                        </a>
                                        <form action="{{ route('page.paymentconfirmation') }}" method="post"
                                            id="paynowform">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $transaction->order_number }}">
                                        </form>
                                    @else
                                        <a onclick="event.preventDefault(); opensnap('{{ $transaction->snaptoken }}')"
                                            class="btn btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Pay
                                            Now
                                        </a>
                                    @endif
                                @elseif ($transaction->status == '3')
                                    <form action="{{ route('user.transaction.finishorder') }}" method="post"
                                        id="finish-{{ $transaction->id }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $transaction->id }}">
                                        <button type="submit"
                                            class="btn btn-argavell text-center w-100 mt-2 py-2 cursor-pointer border-0">Finish
                                            Order
                                        </button>
                                    </form>
                                    <a href="{{ route('page.policy') }}"
                                        class="btn btn-argavell text-center w-100 mt-2 py-2 cursor-pointer border-0">Complain
                                    </a>
                                @elseif ($transaction->status == '1')
                                    <form action="{{ route('user.transaction.buyagain') }}" method="post"
                                        id="buy-again-{{ $transaction->id }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $transaction->id }}">
                                        <button type="submit"
                                            class="btn btn-argavell text-center w-100 mt-2 py-2 cursor-pointer border-0">Buy
                                            again
                                        </button>
                                    </form>
                                    <a href="{{ route('page.policy') }}"
                                        class="btn btn-argavell text-center w-100 mt-2 py-2 cursor-pointer border-0">Complain
                                    </a>
                                @else
                                    <form action="{{ route('user.transaction.buyagain') }}" method="post"
                                        id="buy-again-{{ $transaction->id }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $transaction->id }}">
                                        <button type="submit"
                                            class="btn btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Buy
                                            again
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- transaction modal --}}
    @foreach ($transactions as $transaction)
        <div class="modal fade p-0" id="transactionModal{{ $transaction->id }}" tabindex="-1"
            aria-labelledby="transactionModal{{ $transaction->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transactionModal{{ $transaction->id }}Label"><span
                                class="text-argavell font-elmessiri fs-3 me-2">Transaction Details</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 mb-3">
                            <div
                                class="row bg-light rounded w-100 m-0 px-3 py-2 align-items-center justify-content-between">
                                <div class="col-6">
                                    <p class="my-0 text-secondary">{{ $transaction->date }}</p>
                                    <p class="my-0 fs-5 font-weight-bold">{{ $transaction->order_number }}</p>
                                </div>
                                <div class="col-6 justify-content-end">
                                    @if ($transaction->status == '0')
                                        <p class="my-0 text-secondary font-weight-bold text-end">Waiting for Payment</p>
                                    @elseif($transaction->status == '1')
                                        <p class="my-0 text-success font-weight-bold text-end">Shipped</p>
                                    @elseif($transaction->status == '2')
                                        <p class="my-0 text-danger font-weight-bold text-end">Canceled</p>
                                    @elseif($transaction->status == '3')
                                        <p class="my-0 text-warning font-weight-bold text-end">On Delivery</p>
                                    @elseif($transaction->status == '4')
                                        <p class="my-0 text-warning font-weight-bold text-end">Waiting for Confirmation</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row justify-content-between">
                                <div class="col-2">Product</div>
                                <div class="col-2 text-end">Price</div>
                            </div>
                        </div>
                        @foreach ($transaction->carts as $item)
                            <div class="col-12 mx-2 my-2">
                                <div class="row">
                                    <div class="col-2"><img
                                            src="{{ asset('uploads/products/' . $item->product->img) }}"
                                            class="w-100 rounded">
                                    </div>
                                    <div class="col-7">{{ $item->qty }}x {{ $item->product->name }}
                                        @if ($item->product->bundle == '0')
                                            ({{ $item->product->size[$item->key] }} ml)
                                        @endif
                                    </div>
                                    <div class="col-3 pe-4 text-end">IDR {{ $item->price - $item->price_discount }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer pb-0 px-0">
                        <div class="col-12 p-0 m-0 px-4 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary">Subtotal {{ $transaction->qty_total }} item(s)</div>
                                <div class="font-weight-bold">IDR {{ $transaction->price_total }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary">Shipping Cost</div>
                                <div class="font-weight-bold">IDR {{ $transaction->shipping_cost }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary">Payment Method</div>
                                <div class="font-weight-bold">{{ $transaction->payment->name }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary"></div>
                                <div class="font-weight-bold">a.n Louis Yuwono -
                                    {{ $transaction->payment->account_number }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary">Shipment Method</div>
                                <div class="font-weight-bold">{{ $transaction->shipment_name }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between font-weight-bold">
                                <div>Total</div>
                                <div>IDR {{ $transaction->price_total + $transaction->shipping_cost }}</div>
                            </div>
                        </div>
                        <div class="row bg-light px-4">
                            <div class="col-12 p-0 m-0">
                                <div class="font-weight-bold">Shipping Details</div>
                            </div>
                            <div class="col-7 p-0 m-0 mb-2">
                                <p class="my-0 text-argavell">Name</p>
                                <p class="my-0">
                                    {{ $transaction->address->first_name }} {{ $transaction->address->last_name }}</p>
                            </div>
                            <div class="col-5 p-0 m-0 mb-2">
                                <p class="my-0 text-argavell">Phone Number</p>
                                <p class="my-0">{{ $transaction->address->phone }}</p>
                            </div>
                            <div class="col-7 p-0 m-0">
                                <p class="my-0 text-argavell">Home</p>
                                <p class="my-0">{{ $transaction->address->address }},
                                    {{ $transaction->address->city }},
                                    {{ $transaction->address->province }}, {{ $transaction->address->postal_code }}
                                </p>
                            </div>
                            <div class="col-5 p-0 m-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function opensnap(snaptoken) {
            window.snap.pay(snaptoken, {
                onSuccess: function(result) {
                    console.log(result);
                },
                onPending: function(result) {
                    console.log(result);
                },
                onError: function(result) {
                    console.log(result);
                }
            })
        }
    </script>
@endsection
