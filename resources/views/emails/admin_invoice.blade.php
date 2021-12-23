@component('mail::message')
    <div class="card-header" style="padding-top: 32px; padding-left: 32px; padding-right: 32px;">
        <img src="https://github.com/shrall/datasets/raw/main/images/argavell-email-header-admin.png" width="420px">
        <p class="invoice-number">Invoice Number {{ $transaction->order_number }}</p>
    </div>
    <div class="card-body" style="color: black; padding-left: 32px; padding-right: 32px;">
        <p class="hello" style="line-height: 1.2;font-size:12px; margin-top:8px; margin-bottom:1em;">
            Please confirm the order before {{ date('j F Y, H:i:s', strtotime($transaction->payment_date . ' +1 day')) }}</p>
        <div class="order-summary" style="margin-bottom:1em;">
            <p style="font-weight: 700; text-decoration: underline; margin-bottom: 0;font-size:12px;">ORDER SUMMARY</p>
            <table>
                <tr>
                    <td style="font-size:12px;">Invoice Number</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{ $transaction->order_number }}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;">Order Date</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{ date('j F Y', strtotime($transaction->created_at)) }}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;">Courier</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{$transaction->shipment_name}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;">Shipping Address</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{ $transaction->user->address->address }},
                        {{ $transaction->user->address->city }}, {{ $transaction->user->address->province }},
                        {{ $transaction->user->address->postal_code }}</td>
                </tr>
            </table>
        </div>
        <div class="order-summary" style="margin-bottom:1em;">
            <table>
                @foreach ($transaction->carts as $item)
                    <tr>
                        <td width="15%"><img src="{{ asset('uploads/products/' . $item->product->img) }}" width="50px">
                        </td>
                        <td width="70%">
                            <p style="font-weight: 700; margin-bottom: 1px; font-size:12px;">{{ $item->product->name }}
                                ({{ $item->size }})</p><br>
                            <p style="font-size:12px;">{{ $item->qty }}x Rp.
                                {{ number_format($item->price - $item->price_discount, 0, ',', '.') }}
                            </p>
                        </td>
                        <td style="font-size:12px; text-align: right;" width="25%">
                            <p style="font-weight: 700; font-size:12px;">Rp.
                                {{ number_format($item->qty * ($item->price - $item->price_discount), 0, ',', '.') }},-
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="order-summary" style="margin-bottom:1em;">
            <table>
                <tr>
                    <td style="font-size:12px;" width="85%">Total Shipping Fee ({{ $transaction->shipment_name }})</td>
                    <td style="font-size:12px; text-align: right;" width="25%">
                        <p style="font-size:12px;">
                            Rp. {{ number_format($transaction->shipping_cost, 0, ',', '.') }},-
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:12px; font-weight: 700;">Total Price</td>
                    <td style="font-size:12px; font-weight: 700; text-align: right;">
                        <p style="font-weight: 700; font-size:12px;">
                            Rp.
                            {{ number_format($transaction->price_total + $transaction->shipping_cost, 0, ',', '.') }},-
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        @component('mail::button', ['url' => $url ?? '#'])
            Open Admin Dashboard
        @endcomponent
    </div>
@endcomponent
