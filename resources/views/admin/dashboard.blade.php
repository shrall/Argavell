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
    <div class="row mb-3">
        <div class="col-7">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0 font-weight-bold">Lorem Ipsum</h5>
                        <h6 class="mb-0 font-weight-bold">Last 7 Days</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex flex-column h-100">
                                <h6 class="mb-3">Avg Sessions</h6>
                                <h6><span class="text-success">+ 5.2%</span> vs last 7 days</h6>
                                <a href="#" class="btn btn-admin-argavell w-100 mt-auto mb-3">View Details</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <figure class="highcharts-figure mt-0">
                                <div id="left-chart"></div>
                            </figure>
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="row">
                        <div class="col-6">
                            <p class="my-0">Goal : $10000000000</p>
                            <div class="left-chart-gauge-box mb-2">
                                <div class="left-chart-gauge" style="background-color: #7467F0; width: 30%;"></div>
                            </div>
                            <p class="my-0">Goal : $10000000000</p>
                            <div class="left-chart-gauge-box mb-2">
                                <div class="left-chart-gauge" style="background-color: #FA678E; width: 30%;"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="my-0">Goal : $10000000000</p>
                            <div class="left-chart-gauge-box mb-2">
                                <div class="left-chart-gauge" style="background-color: #FF9F43; width: 30%;"></div>
                            </div>
                            <p class="my-0">Goal : $10000000000</p>
                            <div class="left-chart-gauge-box mb-2">
                                <div class="left-chart-gauge" style="background-color: #28C76F; width: 30%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0 font-weight-bold">Lorem Ipsum</h5>
                        <h6 class="mb-0 font-weight-bold">Last 7 Days</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <figure class="highcharts-figure mt-0">
                                <div id="right-chart"></div>
                            </figure>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div class="row my-0 justify-content-between">
                                    <div class="col-6"><span class="fa fa-fw fa-circle text-argavell me-2"></span>Lorem
                                    </div>
                                    <div class="col-6">23043</div>
                                </div>
                                <div class="row my-0 justify-content-between">
                                    <div class="col-6"><span
                                            class="fa fa-fw fa-circle text-argavell-light me-2"></span>Lorem</div>
                                    <div class="col-6">23043</div>
                                </div>
                                <div class="row my-0 justify-content-between">
                                    <div class="col-6"><span
                                            class="fa fa-fw fa-circle text-argavell-lighter me-2"></span>Lorem</div>
                                    <div class="col-6">23043</div>
                                </div>
                            </div>
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
                                                    <h6>{{ $item->qty }}x {{ $item->price }}</h6>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="my-0"><span
                                                class="far fa-fw fa-user mr-2"></span>{{ $transaction->user->first_name }}
                                            {{ $transaction->user->last_name }}</p>
                                        <p class="my-0"><span
                                                class="far fa-fw fa-clock mr-2"></span>{{ date('j F Y, g:i a', strtotime($transaction->updated_at)) }}
                                        </p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-panel btn-secondary"><span
                                                class="far fa-fw fa-clock mr-2"></span> 24 Jam</button>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-admin-argavell-light">See Details</a>
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

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.setOptions({
            colors: ['#8a5b32', '#bb9164', '#C9AE98']
        });
        Highcharts.chart('left-chart', {
            chart: {
                height: 150,
                type: 'column',
                marginTop: 0,
                marginBottom: 0
            },
            title: {
                text: ''
            },
            xAxis: {
                visible: false,
                labels: {
                    enabled: false
                },
                categories: [
                    'Sun',
                    'Mon',
                    'Tue',
                    'Wed',
                    'Thu',
                    'Fri',
                    'Sat',
                ],
            },
            yAxis: {
                visible: false,
            },
            plotOptions: {
                series: {
                    borderRadius: 10
                }
            },
            series: [{
                name: 'Traffic',
                data: [65, 100, 50, 35, 25, 120, 70]
            }]
        });

        Highcharts.chart('right-chart', {
            chart: {
                type: 'solidgauge',
                height: 235,
                marginBottom: 0
            },
            title: {
                text: ''
            },

            tooltip: {
                borderWidth: 0,
                backgroundColor: 'none',
                shadow: false,
                style: {
                    fontSize: '16px'
                },
                pointFormat: '<div style="font-family:ProximaNova;font-size:0.9em;">Total<br><span style="color: {point.color}; font-weight: bold;">{point.y}</span></div>',
                positioner: function(labelWidth) {
                    return {
                        x: (this.chart.chartWidth - labelWidth) / 2,
                        y: (this.chart.plotHeight / 2) - 15
                    };
                }
            },
            yAxis: {
                min: 0,
                max: 30000,
                lineWidth: 0,
                tickPositions: []
            },

            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: false
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },

            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Move
                    outerRadius: '105%',
                    innerRadius: '90%',
                    backgroundColor: Highcharts.color(Highcharts.getOptions().colors[0])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }, { // Track for Exercise
                    outerRadius: '80%',
                    innerRadius: '65%',
                    backgroundColor: Highcharts.color(Highcharts.getOptions().colors[1])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }, { // Track for Stand
                    outerRadius: '55%',
                    innerRadius: '40%',
                    backgroundColor: Highcharts.color(Highcharts.getOptions().colors[2])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }]
            },

            series: [{
                name: 'Move',
                data: [{
                    color: Highcharts.getOptions().colors[0],
                    radius: '105%',
                    innerRadius: '90%',
                    y: 23043
                }]
            }, {
                name: 'Exercise',
                data: [{
                    color: Highcharts.getOptions().colors[1],
                    radius: '80%',
                    innerRadius: '65%',
                    y: 14658
                }]
            }, {
                name: 'Stand',
                data: [{
                    color: Highcharts.getOptions().colors[2],
                    radius: '55%',
                    innerRadius: '40%',
                    y: 4758
                }]
            }]
        });
    </script>
@endsection

@section('header')
    <style>
        .highcharts-no-tooltip {
            display: none;
        }

        .highcharts-credits {
            display: none;
        }

    </style>
@endsection
