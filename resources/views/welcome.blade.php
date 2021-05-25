@extends('layouts.app')

@section('content')
    {{-- carousel desktop --}}
    <div id="productShowcase" class="carousel slide carousel-fade d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel-argan-oil.jpg') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="top: 55%; transform: translateY(-55%);">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-bauer text-8xl">Argan Oil</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="#" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel-argan-shampoo.jpg') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="top: 55%; transform: translateY(-55%);">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-bauer text-8xl">Argan Shampoo</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="#" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productShowcase" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productShowcase" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- carousel mobile --}}
    <div id="productShowcaseMobile" class="carousel slide carousel-fade d-block d-sm-none" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel-mobile-argan-oil.jpg') }}" class="d-block w-100 vh-100">
                <div class="carousel-caption" style="top: 55%; transform: translateY(-55%);">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-bauer text-6xl">Argan Oil</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="#" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel-mobile-argan-shampoo.jpg') }}" class="d-block w-100 vh-100">
                <div class="carousel-caption" style="top: 55%; transform: translateY(-55%);">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-bauer text-6xl">Argan Shampoo</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="#" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productShowcaseMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productShowcaseMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block">
        <h1 class="text-argavell font-bauer font-weight-bold">Most Loved, Best Picks</h1>
        <label class="text-argavell mb-4">Giving you a solution & an opportunity to appear outstanding amongst their
            peers.</label>
        <div class="row gap-3 justify-content-md-center">
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil.jpg') }})">
                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN OIL</div>
                    <div class="font-gotham"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-shampoo.jpg') }})">
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN SHAMPOO</div>
                    <div class="font-gotham">IDR 130.000</div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo.jpg') }})">
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN OIL + ARGAN SHAMPOO</div>
                    <div class="font-gotham"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo-argan-kids-shampoo.jpg') }})">
                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN OIL + ARGAN SHAMPOO + ARGAN KIDS SHAMPOO</div>
                    <div class="font-gotham"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
        </div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container pt-5 d-block d-sm-none">
        <h1 class="text-argavell font-bauer font-weight-bold">Most Loved, Best Picks</h1>
        <label class="text-argavell mb-4">Giving you a solution & an opportunity to appear outstanding amongst their
            peers.</label>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        <div class="row px-3 gap-3 flex-nowrap text-start">
            <div class="col-10 p-0">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil.jpg') }})">
                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                </div>
                <div class="mb-3">
                    <div class="w-100" style="height: 50px">
                    <p class="w-100 font-weight-bold font-gotham text-break">ARGAN OIL</p>
                    </div><div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                </div>
            </div>
            <div class="col-10 p-0">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-shampoo.jpg') }})">
                </div>
                <div class="mb-3">
                    <div class="w-100" style="height: 50px">
                    <p class="w-100 font-weight-bold font-gotham text-break">ARGAN SHAMPOO</p>
                    </div><div class="font-gotham mb-3">IDR 130.000</div>
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                </div>
            </div>
            <div class="col-10 p-0">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo.jpg') }})">
                </div>
                <div class="mb-3">
                    <div class="w-100" style="height: 50px">
                    <p class="w-100 font-weight-bold font-gotham text-break">ARGAN OIL + ARGAN SHAMPOO</p>
                    </div><div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                </div>
            </div>
            <div class="col-10 p-0">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo-argan-kids-shampoo.jpg') }})">
                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                </div>
                <div class="mb-3">
                    <div class="w-100" style="height: 50px">
                    <p class="w-100 font-weight-bold font-gotham text-break">ARGAN OIL + ARGAN SHAMPOO+ ARGAN KIDS SHAMPOO</p>
                    </div><div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 m-0" style="background-color: #FCF3EE">
        <div class="col-md-4">
            <div class="row h-100">
                <div class="col-md-4">
                </div>
                <div class="col-md-8 align-self-center">
                    <img src="{{ asset('images/our-story-left.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
        <div class="col-md-8 px-0">
            <div class="row">
                <div class="col-md-6 align-self-center px-5">
                    <h1 class="text-argavell font-bauer font-weight-bold text-5xl py-3">Our Story</h1>
                    <p><strong>Argavéll Indonesia</strong> was founded in August 2017 as
                        an answer for those with dry & sensitive skin
                        conditions seeking a safe & gentle skincare while
                        still greatly enhancing their beauty appearances.
                    </p>
                    <p>Our brand focuses on <strong>Argan Oil-based product</strong>,
                        since Argan Oil is renowned to be very gentle on
                        sensitive & allergic skins, nourishing, very hydrating
                        due to its high vitamin E & fatty acids content.
                    </p>
                </div>
                <div class="col-md-6 p-0">
                    <img src="{{ asset('images/our-story-right.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 my-5 text-center">
        <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
        <h1 class="text-argavell font-bauer">Our business is not just about selling skincare.<br>
            It’s about giving people <strong>a solution & an opportunity</strong><br>
            to appear outstanding amongst their peers.</h1>
    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0"
        style="background-image: url({{ asset('images/landing-argan-oil.jpg') }})">
        <h1 class="font-bauer text-white my-5">Which Argavell Product Made<br>You Fall In Love?</h1>
        <a href="#" class="text-decoration-none">
            <div class="btn-argavell-light text-center w-25 py-2 cursor-pointer mx-auto mb-5">Browse Products</div>
        </a>
    </div>
    <div class="container py-5 text-center">
        <h1 class="text-argavell font-weight-bold font-bauer text-center mt-5">Find us at</h1>
        <img src="{{ asset('images/find-us.png') }}" class="w-50 mb-5 d-none d-sm-block mx-auto">
        <img src="{{ asset('images/find-us.png') }}" class="w-100 mb-5 d-block d-sm-none">
    </div>
@endsection
