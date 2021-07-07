@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Transactions</h1>
            <h6 class="text-secondary">Pastikan stok Anda selalu tersedia ketika menerima pesanan.</h6>
        </div>
        <div class="col-5 col-xxl-6"></div>
        <div class="col-3 col-xxl-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row justify-content-start mb-3">
        <div class="col-12 text-start">
            <a href="#" class="btn btn-admin-light shadow-sm text-decoration-none">
                <span class="fa fa-fw fa-download me-2"></span>Download Laporan Penjualan
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-argavell nav-fill" id="detailTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-weight-bold" id="semua-pesanan-tab" data-bs-toggle="tab"
                            data-bs-target="#semua-pesanan" type="button" role="tab" aria-controls="semua-pesanan"
                            aria-selected="true">SEMUA PESANAN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#pesanan-baru" type="button" role="tab" aria-controls="pesanan-baru"
                            aria-selected="false">PESANAN BARU</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#siap-dikirim" type="button" role="tab" aria-controls="siap-dikirim"
                            aria-selected="false">SIAP DIKIRIM</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#dalam-pengiriman" type="button" role="tab" aria-controls="dalam-pengiriman"
                            aria-selected="false">DALAM PENGIRIMAN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#dikomplain" type="button" role="tab" aria-controls="dikomplain"
                            aria-selected="false">DIKOMPLAIN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#pesanan-selesai" type="button" role="tab" aria-controls="pesanan-selesai"
                            aria-selected="false">PESANAN SELESAI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#dibatalkan" type="button" role="tab" aria-controls="dibatalkan"
                            aria-selected="false">DIBATALKAN</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="semua-pesanan" role="tabpanel" aria-labelledby="semua-pesanan-tab">
                        <div class="row gx-3 mt-3">
                            <div class="col-3 position-relative">
                                <span
                                    class="fa fa-fw fa-search position-absolute top-50 start-0 translate-middle-y ps-4 fs-6 text-secondary"></span>
                                <input type="text" name="" id="" class="form-control ps-5"
                                    placeholder="Search by product name">
                            </div>
                            <div class="col-3">
                                <select class="form-select" id="" name="">
                                    <option>Pilih Filter</option>
                                    <option>Pilih Filter</option>
                                    <option>Pilih Filter</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-select" id="" name="">
                                    <option>Urut Berdasarkan</option>
                                    <option>Urut Berdasarkan</option>
                                    <option>Urut Berdasarkan</option>
                                </select>
                            </div>
                            <div class="col-3 position-relative">
                                <span
                                    class="fa fa-fw fa-calendar-day position-absolute top-50 end-0 translate-middle-y pe-5 fs-6 text-secondary"></span>
                                <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pesanan-baru" role="tabpanel" aria-labelledby="pesanan-baru-tab">
                        asd</div>
                    <div class="tab-pane" id="siap-dikirim" role="tabpanel" aria-labelledby="siap-dikirim-tab">
                        asd</div>
                    <div class="tab-pane" id="dalam-pengiriman" role="tabpanel" aria-labelledby="dalam-pengiriman-tab">
                        asd</div>
                    <div class="tab-pane" id="dikomplain" role="tabpanel" aria-labelledby="dikomplain-tab">
                        asd</div>
                    <div class="tab-pane" id="pesanan-selesai" role="tabpanel" aria-labelledby="pesanan-selesai-tab">
                        asd</div>
                    <div class="tab-pane" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">
                        asd</div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center gx-3 mb-3">
        <div class="mx-2">
            <input type="checkbox" />
            <span class="font-weight-bold ms-2">Select All</span>
        </div>
        <div class="mx-2">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Kirim Pesanan
            </button>
        </div>
        <div class="mx-2">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Cetak Label
            </button>
        </div>
        <div class="mx-2">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Cetak Invoice
            </button>
        </div>
        <div class="mx-2">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Download Daftar Produk
            </button>
        </div>
    </div>
    <div class="row gy-3" id="transaction-container">
        @include('admin.transaction.inc.transaction')
    </div>
@endsection

@section('scripts')
    {{-- date range picker --}}
    {{-- https://www.daterangepicker.com/ --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "transaction/pagination/fetch_data?page=" + page,
                    success: function(data) {
                        $('#transaction-container').html(data);
                    }
                });
            }

        });
    </script>
@endsection
