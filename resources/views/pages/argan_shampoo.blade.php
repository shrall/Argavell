@extends('layouts.app')

@section('content')
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
            <h1 class="text-argavell font-bauer font-weight-bold">Argan Shampoo Benefits</h1>
            <div class="pe-4"><strong>Our Argan Oil Shampoo contains our own 100% Organic Argan Oil.</strong> It also
                contains aloe vera & olive oil that will nourish your hair with
                vitamin E to moisturise & strengthen your hair all day long. Daily use of
                the shampoo will restore the hair’s natural protective layer that will
                restores shine & volume on your hair.
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-25 my-2 py-2 cursor-pointer">Shop Now</div>
            </a>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/argan-shampoo-detail-1.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- benefits 1 desktop --}}
    <div class="row w-100 m-0 align-items-center my-5 d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="position-relative">
                <img src="{{ asset('images/argan-shampoo-detail-2.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    1</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="mb-3">
                <img src="{{ asset('images/hair-1.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Great Care for Hair
                </h2>
                <div>
                    <ul>
                        <li>Shinier & Glowing Hair</li>
                        <li>Leave-in conditioner & tames frizzes, flyaways, & repairs split ends</li>
                        <li>Moisturizes Dry & Brittle Hair</li>
                        <li>Eliminate Dandruffs & Dry Scalp</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- benefits 2 desktop --}}
    <div class="row w-100 m-0 align-items-center my-5 d-none d-sm-flex">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <div class="mb-3">
                <img src="{{ asset('images/hair-2.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Reduces Hairfall</h2>
                <div>
                    <ul>
                        <li>Argan Oil <strong>ensures</strong> that one does not lose more follicles than
                            one is able to grow.</li>
                        <li>Studies show that Argan Oil <strong>helps to stimulate the scalp</strong> due
                            to its rich nutrient content to produce more hair.
                        </li>
                        <li><strong>Research from South Korea found that 44%</strong> of participants
                            experienced “clear hair regrowth” with Argan Oil treatment.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="position-relative">
                <img src="{{ asset('images/argan-shampoo-detail-3.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    2</div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{-- mobile --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0">
            <img src="{{ asset('images/argan-shampoo-detail-1.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
            <h1 class="text-argavell font-bauer font-weight-bold">Argan Shampoo Benefits</h1>
            <div><strong>Our Argan Oil Shampoo contains our own 100% Organic Argan Oil.</strong> It also
                contains aloe vera & olive oil that will nourish your hair with
                vitamin E to moisturise & strengthen your hair all day long. Daily use of
                the shampoo will restore the hair’s natural protective layer that will
                restores shine & volume on your hair.
            </div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-25 my-2 py-2 cursor-pointer mx-auto">Shop Now</div>
            </a>
        </div>
    </div>
    {{-- benefits 1 mobile --}}
    <div class="row w-100 m-0 align-items-center my-5 d-block d-sm-none">
        <div class="col-md-2"></div>
        <div class="col-md-3 px-5">
            <div class="position-relative">
                <img src="{{ asset('images/argan-shampoo-detail-2.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    1</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 px-5 pt-4">
            <div class="mb-3">
                <img src="{{ asset('images/hair-1.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Great Care for Hair
                </h2>
                <div>
                    <ul>
                        <li>Shinier & Glowing Hair</li>
                        <li>Leave-in conditioner & tames frizzes, flyaways, & repairs split ends</li>
                        <li>Moisturizes Dry & Brittle Hair</li>
                        <li>Eliminate Dandruffs & Dry Scalp</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- benefits 2 mobile --}}
    <div class="row w-100 m-0 align-items-center my-5 d-block d-sm-none">
        <div class="col-md-2"></div>
        <div class="col-md-3 px-5">
            <div class="position-relative">
                <img src="{{ asset('images/argan-shampoo-detail-3.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    2</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 px-5 pt-4">
            <div class="mb-3">
                <img src="{{ asset('images/hair-2.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Reduces Hairfall</h2>
                <div>
                    <ul>
                        <li>Argan Oil <strong>ensures</strong> that one does not lose more follicles than
                            one is able to grow.</li>
                        <li>Studies show that Argan Oil <strong>helps to stimulate the scalp</strong> due
                            to its rich nutrient content to produce more hair.
                        </li>
                        <li><strong>Research from South Korea found that 44%</strong> of participants
                            experienced “clear hair regrowth” with Argan Oil treatment.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        <h1 class="text-argavell font-bauer font-weight-bold text-center">Get Yours Now!</h1>
        <span class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</span>
        <div class="row gap-3 justify-content-md-center">
            @foreach ($products as $product)
                @if ($product->type == '0')
                    <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('products/' . $product->img) }})">
                                @if ($product->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                                @endif
                            </div>
                        </a>
                        <div style="height:15%" class="mb-3">
                            <div class="font-weight-bold font-gotham">{{ $product->name }}</div>
                            @if ($product->price_discount != null)
                                <div class="font-gotham"><del class="text-secondary">IDR {{ $product->price }}</del><span
                                        class="text-danger font-weight-bold ms-2">IDR
                                        {{ $product->price - $product->price_discount }}</span></div>
                            @else
                                <div class="font-gotham">IDR {{ $product->price }}</div>
                            @endif
                        </div>
                        <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container pt-5 d-block d-sm-none text-center">
        <h1 class="text-argavell font-bauer font-weight-bold text-center">Get Yours Now!</h1>
        <span class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</span>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        <div class="row px-3 gap-3 flex-nowrap text-start">
            @foreach ($products as $product)
                @if ($product->type == '0')
                    <div class="col-10 p-0">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('products/' . $product->img) }})">
                                @if ($product->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                                @endif
                            </div>
                        </a>
                        <div class="mb-3">
                            <div class="w-100" style="height: 50px">
                                <p class="w-100 font-weight-bold font-gotham text-break">{{ $product->name }}</p>
                            </div>
                            @if ($product->price_discount != null)
                                <div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                                        class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                            @else
                                <div class="font-gotham mb-3">IDR {{ $product->price }}</div>
                            @endif
                            <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
