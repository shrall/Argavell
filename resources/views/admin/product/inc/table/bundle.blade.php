<table id="table_id" class="table table-responsive">
    <thead>
        <tr>
            <th width="25px">NO</th>
            <th>NAMA PRODUK</th>
            <th>HARGA SATUAN</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <div class="btn btn-admin-gray" onclick="deleteItem({{ $product->id }})">Hapus</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
