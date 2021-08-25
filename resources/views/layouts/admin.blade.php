<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

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

    @yield('header')
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #fcfcfc">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed">
                    <a href="{{ route('admin.page.dashboard') }}"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="50" height="50"
                            class="d-inline-block align-text-top">
                    </a>
                    <ul class="nav nav-pills w-100 flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="admin-sidebar">
                        <li class="nav-item my-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.page.dashboard') active @endif">
                            <a href="{{ route('admin.page.dashboard') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-th-large mr-2"></span><span
                                    class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.transaction.index') active @endif">
                            <a href="{{ route('admin.transaction.index') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-comment-dollar mr-2"></span><span
                                    class="ms-1 d-none d-sm-inline">Transactions</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.product.index' || Route::current()->getName() == 'admin.product.create' || Route::current()->getName() == 'admin.product.edit') active @endif">
                            <a href="{{ route('admin.product.index') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-shopping-bag mr-2"></span><span
                                    class="ms-1 d-none d-sm-inline">Products</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.voucher.index' || Route::current()->getName() == 'admin.voucher.create' || Route::current()->getName() == 'admin.voucher.edit') active @endif">
                            <a href="{{ route('admin.voucher.index') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-ticket-alt mr-2"></span><span
                                    class="ms-1 d-none d-sm-inline">Vouchers</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.user.index' || Route::current()->getName() == 'admin.user.show') active @endif">
                            <a href="{{ route('admin.user.index') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-user mr-2"></span><span
                                    class="ms-1 d-none d-sm-inline">Users</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4 w-100 pe-5 @if (Route::current()->getName() == 'admin.changepassword') active @endif">
                            <a href="{{ route('admin.changepassword') }}"
                                class="text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                                <span class="fa fa-fw fa-lock mr-2"></span><span class="ms-1 d-none d-sm-inline">Change
                                    Password</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="text-dark text-decoration-none font-proxima-nova font-weight-bold align-middle px-0">
                            <span class="fa fa-fw fa-sign-out-alt mr-2"></span><span
                                class="ms-1 d-none d-sm-inline">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col py-4 px-5 font-proxima-nova" style="background-color: #FFF7F0">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            var thetable = $('.table').DataTable({});
            $.fn.dataTable.ext.errMode = 'none';
        });
    </script>
    {{-- date range picker --}}
    {{-- https://www.daterangepicker.com/ --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @yield('scripts')
</body>

</html>
