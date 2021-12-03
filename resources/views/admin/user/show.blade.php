@extends('layouts.admin')

@section('content')
    <div class="row justify-content-between mb-4">
        <div class="col-2">
            <a href="{{ route('admin.user.index') }}" class="btn btn-argavell-light"><span
                    class="fa fa-fw fa-arrow-left mr-2"></span>Kembali</a>
        </div>
        <div class="col-8 text-center align-middle">
            <h4 class="text-argavell font-weight-black">Detail Pemesan/Pengguna</h4>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <h6 class="font-weight-black">Detail Pemesan</h6>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row font-weight-bold">
                            <label class="col-6 text-start">Nama Depan</label>
                            <label class="col-6 text-start">Nama Belakang</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" required
                                    autocomplete="first_name" placeholder="Nama Depan" value="{{ $user->first_name }}"
                                    required>
                            </div>
                            <div class="col-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" required
                                    autocomplete="last_name" placeholder="Nama Belakang" value="{{ $user->last_name }}"
                                    required>
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-6 text-start">E-Mail</label>
                            <label class="col-6 text-start">Nomor Telepon</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input id="email" type="text" class="form-control" name="email" required
                                    autocomplete="email" placeholder="E-Mail" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-6">
                                <input id="phone" type="text" class="form-control" name="phone" required
                                    autocomplete="phone" placeholder="Nomor Telepon"
                                    value="{{ $user->address->phone ?? 'Not Set' }}" @if ($user->address == null) disabled @else required @endif>
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12 text-start">Alamat Pengiriman</label>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea id="address" type="textarea" class="form-control" name="address" required
                                    autocomplete="address" placeholder="Alamat Pengiriman" style="resize: none;"
                                    @if ($user->address == null) disabled @else required @endif>{{ $user->address->address ?? 'Not Set' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <button type="submit" class="btn btn-admin-argavell w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h6 class="font-weight-black">Cart</h6>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table id="table_id" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="25px">NO</th>
                                <th>NAMA PRODUK</th>
                                <th>HARGA</th>
                                <th>QTY</th>
                                <th>SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->carts->where('transaction_id', null) as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp. {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp.
                                        {{ number_format(($item->price - $item->price_discount) * $item->qty, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
