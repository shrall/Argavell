@extends('layouts.app')
@section('content')
    <div class="row w-100 m-0 p-0 py-5 align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="w-100 product-detail"
                style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
            </div>
        </div>
        <div class="col-md-5">
            @if ($product->type == '0')
                <h1 class="text-argavell font-bauer font-weight-bold">{{ $product->name }}</h1>
            @else
                <h1 class="text-kleanse font-gotham font-weight-bold">{{ $product->name }}</h1>
            @endif
            <div id="price-text-discount" class="d-none">
                <p class="my-0 text-danger">SALE!</p>
                <h2 class="font-proxima-nova mb-4 d-flex">
                    <div class="position-relative">
                        <span class="text-secondary cross">IDR <span
                                class="product-price">{{ number_format($product->price[0], 0, ',', '.') }}</span></span>
                    </div>
                    <span class="text-danger font-weight-bold ms-2">IDR
                        <span
                            class="product-price-with-discount">{{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}</span></span>
                </h2>
            </div>
            @if ($product->type == '0')
                <div id="price-text" class="d-none">
                    <h2 class="text-argavell font-proxima-nova mb-4">IDR <span
                            class="product-price">{{ number_format($product->price[0], 0, ',', '.') }}</span></h2>
                </div>
            @else
                <div id="price-text" class="d-none">
                    <h2 class="text-kleanse font-proxima-nova mb-4">IDR <span
                            class="product-price">{{ number_format($product->price[0], 0, ',', '.') }}</span></h2>
                </div>
            @endif
            {{-- <p class="font-proxima-nova font-weight-bold">Description</p>
            <p>{{ $product->description }}</p> --}}
            {{-- @if ($product->type == '0')
                <p class="font-proxima-nova font-weight-bold">Argavell Facts</p>
            @else
                <p class="font-proxima-nova font-weight-bold">Kleanse Facts</p>
            @endif
            <ul class="list-unstyled">
                @foreach ($product->facts as $fact)
                    @if ($product->type == '0')
                        <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>{{ $fact }}</li>
                    @else
                        <li><span class="fa fa-fw fa-tint text-kleanse me-2"></span>{{ $fact }}</li>
                    @endif
                @endforeach
            </ul> --}}
            <form action="{{ route('user.cart.store') }}" method="post" id="form-product">
                @csrf
                <div class="row mb-3">
                    <div class="col-8">
                        <p class="font-proxima-nova font-weight-bold">Size</p>
                        @if ($product->type == '0')
                            <select class="form-select border-argavell font-proxima-nova font-weight-bold" id="size"
                                @if ($product->bundle == '1') disabled @endif name="size">
                                @foreach ($product->size as $key => $size)
                                    <option value="{{ $key }}">{{ $size }} ml</option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-select border-kleanse font-proxima-nova font-weight-bold" id="size"
                                @if ($product->bundle == '1') disabled @endif name="size">
                                @foreach ($product->size as $key => $size)
                                    <option value="{{ $key }}">{{ $size }} ml</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="col-4">
                        <p class="font-proxima-nova font-weight-bold">Quantity</p>
                        <div class="d-flex align-items-center fs-2">
                            @if ($product->type == '0')
                                <span
                                    class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                                    id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                    onclick="subtractProductQuantity()"></span>
                                <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-4"
                                    id="quantity-counter">1
                                </div>
                                <span
                                    class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                                    id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                    onclick="addProductQuantity()"></span>
                            @else
                                <span
                                    class="col-4 far fa-fw fa-minus-square text-kleanse cursor-pointer ps-0 quantity-button"
                                    id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                    onclick="subtractProductQuantity()"></span>
                                <div class="col-4 font-proxima-nova text-kleanse text-center ps-0 fs-4"
                                    id="quantity-counter">1
                                </div>
                                <span
                                    class="col-4 far fa-fw fa-plus-square text-kleanse cursor-pointer ps-0 quantity-button"
                                    id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                    onclick="addProductQuantity()"></span>
                            @endif
                            <input type="hidden" name="quantity" id="quantity" value=1>
                            <input type="hidden" name="id" id="id" value={{ $product->id }}>
                            <input type="hidden" name="price" id="price" value={{ $product->price[0] }}>
                            <input type="hidden" name="price_discount" id="price_discount"
                                value={{ $product->price_discount[0] }}>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    @auth
                        @if ($product->type == '0')
                            <button type="submit"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button"
                                @if (Auth::user()->role != '0') onclick="event.preventDefault(); alert('Kamu sedang login sebagai admin!');"
                            @else onclick="event.preventDefault(); addToCart({{ $product->id }},
                                '{{ config('app.url') }}');" data-bs-toggle="modal" data-bs-target="#cartModal" @endif>Add
                                to Cart
                            </button>
                            <button type="submit"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button"
                                @if (Auth::user()->role != '0') onclick="event.preventDefault();
                            alert('Kamu sedang login sebagai admin!');"
                        @else onclick="event.preventDefault(); addToCart({{ $product->id }},
                            '{{ config('app.url') }}');" data-bs-toggle="modal" data-bs-target="#cartModalMobile" @endif>Add
                                to Cart
                            </button>
                        @else
                            <button type="submit"
                                class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button"
                                @if (Auth::user()->role != '0') onclick="event.preventDefault(); alert('Kamu sedang login sebagai admin!');"
                        @else
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModal" @endif>Add
                                to Cart</button>
                            <button type="submit"
                                class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button"
                                @if (Auth::user()->role != '0') onclick="event.preventDefault(); alert('Kamu sedang login sebagai admin!');"
                        @else
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModalMobile" @endif>Add
                                to Cart</button>
                        @endif
                    @endauth
                    @guest
                        @if ($product->type == '0')
                            <a onclick="event.preventDefault(); showAuthPopup()"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button">
                                Add to Cart</a>
                            <a onclick="event.preventDefault(); showAuthPopup()"
                                class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button">
                                Add to Cart</a>
                        @else
                            <a onclick="event.preventDefault(); showAuthPopup()"
                                class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button">
                                Add to Cart</a>
                            <a onclick="event.preventDefault(); showAuthPopup()"
                                class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button">
                                Add to Cart</a>
                        @endif
                    @endguest
                </div>
            </form>
            @guest
                <form action="{{ route('redirect.login') }}" method="post" id="redirect-form">
                    @csrf
                    <input type="hidden" name="prev_route" value="{{ Route::current()->getName() }}">
                    <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                </form>
            @endguest
            <div class="card border-0">
                @if ($product->type == '0')
                    <ul class="nav nav-argavell nav-fill" id="detailTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-bauer fs-4 p-0" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-bauer fs-4 p-0" id="how-to-use-tab" data-bs-toggle="tab"
                                data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                aria-selected="true">How To Use</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-bauer fs-4 p-0" id="ingredients-tab" data-bs-toggle="tab"
                                data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                aria-selected="false">Ingredients</button>
                        </li>
                    </ul>
                @else
                    <ul class="nav nav-kleanse nav-fill" id="detailTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-gotham fs-4 p-0" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-gotham fs-4 p-0" id="how-to-use-tab" data-bs-toggle="tab"
                                data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                aria-selected="true">How To Use</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-gotham fs-4 p-0" id="ingredients-tab" data-bs-toggle="tab"
                                data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                aria-selected="false">Ingredients</button>
                        </li>
                    </ul>
                @endif
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {{ $product->description }}</div>
                        <div class="tab-pane" id="how-to-use" role="tabpanel" aria-labelledby="how-to-use-tab">
                            <p class="font-proxima-nova font-weight-bold">HOW TO USE ARGAN OIL</p>
                            <ul class="list-unstyled">
                                @foreach ($product->howtouse as $htu)
                                    @if ($product->type == '0')
                                        <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>{{ $htu }}
                                        </li>
                                    @else
                                        <li><span class="fa fa-fw fa-tint text-kleanse me-2"></span>{{ $htu }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                            {{ $product->ingredients }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    @if ($product->id == 1)
        {{-- benefits 1 desktop --}}
        <div class="argan-benefits">
            <div class="row w-100 m-0 align-items-center py-5 d-none d-sm-flex">
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
                    <div class="mb-5">
                        <img src="{{ asset('images/oil-1.png') }}" width="75px" class="mb-2">
                        <h3 class="text-argavell font-bauer font-weight-bold">Improves skin elasticity & prevents premature
                            aging
                        </h3>
                        <div>Reduces depth & severity of wrinkles, restores elasticity, fades
                            age spots & increases regenerative rate of healthy skin cells.
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images/oil-2.png') }}" width="75px" class="mb-2">
                        <h3 class="text-argavell font-bauer font-weight-bold">Treat Oily Skin & Acne</h3>
                        <div>Reduces sebum production level on individuals with oily skins;
                            Argan Oil’s high linoleic acid also reduces acne-associated
                            inflammation while healing damaged skin
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            {{-- benefits 2 desktop --}}
            <div class="row w-100 m-0 align-items-center py-5 d-none d-sm-flex">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <div class="mb-4">
                        <img src="{{ asset('images/oil-3.png') }}" width="75px" class="mb-2">
                        <h3 class="text-argavell font-bauer font-weight-bold">Natural Moisturiser</h3>
                        <div>Rich in Vitamin E (tocopherol), essential fatty acids & natural
                            anti-oxidant, Argan Oil is fantastically hydrating, also softens &
                            protects skin from free-radicals.
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images/oil-4.png') }}" width="75px" class="mb-2">
                        <h3 class="text-argavell font-bauer font-weight-bold">Heal Skin Problems</h3>
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
        </div>
        {{-- mobile --}}
        <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
            <div class="col-12 p-0">
                <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
                <h1 class="text-argavell font-bauer font-weight-bold">Argan Oil Benefits</h1>
                <div class="px-4"><strong>Argan oil is extremely rich in Vitamin E</strong> (more than 2x richer
                    than
                    Olive Oil, for about 620mg/l) with loads of antioxidants, linoleic acid
                    (omega-6) that are known for its calming & healing properties on skin.</div>
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
                    <h2 class="text-argavell font-bauer font-weight-bold">Improves skin elasticity & prevents premature
                        aging
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
    @elseif($product->id == 2)
        {{-- benefits 1 desktop --}}
        <div class="argan-benefits">
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
                        <h3 class="text-argavell font-bauer font-weight-bold">Great Care for Hair
                        </h3>
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
                        <h3 class="text-argavell font-bauer font-weight-bold">Reduces Hairfall</h3>
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
                <a href="{{ route('product.show', 'argan-shampoo') }}" class="text-decoration-none">
                    <div class="btn-argavell text-center w-25 my-2 py-2 cursor-pointer mx-auto font-weight-bold">Shop Now
                    </div>
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
    @endif

    <div class="row w-100 p-0 m-0 mb-5">
        @if ($product->type == '0')
            <img src="{{ asset('images/argan-product-details.jpg') }}" class="w-100 p-0">
        @else
            <img src="{{ asset('images/kleanse-detail-2.jpg') }}" class="w-100 p-0">
        @endif
    </div>

    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        @if ($product->type == '0')
            <h1 class="text-argavell font-bauer font-weight-bold text-center">Let's Take Our Bundle of Love</h1>
        @else
            <h1 class="text-kleanse font-gotham font-weight-bold text-center">Let's Take Our Bundle of Love</h1>
        @endif
        <span class="mb-5 text-center text-secondary">Buy the bundle with special price</span>
        <div class="row gap-3 justify-content-md-center">
            @if ($bundles->count() > 0)
                @foreach ($bundles as $bundle)
                    @if ($product->type == $bundle->type)
                        <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                            <a href="{{ route('product.show', $bundle->slug) }}">
                                <div class="landing-product position-relative w-100 mb-3"
                                    style="background-image: url({{ asset('uploads/products/' . $bundle->img) }})">
                                    @if ($bundle->price_discount[0] != 0)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div style="height:10%" class="mb-3">
                                <div class="font-weight-bold font-gotham mb-1">{{ $bundle->name }}</div>
                                @if ($bundle->price_discount[0] != 0)
                                    <div class="d-flex justify-content-center">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR
                                                {{ number_format($bundle->price[0], 0, ',', '.') }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ number_format($bundle->price[0] - $bundle->price_discount[0], 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham">IDR {{ number_format($bundle->price[0], 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>
                            @if ($bundle->type == '0')
                                <a href="{{ route('product.show', $bundle->slug) }}" class="text-decoration-none">
                                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            @else
                                <a href="{{ route('product.show', $bundle->slug) }}" class="text-decoration-none">
                                    <div class="btn-kleanse text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            @endif
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-10 p-0">
                    <h5 class="text-secondary mb-0 mt-5">No Bundles Available</h5>
                </div>
            @endif
        </div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container d-block d-sm-none text-center">
        @if ($product->type == '0')
            <h1 class="col-8 mx-auto text-argavell font-bauer font-weight-bold text-center text-4xl">Let's Take Our Bundle
                of
                Love</h1>
        @else
            <h1 class="col-8 mx-auto text-kleanse font-gotham font-weight-bold text-center text-4xl">Let's Take Our Bundle
                of
                Love</h1>
        @endif
        <span class="mb-5 text-center text-secondary">Buy the bundle with special price</span>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        <div class="row px-3 gap-3 flex-nowrap text-start">
            @if ($bundles->count() > 0)
                @foreach ($bundles as $bundle)
                    <div class="col-10 p-0">
                        <a href="{{ route('product.show', $bundle->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('uploads/products/' . $bundle->img) }})">
                                @if ($bundle->price_discount[0] != 0)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div class="mb-3">
                            <div class="w-100" style="height: 50px">
                                <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $bundle->name }}</p>
                            </div>
                            @if ($bundle->price_discount[0] != 0)
                                <div class="d-flex mb-3">
                                    <div class="position-relative">
                                        <span class="text-secondary cross">IDR
                                            {{ number_format($bundle->price[0], 0, ',', '.') }}</span>
                                    </div>
                                    <span class="text-danger font-weight-bold ms-2">IDR
                                        {{ number_format($bundle->price[0] - $bundle->price_discount[0], 0, ',', '.') }}</span>
                                </div>
                            @else
                                <div class="font-gotham mb-3">IDR {{ number_format($bundle->price[0], 0, ',', '.') }}
                                </div>
                            @endif
                            @if ($product->type == '0')
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            @else
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="btn-kleanse text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 p-0">
                    <h5 class="text-secondary text-center mb-0 mt-5">No Bundles Available</h5>
                </div>
            @endif
        </div>
    </div>

    @if ($product->id == 1)
        <div class="container text-center py-5">
            <img src="{{ asset('images/leaf.png') }}" width="100px">
            <h1 class="text-argavell font-bauer font-weight-bold">How to Use</h1>
            <span class="mb-5 text-center text-secondary">This guide may be able to help you.</span>
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-xs-12 col-md-10">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
                            <div class="col-3">
                                <img src="{{ asset('images/for-face.png') }}" width="75px">
                            </div>
                            <div class="col-9 text-start">
                                <h2 class="text-argavell font-bauer font-weight-bold">For Face</h2>
                                <span class="text-secondary text-center">Rub 2-3 drops (as needed) evenly every morning &
                                    night
                                    after cleansing.</span>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
                            <div class="col-3">
                                <img src="{{ asset('images/for-eyelash.png') }}" width="75px">
                            </div>
                            <div class="col-9 text-start">
                                <h2 class="text-argavell font-bauer font-weight-bold">For Eyelash</h2>
                                <span class="text-secondary text-center">Rub a drops (as needed) Use it to coat your
                                    lashes fully and use it on your eyes overnight.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
                            <div class="col-3">
                                <img src="{{ asset('images/for-body.png') }}" width="75px">
                            </div>
                            <div class="col-9 text-start">
                                <h2 class="text-argavell font-bauer font-weight-bold">For Body</h2>
                                <span class="text-secondary text-center">Massage a few drops (as needed) on nail
                                    culticuls, hand, feet or body before bed.</span>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
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
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
                            <div class="col-3">
                                <img src="{{ asset('images/for-lips.png') }}" width="75px">
                            </div>
                            <div class="col-9 text-start">
                                <h2 class="text-argavell font-bauer font-weight-bold">For Lips</h2>
                                <span class="text-secondary text-center">Rub 1-2 dropsevenly every night before bed.</span>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-xs-12 col-md-5 row align-items-center mb-4">
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
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        {{-- video desktop --}}
        <div class="row w-100 m-0 d-none d-sm-block">
            <video class="w-100 p-0" height="800px" title="YouTube video player" frameborder="0" controls
                allowfullscreen>
                <source src="{{ asset('videos/argavell.mp4') }}" type="video/mp4">
            </video>
        </div>
        {{-- video mobile --}}
        <div class="row w-100 m-0 d-block d-sm-none">
            <video class="w-100 p-0" height="200px" title="YouTube video player" frameborder="0" controls
                allowfullscreen>
                <source src="{{ asset('videos/argavell.mp4') }}" type="video/mp4">
            </video>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        var product = @json($product);
    </script>
    <script>
        function refreshPriceText() {
            if (product['price_discount'][$('#size').val()] == 0) {
                $('#price-text-discount').removeClass('d-block').addClass('d-none');
                $('#price-text').removeClass('d-none').addClass('d-block');
            } else {
                $('#price-text-discount').removeClass('d-none').addClass('d-block');
                $('#price-text').removeClass('d-block').addClass('d-none');
            }
            if (parseInt($('#quantity-counter').html()) > product['stock'][$('#size').val()]) {
                $('.add-to-cart-button').prop("disabled", true);
                $('.add-to-cart-button').html('SOLD OUT');
            } else {
                $('.add-to-cart-button').prop("disabled", false);
                $('.add-to-cart-button').html('Add to Cart');
            }
        }
        refreshPriceText();
    </script>

    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#detailTab a'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>

    <script>
        function addProductQuantity() {
            $('.add-to-cart-button').html('Add to Cart');
            $('#quantity-counter').html(parseInt($('#quantity-counter').html()) + 1);
            $('#quantity').get(0).value++
            if (parseInt($('#quantity-counter').html()) > 0) {
                $('.add-to-cart-button').prop("disabled", false);
            }
            if (parseInt($('#quantity-counter').html()) > product['stock'][$('#size').val()]) {
                $('.add-to-cart-button').prop("disabled", true);
                $('.add-to-cart-button').html('SOLD OUT');
            }
        }

        function subtractProductQuantity() {
            if (parseInt($('#quantity-counter').html()) > 0) {
                $('#quantity-counter').html(parseInt($('#quantity-counter').html()) - 1);
                $('#quantity').get(0).value--
            }
            if (parseInt($('#quantity-counter').html()) == 0) {
                $('.add-to-cart-button').prop("disabled", true);
            } else if (parseInt($('#quantity-counter').html()) <= product['stock'][$('#size').val()]) {
                $('.add-to-cart-button').prop("disabled", false);
                $('.add-to-cart-button').html('Add to Cart');
            } else {
                $('.add-to-cart-button').html('SOLD OUT');
            }
        }

        function changeSoldOut() {
            $('.add-to-cart-button').prop("disabled", true);
        }
    </script>
    <script>
        function addToCart(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            var hostname = "{{ request()->getHost() }}"
            if (hostname.includes('www')) {
                url = "https://" + hostname
            }
            $.post(url + "/cart", {
                    id: id,
                    size: $('#size').val(),
                    quantity: parseInt($('#quantity').val()),
                })
                .done(function(data) {
                    if (data != 'false') {
                        $('#cart-body').append(data);
                        $('#cart-mobile-body').append(data);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) + parseInt($('#quantity')
                            .val()));
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) + parseInt($(
                            '#quantity').val()));
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) + parseInt($('#quantity')
                            .val()));
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) + parseInt($(
                            '#quantity').val()));

                        $('#cart-subtotal').html((parseInt($('#cart-subtotal').html().replace('.', '')) + (parseInt($(
                                '#price').val()) *
                            parseInt($('#quantity').val()))).formatMoney(0, '.', ''));
                        $('#cart-discount').html((parseInt($('#cart-discount').html().replace('.', '')) + (parseInt(
                                product['price_discount'][$('#size').val()]) * parseInt($('#quantity')
                                .val())))
                            .formatMoney(0, '.', ''));
                        $('#cart-total').html((parseInt($('#cart-total').html().replace('.', '')) + ((parseInt($(
                                '#price').val()) *
                            parseInt(
                                $('#quantity').val())) - (parseInt(
                                product['price_discount'][$('#size').val()]) *
                            parseInt(
                                $('#quantity').val())))).formatMoney(0, '.', ''));
                        $('#cart-mobile-subtotal').html((parseInt($('#cart-mobile-subtotal').html().replace('.', '')) +
                            (
                                parseInt($(
                                        '#price')
                                    .val()) * parseInt($('#quantity').val()))).formatMoney(0, '.', ''));
                        $('#cart-mobile-discount').html((parseInt($('#cart-mobile-discount').html().replace('.', '')) +
                                (
                                    parseInt(
                                        product['price_discount'][$('#size').val()]) * parseInt($('#quantity')
                                        .val())))
                            .formatMoney(0, '.', ''));
                        $('#cart-mobile-total').html((parseInt($('#cart-mobile-total').html().replace('.', '')) + ((
                            parseInt($('#price')
                                .val()) * parseInt($('#quantity').val())) - (parseInt(
                            product['price_discount'][$('#size').val()]) * parseInt($('#quantity')
                            .val())))).formatMoney(0, '.', ''));
                        if ($('#cart-total').html() == 0) {
                            $(".button-checkout").prop("disabled", true);
                        } else {
                            $(".button-checkout").prop("disabled", false);
                        }
                    }
                })
                .fail(function(error) {
                    console.log(error);
                })
                .always(function() {
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }
    </script>
    <script>
        $('#size').on('change', function(e) {
            $('#price').val(product['price'][$('#size').val()]);
            $('#price_discount').val(product['price_discount'][$('#size').val()]);
            $('.product-price').html((product['price'][$('#size').val()]).formatMoney(0, '.', ''));
            $('.product-price-with-discount').html((product['price'][$('#size').val()] - product['price_discount'][
                $('#size').val()
            ]).formatMoney(0, '.', ''));
            refreshPriceText();
        });
    </script>

    <script>
        $('#overlay').click(function() {
            $('#auth-popup').addClass("d-none");
            $('body').removeClass("overflow-hidden");
        })

        function showAuthPopup() {
            $('#auth-popup').removeClass("d-none");
            $('body').addClass("overflow-hidden");
        }

        function moveToRegister() {
            $('#login-form').addClass('d-none')
            $('#register-form').removeClass('d-none')
        }

        function moveToLogin() {
            $('#register-form').addClass('d-none')
            $('#login-form').removeClass('d-none')
        }

        function togglePassword() {
            if ($(".passwordInput").attr('type') == 'password') {
                $(".passwordInput").attr('type', 'text');
                $(".eyeToggle").removeClass('fa-eye');
                $(".eyeToggle").addClass('fa-eye-slash');
            } else {
                $(".passwordInput").attr('type', 'password');
                $(".eyeToggle").removeClass('fa-eye-slash');
                $(".eyeToggle").addClass('fa-eye');
            }
        }
    </script>
@endsection
