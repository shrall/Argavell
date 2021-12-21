@extends('layouts.app')

@section('content')
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <h1 class="text-argavell font-bauer font-weight-bold">Return Policy</h1>
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
            <div class="pe-4">
                <ul class="list-unstyled">
                    @foreach ($policies as $policy)
                        <li class="mb-2">
                            <span class="fa fa-fw fa-tint text-argavell me-1"></span>
                            {{ $policy->policy }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer" data-bs-toggle="modal"
                    data-bs-target="#returnModal">Fill Return Form</div>
            </a>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0">
            <img src="{{ asset('images/argan-oil.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5 mb-4">
            <h1 class="text-argavell font-bauer font-weight-bold py-4">Return Policy</h1>
            <div class="px-2">
                <ul class="list-unstyled text-start">
                    @foreach ($policies as $policy)
                        <li class="mb-2">
                            <span class="fa fa-fw fa-tint text-argavell me-2"></span>
                            {{ $policy->policy }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer" data-bs-toggle="modal"
                    data-bs-target="#returnModal">Fill Return Form</div>
            </a>
        </div>
    </div>
    {{-- form modal --}}
    <div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
        <form action="{{ route('user.refund.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 justify-content-center position-relative">
                        <h5 class="modal-title text-center text-argavell font-bauer text-4xl" id="returnModalLabel"><img
                                src="{{ asset('images/argan-fruit.png') }}" width="75px">Return Form</h5>
                        <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                            style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"
                            aria-label="Close"></span>
                    </div>
                    <div class="modal-body font-proxima-nova px-5">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="col-form-label font-weight-bold">Your Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="order_number" class="col-form-label font-weight-bold">Invoice ID<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="order_number" name="order_number"
                                    placeholder="Enter your Invoice ID">
                            </div>
                            <div>
                                <label for="occasion" class="col-form-label font-weight-bold">Request<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occasion" value="0"
                                        id="occasion_radio_wrong" checked>
                                    <label class="form-check-label" for="occasion_radio_wrong">
                                        Refund Money
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occasion" value="1"
                                        id="occasion_radio_broken">
                                    <label class="form-check-label" for="occasion_radio_broken">
                                        Refund Item
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="col-form-label font-weight-bold">Phone Number<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Enter your phone number">
                            </div>
                            <div>
                                <label for="condition" class="col-form-label font-weight-bold">Condition<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="condition" id="">
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="col-form-label font-weight-bold">Notes</label>
                                <textarea class="form-control" id="notes" name="notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
