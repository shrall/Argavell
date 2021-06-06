@extends('layouts.app')

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
                        <th>Inovice</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-6 col-sm-4"><img
                                            src="{{ asset('products/' . $transaction->carts[0]->product->img) }}"
                                            class="w-100 rounded">
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <ul class="list-unstyled">
                                            @foreach ($transaction->carts as $item)
                                                <li>{{ $item->qty }}x {{ $item->product->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>IDR {{ $transaction->price_total }}</td>
                            <td>
                                <p class="my-0">{{ $transaction->date }}</p>
                                <p class="my-0">{{ $transaction->order_number }}</p>
                                <a href="#" class="text-dark font-weight-bold" data-bs-toggle="modal"
                                    data-bs-target="#transactionModal{{ $transaction->id }}" role="button">See Details</a>
                            </td>
                            <td>
                                @if ($transaction->status == '0')
                                    <p class="my-0 text-secondary font-weight-bold">Waiting for Payment</p>
                                @elseif($transaction->status == '1')
                                    <p class="my-0 text-success font-weight-bold">Shipped</p>
                                @elseif($transaction->status == '2')
                                    <p class="my-0 text-danger font-weight-bold">Canceled</p>
                                @elseif($transaction->status == '3')
                                    <p class="my-0 text-warning font-weight-bold">On Delivery</p>
                                @endif
                                <p class="btn-argavell text-center w-100 mt-2 mb-4 py-2 cursor-pointer border-0">Buy again
                                </p>
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
                                class="text-argavell font-bauer fs-3 me-2">Transaction Details</span></h5>
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
                                    <div class="col-2"><img src="{{ asset('products/' . $item->product->img) }}"
                                            class="w-100 rounded">
                                    </div>
                                    <div class="col-7">{{ $item->qty }}x {{ $item->product->name }}</div>
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
                                <p class="my-0">{{ $transaction->address->address }}, {{ $transaction->address->city }},
                                    {{ $transaction->address->province }}, {{ $transaction->address->postal_code }} </p>
                            </div>
                            <div class="col-5 p-0 m-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
