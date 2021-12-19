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
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->order_number }}</td>
                <td>{{ $transaction->id }}</td>
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
                    @foreach ($transaction->carts as $item)
                        {{ $item->product_id }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($transaction->carts as $item)
                        {{ $item->product->name }}<br>
                    @endforeach
                </td>
                <td> {{ $transaction->qty_total }} </td>
                <td>{{ $transaction->notes }}</td>
                <td>
                    @foreach ($transaction->carts as $item)
                        {{ $item->product->price }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($transaction->carts as $item)
                        {{ $item->product->price_discount }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($transaction->carts as $item)
                        {{ $item->product->price - $item->product->price_discount }}<br>
                    @endforeach
                </td>
                <td>{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</td>
                <td>{{ $transaction->user->address->phone ?? '-' }}</td>
                <td>{{ $transaction->user->address->first_name  ?? $transaction->user->first_name }} {{ $transaction->user->address->last_name ?? $transaction->user->last_name }}</td>
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
    </tbody>
</table>
