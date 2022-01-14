@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Promotion</h1>
            <h6 class="text-secondary">Daftar promo yang berlaku di produk yang dijual.</h6>
        </div>
        <div class="col-6"></div>
        <div class="col-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.promotion.create') }}" class="btn btn-admin-argavell text-decoration-none">
            <span class="fa fa-fw fa-plus-circle me-2"></span>Tambah Promotion
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table id="table_id" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="25px">NO</th>
                                <th>NAME</th>
                                <th>PRODUCT</th>
                                <th>SIZE</th>
                                <th>DISCOUNT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $promotion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $promotion->name }}</td>
                                    <td>{{ $promotion->product->name }}</td>
                                    <td>
                                        @if ($promotion->product->bundle == '0')
                                            @foreach ($promotion->product->size as $size)
                                                {{ $size }} ml
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @else -
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($promotion->amount as $key => $amount)
                                            @if ($promotion->percent[$key] == 0)
                                                Rp. {{ number_format($amount, 0, ',', '.') }}
                                            @else
                                                {{ $amount }}%
                                            @endif
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.promotion.edit', $promotion->id) }}"
                                            class="btn btn-admin-argavell-light">Edit Promotion</a>
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
