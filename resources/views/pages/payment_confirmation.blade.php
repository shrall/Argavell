@extends('layouts.app')

@section('scripts')
    @if (session('Additional'))
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#error-modal').modal('show');
            });
        </script>
    @endif
@endsection

@section('content')
    @if (session('Additional'))
        <div class="modal fade" id="error-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 d-flex flex-column justify-content-center position-relative mb-4">
                        <span class="fas fa-fw fa-exclamation-triangle text-argavell text-8xl mx-auto"></span>
                        <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Invoice ID tidak
                            terdaftar!</h5>
                        <h6 class="text-center text-secondary">Silahkan cek pesanan anda melalui email atau halaman my
                            account.</h6>
                        <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                            style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <h1 class="text-argavell font-bauer font-weight-bold">Payment Confirmation</h1>
            @if (session('Error'))
                <div class="alert alert-danger">
                    <ul class="mb-0 list-unstyled">
                        <li>{{ session('Error') }}</li>
                        @if (session('Additional'))
                            <li>{{ session('Additional') }}</li>
                        @endif
                    </ul>
                </div>
            @endif
            @if (session('Success'))
                <div class="alert alert-success">
                    <ul class="mb-0 list-unstyled">
                        <li>{{ session('Success') }}</li>
                    </ul>
                </div>
            @endif
            @guest
                <form action="{{ route('redirect.login') }}" method="post" id="redirect-form">
                    @csrf
                    <input type="hidden" name="prev_route" value="{{ Route::current()->getName() }}">
                    <input type="hidden" name="product_slug" value="{{ $product->slug ?? '' }}">
                    <div class="pe-4">
                        <div class="row font-weight-bold">
                            <label class="col-12">Invoice ID<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="order_number" type="text" class="form-control" name="order_number" required
                                    autocomplete="order_number" placeholder="Enter Invoice ID">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Sender Name<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="sender_name" type="text" class="form-control" name="sender_name" required
                                    autocomplete="sender_name" placeholder="Enter sender name">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Payment File<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="payment_file" type="file" class="form-control" name="payment_file" required
                                    autocomplete="payment_file">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer">Submit</button>
                </form>
                </form>
            @endguest
            @auth
                <form action="{{ route('user.proof.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="pe-4">
                        <div class="row font-weight-bold">
                            <label class="col-12">Invoice ID<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="order_number" type="text" class="form-control" name="order_number" required
                                    autocomplete="order_number" placeholder="Enter Invoice ID"
                                    value="{{ $latest_transaction_id }}">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Sender Name<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="sender_name" type="text" class="form-control" name="sender_name" required
                                    autocomplete="sender_name" placeholder="Enter sender name">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Payment File<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="payment_file" type="file" class="form-control" name="payment_file" required
                                    autocomplete="payment_file">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer">Submit</button>
                </form>
            @endauth
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
        </div>
        {{-- mobile --}}
        <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
            <div class="col-12 p-0">
                <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
            </div>
            <div class="col-md-5 mb-4">
                <h1 class="text-argavell font-bauer font-weight-bold py-4">Payment Confirmation</h1>
                <form action="{{ route('user.proof.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="px-2">
                        <div class="row font-weight-bold">
                            <label class="col-12">Order Number<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="order_number" type="text" class="form-control" name="order_number" required
                                    autocomplete="order_number" placeholder="Enter your phone number">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Sender Name<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="sender_name" type="text" class="form-control" name="sender_name" required
                                    autocomplete="sender_name" placeholder="Enter sender name">
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <label class="col-12">Payment File<span class="text-danger">*</span> </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="payment_file" type="file" class="form-control" name="payment_file" required
                                    autocomplete="payment_file">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer">Submit</button>
                </form>
            </div>
        </div>
    @endsection
