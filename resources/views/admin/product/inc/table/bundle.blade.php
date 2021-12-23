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
        @foreach ($items as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $products->where('id', $item)->first()->name }}
                    ({{ $products->where('id', $item)->first()->size[$keys[$key]] }} ml)</td>
                <td>{{ $products->where('id', $item)->first()->price[$keys[$key]] }}</td>
                <td>
                    <div class="btn btn-admin-gray" onclick="deleteItem({{ $item }})">Hapus</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
