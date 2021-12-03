<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>SKU</th>
            <th>Nama Produk</th>
            <th>No. Invoice</th>
            <th>Jumlah Produk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            @php
                $total_qty = 0;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach ($product->carts->whereNotNull('transaction_id') as $cart)
                        {{ $cart->transaction->order_number }} ({{ $cart->qty }})<br>
                        @php
                            $total_qty += $cart->qty;
                        @endphp
                    @endforeach
                </td>
                <td>{{ $total_qty }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
