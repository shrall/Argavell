<table>
    <thead>
        <tr>
            <th>Count</th>
            <th>Order ID</th>
            <th>Invoice</th>
            <th>Payment Date</th>
            <th>Order Status</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>SKU</th>
            <th>Quantity</th>
            <th>Notes</th>
            <th>Price (Rp.)</th>
            <th>Discount (Rp.)</th>
            <th>Price after Discount (Rp.)</th>
            <th>Customer Name</th>
            <th>Customer Phone</th>
            <th>Recipient</th>
            <th>Recipient Number</th>
            <th>Recipient Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Postal Code</th>
            <th>Courier</th>
            <th>Shipping Fee(Rp.)</th>
            <th>Total Amount(Rp.)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $key => $transaction)
            @foreach ($transaction->carts as $item)
                <tr>
                    <td>{{ $loop->index == 0 ? $key + 1 : '' }}</td>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->order_number }}</td>
                    <td>{{ $transaction->payment_date }}</td>
                    @if ($transaction->status == '0')
                        <td>Menunggu Konfirmasi Pembayaran</td>
                    @elseif ($transaction->status == '1')
                        <td>Selesai</td>
                    @elseif ($transaction->status == '2')
                        <td>Dibatalkan</td>
                    @elseif ($transaction->status == '3')
                        <td>Dalam Pengiriman</td>
                    @elseif ($transaction->status == '4')
                        <td>Sudah Dibayar</td>
                    @elseif ($transaction->status == '5')
                        <td>Siap Dikirim</td>
                    @endif
                    <td>
                        {{ $item->product_id }}
                    </td>
                    <td>
                        {{ $item->product->name }}
                    </td>
                    <td>
                        {{ $item->product->sku }}
                    </td>
                    <td> {{ $item->qty }} </td>
                    <td>{{ $transaction->notes }}</td>
                    <td>
                        {{ $item->product->price }}
                    </td>
                    <td>
                        {{ $item->product->price_discount }}
                    </td>
                    <td>
                        {{ $item->product->price - $item->product->price_discount }}
                    </td>
                    <td>{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</td>
                    <td>{{ $transaction->user->address->phone ?? '-' }}</td>
                    <td>{{ $transaction->user->address->first_name ?? $transaction->user->first_name }}
                        {{ $transaction->user->address->last_name ?? $transaction->user->last_name }}</td>
                    <td>{{ $transaction->user->address->phone ?? '-' }}</td>
                    <td>{{ $transaction->user->address->address ?? '-' }}</td>
                    <td>{{ $transaction->user->address->city ?? '-' }}</td>
                    <td>{{ $transaction->user->address->province ?? '-' }}</td>
                    <td>{{ $transaction->user->address->postal_code ?? '-' }}</td>
                    <td>{{ $transaction->shipment_name }}</td>
                    <td>{{ $transaction->shipping_cost }}</td>
                    <td>{{ $transaction->price_total + $item->product->price_discount }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
