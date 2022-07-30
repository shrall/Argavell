@extends('layouts.app')

@section('content')
    {{-- carousel desktop --}}
    <div id="productShowcase" class="carousel slide carousel-fade d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active">
                <img src="{{ asset('images/carousel-argan-oil.jpg') }}" class="d-block w-100"
                    style="height: 95vh;object-fit: cover;">
                <div class="carousel-overlay position-absolute w-100"></div>
                <div class="carousel-caption d-none d-md-block" style="top: 55%; transform: translateY(-55%); z-index:11;">
                    <img style="margin-bottom: 1.5rem" src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-elmessiri text-8xl mb-3">Argan Oil</h1>
                    <p class="mb-3">Argan Oil is produced from the nut of the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="{{ route('page.ourproduct') }}" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/carousel-argan-shampoo.jpg') }}" class="d-block w-100"
                    style="height: 95vh;object-fit: cover;">
                <div class="carousel-overlay position-absolute w-100"></div>
                <div class="carousel-caption d-none d-md-block" style="top: 55%; transform: translateY(-55%); z-index:11;">
                    <img style="margin-bottom: 1.5rem" src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-elmessiri text-8xl mb-3">Argan Shampoo</h1>
                    <p class="mb-3">Argan Oil is produced from the nut of the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="{{ route('page.ourproduct') }}" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
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
                <img src="{{ asset('images/carousel-argan-oil.jpg') }}" class="d-block w-100 vh-100"
                    style="height: 95vh;object-fit: cover;">
                <div class="carousel-overlay position-absolute w-100"></div>
                <div class="carousel-caption" style="top: 55%; transform: translateY(-55%); z-index:11;">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-elmessiri text-6xl">Argan Oil</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="{{ route('page.ourproduct') }}" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
                            Product</span></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel-argan-shampoo.jpg') }}" class="d-block w-100 vh-100"
                    style="height: 95vh;object-fit: cover;">
                <div class="carousel-overlay position-absolute w-100"></div>
                <div class="carousel-caption" style="top: 55%; transform: translateY(-55%); z-index:11;">
                    <img src="{{ asset('images/logo-argavell-white.png') }}" width="100" alt="" srcset="">
                    <h1 class="font-elmessiri text-6xl">Argan Shampoo</h1>
                    <p>Argan Oil is produced from the nut og the Argan tree. It's natural and organic,<br>safe to use on any
                        problem area of the skin and hair, for more healthy hair.</p>
                    <a href="{{ route('page.ourproduct') }}" class="text-decoration-none"><span class="btn-argavell-light px-4 py-2">Browse
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
        <h1 class="text-argavell font-elmessiri font-weight-bold">Most Loved, Best Picks</h1>
        <label class="text-argavell mb-4">Giving you a solution & an opportunity to appear outstanding amongst their
            peers.</label>
        @include('pages.inc.product_showcase_desktop')
    </div>
    {{-- product showcase mobile --}}
    <div class="container pt-5 d-block d-sm-none">
        <h1 class="text-argavell font-elmessiri font-weight-bold">Most Loved, Best Picks</h1>
        <label class="text-argavell mb-4">Giving you a solution & an opportunity to appear outstanding amongst their
            peers.</label>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        @include('pages.inc.product_showcase_mobile')
    </div>
    <div class="row w-100 m-0" style="background-color: #FCF3EE" id="our-story">
        <div class="col-md-4">
            <div class="row h-100">
                <div class="col-md-4">
                </div>
                <div class="col-md-8 align-self-center">
                    <img src="{{ asset('images/our-story-left.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
        <div id="our-story" class="col-md-8 px-0">
            <div class="row">
                <div class="col-md-6 align-self-center px-5 my-3">
                    <h1 class="text-argavell font-elmessiri font-weight-bold text-4xl py-3 d-block d-sm-none">Our Story</h1>
                    <h1 class="text-argavell font-elmessiri font-weight-bold text-5xl py-3 d-none d-sm-block">Our Story</h1>
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
        <h3 class="text-argavell font-elmessiri">Our business is not just about selling skincare.
            It’s about giving people <strong>a solution & an opportunity</strong>
            to appear outstanding amongst their peers.</h3>
    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0 position-relative" style="height:45vh;">
        <img src="{{ asset('images/landing-argan-oil.jpg') }}" class="d-block w-100 position-absolute top-0 p-0"
            style="height: 100%;object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 11;">
            <h1 class="font-elmessiri text-white mt-5">Invest in Your Skin & Hair<br>with Argavell</h1>
            <a href="{{ route('page.ourproduct') }}" class="text-decoration-none d-none d-sm-block">
                <div class="btn-argavell-light text-center w-25 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Product</div>
            </a>
            <a href="{{ route('page.ourproduct') }}" class="text-decoration-none d-block d-sm-none">
                <div class="btn-argavell-light text-center w-50 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Product</div>
            </a>
        </div>
    </div>
    <div class="container py-5 text-center">
        <h1 class="text-argavell font-weight-bold font-elmessiri text-center mt-5">Find us at</h1>
        <img src="{{ asset('images/find-us.png') }}" class="w-50 mb-5 d-none d-sm-block mx-auto">
        <img src="{{ asset('images/find-us.png') }}" class="w-100 mb-5 d-block d-sm-none">
    </div>
@endsection
