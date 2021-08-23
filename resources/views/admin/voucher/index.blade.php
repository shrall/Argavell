@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Voucher</h1>
            <h6 class="text-secondary">Daftar voucher yang bisa digunakan pengguna.</h6>
        </div>
        <div class="col-6"></div>
        <div class="col-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row justify-content-end mb-3">
        <div class="col-2 text-end">
            <a href="{{ route('admin.voucher.create') }}" class="btn btn-admin-argavell text-decoration-none">
                <span class="fa fa-fw fa-plus-circle me-2"></span>Tambah Voucher
            </a>
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
                                <th>TITLE</th>
                                <th>CODE</th>
                                <th>EXPIRED DATE</th>
                                <th>MINIMUM CHARGE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $voucher->title }}</td>
                                    <td>{{ $voucher->code }}</td>
                                    <td>{{ $voucher->expired_date }}</td>
                                    <td>Rp. {{ $voucher->minimum_charge }}</td>
                                    <td>
                                        <a href="{{ route('admin.voucher.edit', $voucher->id) }}"
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
