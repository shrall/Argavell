@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Products</h1>
            <h6 class="text-secondary">Pastikan produk Anda sudah lengkap dan detail.</h6>
        </div>
        <div class="col-6"></div>
        <div class="col-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table id="table_id" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="25px">NO</th>
                                <th>NAMA PRODUK</th>
                                <th>TYPE</th>
                                <th>STOCK</th>
                                <th>PRICE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                    @if ($product->bundle == '0')Single @else Bundle
                                        @endif
                                    </td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.product.show', $product->id) }}"
                                            class="btn btn-admin-argavell-light">See Details</a>
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
