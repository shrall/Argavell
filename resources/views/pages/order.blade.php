@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center vh-100 payment-confirmation-background"
        style="background-image: url({{ asset('images/payment-confirmation.jpg') }})">
        <div class="col-sm-12 col-md-5">
            <div class="card mx-2">
                <div class="card-body font-proxima-nova mx-4 text-center">
                    <span class="far fa-fw fa-check-circle text-argavell text-8xl"></span>
                    <h1 class="font-bauer font-weight-bold fs-3 text-center text-argavell my-3">We Have Received Your Order!
                    </h1>
                    <p class="text-secondary">After complete the payment, please don’t forget to
                        confirm your payment.</p>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('page.paymentconfirmation') }}"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0"> Confirm
                                Now</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('user.transaction.index') }}"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0"> Confirm
                                Later</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
