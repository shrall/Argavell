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
            <a href="#" class="btn btn-admin-light shadow-sm text-decoration-none" data-bs-toggle="modal" data-bs-target="#reportModal">
                <span class="fa fa-fw fa-download me-2"></span>Download Laporan Penjualan
            </a>
        </div>
    </div>
    @include('admin.transaction.inc.modal.report')
    <div class="row mb-3">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-argavell nav-fill" id="detailTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-weight-bold" id="semua-pesanan-tab" type="button"
                            data-bs-toggle="tab">SEMUA PESANAN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="pesanan-baru-tab" type="button"
                            data-bs-toggle="tab">PESANAN BARU</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="siap-dikirim-tab" type="button"
                            data-bs-toggle="tab">SIAP DIKIRIM</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dalam-pengiriman-tab" type="button"
                            data-bs-toggle="tab">DALAM PENGIRIMAN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dikomplain-tab" type="button"
                            data-bs-toggle="tab">DIKOMPLAIN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="pesanan-selesai-tab" type="button"
                            data-bs-toggle="tab">PESANAN SELESAI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dibatalkan-tab" type="button"
                            data-bs-toggle="tab">DIBATALKAN</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="semua-pesanan">
                        <div class="row gx-3 mt-3">
                            <div class="col-3 position-relative">
                                <span
                                    class="fa fa-fw fa-search position-absolute top-50 start-0 translate-middle-y ps-4 fs-6 text-secondary"></span>
                                <input type="text" id="input-search" class="form-control ps-5"
                                    onkeyup="fetch_data_by_name();" placeholder="Search by product name">
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
                                <input type="text" name="daterange" id="filter-date" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none align-items-center gx-3 mb-3" id="select-all-row">
        <div class="mx-2" id="select-all-checkbox">
            <input type="checkbox" id="check-all" />
            <span class="font-weight-bold ms-2">Select All</span>
        </div>
        <div class="mx-2 d-block" id="select-all-accept">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Terima Pesanan
            </button>
        </div>
        {{-- <div class="mx-2 d-block" id="select-all-send">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Kirim Pesanan
            </button>
        </div> --}}
        <div class="mx-2 d-none" id="select-all-label">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Cetak Label
            </button>
        </div>
        <div class="mx-2 d-none" id="select-all-invoice">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Cetak Invoice
            </button>
        </div>
        {{-- <div class="mx-2 d-block" id="select-all-list">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Download Daftar Produk
            </button>
        </div> --}}
    </div>
    <div class="row gy-3" id="transaction-container">
        @include('admin.transaction.inc.transaction')
    </div>
    <form action="{{ route('admin.transaction.store') }}" method="post">
        @csrf
        <input type="hidden" name="transaction_id[]" id="input-transaction">
        <input type="hidden" name="method" id="input-method" value="all">
    </form>
@endsection

@section('scripts')
    {{-- date range picker --}}
    {{-- https://www.daterangepicker.com/ --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {
            $('#filter-date').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.post('{{ config('app.url') }}' + "/admin/transaction/fetch_data_" + method, {
                        _token: CSRF_TOKEN,
                        start: start.format('YYYY-MM-DD'),
                        end: end.format('YYYY-MM-DD')
                    })
                    .done(function(data) {
                        // console.log(data)
                        $('#transaction-container').html(data);
                    })
                    .fail(function(error) {
                        console.log(error);
                    });
            });
        });
    </script>
    <script>
        var method = 'all'
        var page = 1

        $('#semua-pesanan-tab').click(function() {
            method = 'all'
            page = 1
            fetch_data(page, method);
        });

        $('#pesanan-baru-tab').click(function() {
            method = 'new'
            page = 1
            fetch_data(page, method);
        });

        $('#siap-dikirim-tab').click(function() {
            method = 'ready'
            page = 1
            fetch_data(page, method);
        });

        $('#dalam-pengiriman-tab').click(function() {
            method = 'ondelivery'
            page = 1
            fetch_data(page, method);
        });

        $('#dikomplain-tab').click(function() {
            //belum
            // method = 'complain'
            // page = 1
            // fetch_data(page, method);
        });

        $('#pesanan-selesai-tab').click(function() {
            method = 'delivered'
            page = 1
            fetch_data(page, method);
        });

        $('#dibatalkan-tab').click(function() {
            method = 'canceled'
            page = 1
            fetch_data(page, method);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            fetch_data(page, method);
        });

        function fetch_data(page, method) {
            changePageMenu();
            $.ajax({
                url: "transaction/pagination/fetch_data_" + method + "?page=" + page,
                success: function(data) {
                    $('#transaction-container').html(data);
                }
            });
        }

        function fetch_data_by_name() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.post('{{ config('app.url') }}' + "/admin/transaction/fetch_data_" + method, {
                    _token: CSRF_TOKEN,
                    data: $('#input-search').val()
                })
                .done(function(data) {
                    $('#transaction-container').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function changePageMenu() {
            if (method != 'all' && method != 'ondelivery' && method != 'canceled') {
                $('#select-all-row').removeClass('d-none').addClass('d-flex')
            } else {
                $('#select-all-row').removeClass('d-flex').addClass('d-none')
            }
            if (method == 'new') {
                $('#select-all-accept').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-accept').removeClass('d-block').addClass('d-none')
            }
            if (method == 'ready') {
                $('#select-all-label').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-label').removeClass('d-block').addClass('d-none')
            }
            if (method == 'delivered') {
                $('#select-all-invoice').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-invoice').removeClass('d-block').addClass('d-none')
            }
        }
    </script>
    <script>
        // checkall
        $("#check-all").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection
