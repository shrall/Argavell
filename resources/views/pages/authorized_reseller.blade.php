@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
            <h1 class="text-argavell font-bauer font-weight-bold">Authorized Reseller</h1>
            <div class="pe-4">You can find some of our resellers in the nearest location.
            </div>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/authorized-resller.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile header --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 py-4">
            <img src="{{ asset('images/authorized-resller.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
            <h1 class="text-argavell font-bauer font-weight-bold text-4xl">Authorized Reseller</h1>
            <div class="px-2 text-start">You can find some of our resellers in the nearest location.</div>
        </div>
    </div>

    <div class="row w-100 m-0 p-0 py-5">
        <div class="col-md-2"></div>
        <div class="col-6 col-md-2">
            <ul class="list-unstyled text-start">
                <div class="mb-3">
                    <li>
                        <p class="text-argavell font-bauer font-weight-bold fs-4">Jakarta</p>
                    </li>
                    <li>
                        <strong>Travitopia Beauty</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@travitopiabeauty
                    </li>
                    <li>
                        <span class="fab fa-fw fa-whatsapp me-2"></span>+6287878078800
                    </li>
                </div>
                <div class="mb-3">
                    <li>
                        <strong>The Coco Shop</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@thecoco_shop
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-6 col-md-2">
            <ul class="list-unstyled text-start">
                <div class="mb-3">
                    <li>
                        <p class="text-argavell font-bauer font-weight-bold fs-4">Medan</p>
                    </li>
                    <li>
                        <strong>San Wijaya</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@sannwijaya88
                    </li>
                    <li>
                        <span class="fab fa-fw fa-whatsapp me-2"></span>+628196021144
                    </li>
                </div>
                <div class="mb-3">
                    <li>
                        <strong>The Coco Shop</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@thecoco_shop
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-6 col-md-2">
            <ul class="list-unstyled text-start">
                <div class="mb-3">
                    <li>
                        <p class="text-argavell font-bauer font-weight-bold fs-4">Batam</p>
                    </li>
                    <li>
                        <strong>Oil For Gewd</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@oilforgewd
                    </li>
                    <li>
                        <span class="fab fa-fw fa-whatsapp me-2"></span>+62811696916
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-6 col-md-2">
            <ul class="list-unstyled text-start">
                <div class="mb-3">
                    <li>
                        <p class="text-argavell font-bauer font-weight-bold fs-4">Makassar</p>
                    </li>
                    <li>
                        <strong>Chichicz</strong>
                    </li>
                    <li>
                        <span class="fab fa-fw fa-line me-2"></span>@chichicz
                    </li>
                    <li>
                        <span class="fab fa-fw fa-whatsapp me-2"></span>+628124127099
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0"
        style="background-image: url({{ asset('images/landing-argan-oil.jpg') }})">
        <h1 class="font-bauer text-white my-5">Which Argavell Product Made<br>You Fall In Love?</h1>
        <a href="#" class="text-decoration-none d-none d-sm-block">
            <div class="btn-argavell-light text-center w-25 py-2 cursor-pointer mx-auto mb-5">Browse Products</div>
        </a>
        <a href="#" class="text-decoration-none d-block d-sm-none">
            <div class="btn-argavell-light text-center w-50 py-2 cursor-pointer mx-auto mb-5">Browse Products</div>
        </a>
    </div>
@endsection
