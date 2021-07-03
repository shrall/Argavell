@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Dashboard</h1>
            <h6 class="text-secondary">Berikut ini ringkasan seluruh kegiatan toko Anda.</h6>
        </div>
        <div class="col-6"></div>
        <div class="col-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row mb-3">
        <h6 class="font-weight-black">Quick Stats</h6>
        <div class="col-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <h1 class="fa fa-fw fa-boxes text-red"></h1>
                        </div>
                        <div class="col-10">
                            <h6 class="mb-0">Total Pesanan Selesai</h6>
                            <h4 class="font-weight-black mb-0">{{ $transactions->where('status', '1')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <h1 class="fa fa-fw fa-shopping-cart text-blue"></h1>
                        </div>
                        <div class="col-10">
                            <h6 class="mb-0">Total Cart</h6>
                            <h4 class="font-weight-black mb-0">{{ $carts->where('transaction_id', null)->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <h1 class="fa fa-fw fa-users text-yellow"></h1>
                        </div>
                        <div class="col-10">
                            <h6 class="mb-0">Total User</h6>
                            <h4 class="font-weight-black mb-0">{{ $users->where('role', '0')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h6 class="font-weight-black">Transaksi Baru</h6>
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table id="table_id" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="25px">NO</th>
                                <th width="50%">PRODUK</th>
                                <th>DETAIL</th>
                                <th>BATAS RESPON</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions->where('status', '4') as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2"><img
                                                    src="{{ asset('products/' . $transaction->carts[0]->product->img) }}"
                                                    class="rounded" width="75px">
                                            </div>
                                            <div class="col-10">
                                                @foreach ($transaction->carts as $item)
                                                    <h6 class="font-weight-black">{{ $item->product->name }}</h6>
                                                    <h6>{{ $item->qty }}x {{$item->price}}</h6>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="my-0"><span class="far fa-fw fa-user mr-2"></span>{{$transaction->user->first_name}} {{$transaction->user->last_name}}</p>
                                        <p class="my-0"><span class="far fa-fw fa-clock mr-2"></span>{{date("j F Y, g:i a", strtotime($transaction->updated_at))}}
                                        </p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-panel btn-secondary"><span
                                                class="far fa-fw fa-clock mr-2"></span> 24 Jam</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-admin-argavell-light">See
                                            Details</button>
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
