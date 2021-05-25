@extends('layouts.app')

@section('content')
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
            <h1 class="text-argavell font-bauer font-weight-bold">Argan Oil Benefits</h1>
            <div class="pe-4"><strong>Argan oil is extremely rich in Vitamin E</strong> (more than 2x richer than
                Olive Oil, for about 620mg/l) with loads of antioxidants, linoleic acid
                (omega-6) that are known for its calming & healing properties on skin.</div>
            <a href="#" class="text-decoration-none">
                <div class="btn-argavell text-center w-25 my-2 py-2 cursor-pointer">Shop Now</div>
            </a>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- benefits 1 desktop --}}
    <div class="row w-100 m-0 align-items-center my-5 d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="position-relative">
                <img src="{{ asset('images/argan-oil-detail-2.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    1</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="mb-3">
                <img src="{{ asset('images/oil-1.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Improves skin elasticity & prevents premature aging
                </h2>
                <div>Reduces depth & severity of wrinkles, restores elasticity, fades
                    age spots & increases regenerative rate of healthy skin cells.
                </div>
            </div>
            <div>
                <img src="{{ asset('images/oil-2.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Treat Oily Skin & Acne</h2>
                <div>Reduces sebum production level on individuals with oily skins;
                    Argan Oil’s high linoleic acid also reduces acne-associated
                    inflammation while healing damaged skin
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
                <img src="{{ asset('images/oil-3.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Natural Moisturiser</h2>
                <div>Rich in Vitamin E (tocopherol), essential fatty acids & natural
                    anti-oxidant, Argan Oil is fantastically hydrating, also softens &
                    protects skin from free-radicals.
                </div>
            </div>
            <div>
                <img src="{{ asset('images/oil-4.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Heal Skin Problems</h2>
                <div>Soothes all skin problems associated with “dry or sensitive
                    skins” (eczema, psoriasis, dermatitis, cracked heel, etc)
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="position-relative">
                <img src="{{ asset('images/argan-oil-detail-3.jpg') }}" class="w-100">
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
            <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
            <h1 class="text-argavell font-bauer font-weight-bold">Argan Oil Benefits</h1>
            <div class="px-4"><strong>Argan oil is extremely rich in Vitamin E</strong> (more than 2x richer than
                Olive Oil, for about 620mg/l) with loads of antioxidants, linoleic acid
                (omega-6) that are known for its calming & healing properties on skin.</div>
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
                <img src="{{ asset('images/argan-oil-detail-2.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    1</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 px-5 pt-4">
            <div class="mb-3">
                <img src="{{ asset('images/oil-1.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Improves skin elasticity & prevents premature aging
                </h2>
                <div>Reduces depth & severity of wrinkles, restores elasticity, fades
                    age spots & increases regenerative rate of healthy skin cells.
                </div>
            </div>
            <div>
                <img src="{{ asset('images/oil-2.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Treat Oily Skin & Acne</h2>
                <div>Reduces sebum production level on individuals with oily skins;
                    Argan Oil’s high linoleic acid also reduces acne-associated
                    inflammation while healing damaged skin
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
                <img src="{{ asset('images/argan-oil-detail-3.jpg') }}" class="w-100">
                <div
                    class="position-absolute top-0 start-0 text-argavell font-bauer font-weight-bold text-8xl translate-middle">
                    2</div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 px-5 pt-4">
            <div class="mb-3">
                <img src="{{ asset('images/oil-3.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Natural Moisturiser</h2>
                <div>Rich in Vitamin E (tocopherol), essential fatty acids & natural
                    anti-oxidant, Argan Oil is fantastically hydrating, also softens &
                    protects skin from free-radicals.
                </div>
            </div>
            <div>
                <img src="{{ asset('images/oil-4.png') }}" width="75px" class="mb-2">
                <h2 class="text-argavell font-bauer font-weight-bold">Heal Skin Problems</h2>
                <div>Soothes all skin problems associated with “dry or sensitive
                    skins” (eczema, psoriasis, dermatitis, cracked heel, etc)
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
    <div class="container pt-5 d-block d-sm-none text-center">
        <h1 class="text-argavell font-bauer font-weight-bold text-center">Get Yours Now!</h1>
        <span class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</span>
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
                    </div>
                    <div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
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
                    </div>
                    <div class="font-gotham mb-3">IDR 130.000</div>
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
                    </div>
                    <div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
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
                        <p class="w-100 font-weight-bold font-gotham text-break">ARGAN OIL + ARGAN SHAMPOO+ ARGAN KIDS
                            SHAMPOO</p>
                    </div>
                    <div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center py-5">
        <img src="{{ asset('images/leaf.png') }}" width="100px">
        <h1 class="text-argavell font-bauer font-weight-bold">How to Use</h1>
        <span class="mb-5 text-center text-secondary">This guide may be able to help you.</span>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-xs-12 col-md-4">
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/for-face.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">For Face</h2>
                        <span class="text-secondary text-center">Rub 2-3 drops (as needed) evenly every morning & night
                            after cleansing.</span>
                    </div>
                </div>
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/for-body.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">For Body</h2>
                        <span class="text-secondary text-center">Massage a few drops (as needed) on nail
                            culticuls, hand, feet or body before bed.</span>
                    </div>
                </div>
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/mix-with-skincare.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">Mix with Skincare</h2>
                        <span class="text-secondary text-center">Rub 2-3 drops (as needed) and mix
                            with scrub.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-xs-12 col-md-4">
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/for-face.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">For Eyelash</h2>
                        <span class="text-secondary text-center">Rub a drops (as needed) Use it to coat your
                            lashes fully and use it on your eyes overnight.</span>
                    </div>
                </div>
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/for-lips.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">For Lips</h2>
                        <span class="text-secondary text-center">Rub 1-2 dropsevenly every night before bed.</span>
                    </div>
                </div>
                <div class="row align-items-center py-4">
                    <div class="col-3">
                        <img src="{{ asset('images/for-hair.png') }}" width="75px">
                    </div>
                    <div class="col-9 text-start">
                        <h2 class="text-argavell font-bauer font-weight-bold">For Hair</h2>
                        <span class="text-secondary text-center">Massage 5-6 drops to scalp, hair & it’s tips;
                            cover hair & leave overnight for maximum
                            outcome.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    {{-- video desktop --}}
    <div class="row w-100 m-0 d-none d-sm-block">
        <iframe class="w-100 p-0" height="800px" src="https://www.youtube.com/embed/0WVDKZJkGlY"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    {{-- video mobile --}}
    <div class="row w-100 m-0 d-block d-sm-none">
        <iframe class="w-100 p-0" height="200px" src="https://www.youtube.com/embed/0WVDKZJkGlY"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
@endsection
