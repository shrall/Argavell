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

    <style>
        @page {
            margin: 0;
        }

        table {
            border-left: 0;
            border-right: 0;
            border-top: 0;
            border-bottom: 0;
            border-spacing: -1px;
            border-style : hidden!important;
            border-collapse: collapse;
        }

        table td,
        table tr,
        table th {
            border-left: 0;
            border-right: 0;
            border-top: 0;
            border-bottom: 0;
            border-style : hidden!important;
        }

    </style>
</head>

<body>
    <div class="font-proxima-nova">
        <div class="px-4 py-3">
            @foreach ($transactions as $transaction)
                <div class="argavell-label">
                    <div class="d-flex items-start justify-content-between mb-3 px-5 py-4">
                        <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="150" height="150">
                        <h1 class="font-weight-bold" style="font-size: 4rem">Non Tunai</h1>
                    </div>
                    <div class="d-flex items-start justify-content-between mb-1 px-5 py-4">
                        <h1 style="font-size: 2rem">{{ $transaction->order_number }}</h1>
                    </div>
                    <div class="px-5 border-0">
                        <table class="mx-auto w-100 py-4 mb-3 border-0" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>{!! DNS1D::getBarcodeHTML('0A', 'CODABAR', 7, 100) !!}</td>
                                <td>
                                    <h1 style="font-size: 2rem">Kurir</h1>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">
                                        {{ $transaction->shipment_name }}
                                    </h1>
                                </td>
                                <td>
                                    <h1 style="font-size: 2rem">Berat</h1>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">
                                        {{ $transaction->weight_total / 1000 }}
                                        kg</h1>
                                </td>
                                <td>
                                    <h1 style="font-size: 2rem">Ongkir</h1>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">Rp
                                        {{ $transaction->shipping_cost }}
                                    </h1>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="label-info mx-5 mb-1">
                        <h1 class="px-5 py-4"><i>Penjual tidak perlu bayar apapun ke kurir, sudah dibayarkan
                                otomatis.</i>
                        </h1>
                    </div>
                    <div class="px-5">
                        <table class="mx-auto w-100 py-4 mb-3 border-0" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">Kepada:</h1>
                                    <h1 style="font-size: 2rem">
                                        {{ $transaction->address->first_name }}
                                        {{ $transaction->address->last_name }}
                                        ({{ $transaction->address->phone }})
                                    </h1>
                                    <h1 class="text-secondary" style="font-size: 2rem">
                                        {{ $transaction->address->address }}</h1>
                                    <h1 class="text-secondary" style="font-size: 2rem">
                                        {{ $transaction->address->city }}, {{ $transaction->address->province }}
                                    </h1>
                                    <h1 class="text-secondary" style="font-size: 2rem">Indonesia,
                                        {{ $transaction->address->postal_code }}</h1>
                                </td>
                                <td>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">Dari:</h1>
                                    <h1 style="font-size: 2rem">
                                        Argavell - Indonesia
                                    </h1>
                                    <h1 class="text-secondary" style="font-size: 2rem">Wiyung, Kota Surabaya</h1>
                                    <h1 class="text-secondary" style="font-size: 2rem">+6282143211310</h1>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class="px-5">
                        <table class="mx-auto w-100 py-4 my-3 border-0" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">Produk</h1>
                                </td>
                                <td>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">SKU</h1>
                                </td>
                                <td>
                                    <h1 class="font-weight-bold" style="font-size: 2rem">Jumlah</h1>
                                </td>
                            </tr>
                            @foreach ($transaction->carts as $item)
                                <tr>
                                    <td>
                                        <h1 style="font-size: 2rem">{{ $item->product->name }}</h1>
                                    </td>
                                    <td>
                                        <h1 style="font-size: 2rem">{{ $item->product->sku }}</h1>
                                    </td>
                                    <td>
                                        <h1 style="font-size: 2rem">{{ $item->qty }} pcs</h1>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
