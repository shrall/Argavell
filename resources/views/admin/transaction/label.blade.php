<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Boostrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="font-proxima-nova">
        <div style="background-color: #FFF7F0">
            <div class="container py-3">
                <div class="d-flex items-center justify-content-between mb-3">
                    <h1 class="text-argavell text-start font-weight-bold">Cetak Label</h1>
                    <div class="btn btn-admin-argavell m-2">Cetak Label</div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3">
            <div class="argavell-label">
                <div class="d-flex items-start justify-content-between mb-3 px-5 py-4">
                    <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="150" height="150">
                    <h1 class="font-weight-bold" style="font-size: 4rem">Non Tunai</h1>
                </div>
                <div class="d-flex items-start justify-content-between mb-1 px-5 py-4">
                    <h1 style="font-size: 3rem">{{ $transaction->order_number }}</h1>
                </div>
                <div class="row items-center px-5 py-4 mb-3">
                    <div class="col-3">{!! DNS1D::getBarcodeHTML('0A', 'CODABAR', 7, 100) !!}</div>
                    <div class="col-4 d-flex flex-column">
                        <h1 style="font-size: 3rem">Kurir</h1>
                        <h1 class="font-weight-bold" style="font-size: 3rem">{{ $transaction->shipment_name }}</h1>
                    </div>
                    <div class="col-2 d-flex flex-column">
                        <h1 style="font-size: 3rem">Berat</h1>
                        <h1 class="font-weight-bold" style="font-size: 3rem">0,33 Kg</h1>
                    </div>
                    <div class="col-3 d-flex flex-column">
                        <h1 style="font-size: 3rem">Ongkir</h1>
                        <h1 class="font-weight-bold" style="font-size: 3rem">Rp {{ $transaction->shipping_cost }}</h1>
                    </div>
                </div>
                <div class="label-info mx-5 mb-1">
                    <h1 class="px-5 py-4"><i>Penjual tidak perlu bayar apapun ke kurir, sudah dibayarkan otomatis.</i>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
