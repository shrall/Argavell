@extends('layouts.app')
@section('content')
    <div class="row w-100 m-0 p-0 py-5 mt-5 align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex">
            <div class="d-flex mx-auto">
                <img
                    src="{{ asset('uploads/products/' . $product->img) }}"
                    style="width: 400px; object-fit: cover"/>
                <div class="ms-5" style="width: 500px;">
                    @if ($product->type == '0')
                        <h1 class="text-argavell font-elmessiri font-weight-bold">{{ $product->name }}</h1>
                    @else
                        <h1 class="text-kleanse font-gotham font-weight-bold">{{ $product->name }}</h1>
                    @endif
                    <div id="price-text-discount" class="d-none">
                        <p class="my-0 text-danger">SALE!</p>
                        <div class="font-proxima-nova mb-4 d-flex">
                            <div class="position-relative">
                                <span
                                    class="text-secondary cross"
                                    style="font-size: 21px;">
                                    IDR <span class="product-price">500000</span>
                                </span>
                            </div>
                            <h3 class="text-danger font-weight-bold ms-2">
                                IDR 
                                <span class="product-price-with-discount">
                                    {{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}
                                </span>
                            </span>
                        </div>
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
                    <form action="{{ route('user.cart.store') }}" method="post" id="form-product">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-8">
                                <p class="font-proxima-nova font-weight-bold">Size</p>
                                @if ($product->type == '0')
                                    <select class="form-select border-argavell font-proxima-nova font-weight-bold" id="size"
                                        @if ($product->bundle == '1') disabled @endif name="size">
                                        @if ($product->bundle)
                                            <option value="{{ $bundledSize }}">{{ $bundledSize }}</option>
                                            
                                        @else
                                            @foreach ($product->size as $key => $size)
                                                <option value="{{ $key }}">{{ $size }} ml</option>
                                            @endforeach
                                        @endif
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
                                            class="col-4 far fa-fw text-argavell cursor-pointer ps-0 quantity-button"
                                            id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                            onclick="subtractProductQuantity()">
                                            <img
                                                src="{{ asset('images/squared-minus-icon-brown.png') }}"
                                                width="28"
                                                height="28"/>  
                                        </span>
                                        <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-4"
                                            id="quantity-counter">1
                                        </div>
                                        <span
                                            class="col-4 far fa-fw text-argavell cursor-pointer ps-0 quantity-button"
                                            id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                            onclick="addProductQuantity()">
                                            <img
                                                src="{{ asset('images/squared-plus-icon-brown.png') }}"
                                                width="28"
                                                height="28"/>    
                                        </span>
                                    @else
                                        <span
                                            class="col-4 far fa-fw text-kleanse cursor-pointer ps-0 quantity-button"
                                            id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                            onclick="subtractProductQuantity()">
                                            <img
                                                src="{{ asset('images/squared-minus-icon-blue.png') }}"
                                                width="28"
                                                height="28"/>       
                                        </span>
                                        <div class="col-4 font-proxima-nova text-kleanse text-center ps-0 fs-4"
                                            id="quantity-counter">1
                                        </div>
                                        <span
                                            class="col-4 far fa-fw text-kleanse cursor-pointer ps-0 quantity-button"
                                            id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                            onclick="addProductQuantity()">
                                            <img
                                                src="{{ asset('images/squared-plus-icon-blue.png') }}"
                                                width="28"
                                                height="28"/>     
                                        </span>
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
                                    <button class="nav-link active font-elmessiri fs-5 p-0" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                        aria-selected="true">Description</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link font-elmessiri fs-4 p-0" id="how-to-use-tab" data-bs-toggle="tab"
                                        data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                        aria-selected="true">How To Use</button>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link font-elmessiri fs-5 p-0" id="ingredients-tab" data-bs-toggle="tab"
                                        data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                        aria-selected="false">Ingredients</button>
                                </li>
                            </ul>
                        @else
                            <ul class="nav nav-kleanse nav-fill" id="detailTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active font-gotham fs-5 p-0" id="description-tab"
                                        data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Description</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link font-gotham fs-4 p-0" id="how-to-use-tab" data-bs-toggle="tab"
                                        data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                        aria-selected="true">How To Use</button>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link font-gotham fs-5 p-0" id="ingredients-tab" data-bs-toggle="tab"
                                        data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                        aria-selected="false">Ingredients</button>
                                </li>
                            </ul>
                        @endif
                        <div class="card-body">
                            <div class="tab-content">
                                <div
                                    id="description" 
                                    class="d-flex flex-column gap-4 py-3 tab-pane overflow-auto active"
                                    role="tabpanel"
                                    aria-labelledby="description-tab"
                                    style="height: 250px;">
                                    @if($product->bundle)
                                        @foreach($bundledProducts as $bundledProduct)
                                            <div>
                                                <h5 class="font-weight-bold text-uppercase">
                                                    {{ $bundledProduct->product->name }}
                                                </h5>
                                                <p>
                                                    {{ $bundledProduct->product->description }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @else
                                        {{ $product->description }}
                                    @endif
                                </div>
                                <div
                                    id="ingredients" 
                                    class="d-flex d-none flex-column gap-4 py-3 tab-pane overflow-auto active"
                                    role="tabpanel"
                                    aria-labelledby="ingredients-tab"
                                    style="height: 250px;">
                                    @if($product->bundle)
                                        @foreach($bundledProducts as $bundledProduct)
                                            <div>
                                                <h5 class="font-weight-bold text-uppercase">
                                                    {{ $bundledProduct->product->name }}
                                                </h5>
                                                <p>
                                                    {{ $bundledProduct->product->ingredients }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @else
                                        {{ $product->ingredients }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div @if ($product->type == 0) class="argan-benefits" @else class="kleanse-benefits" @endif>
        @if (count($product->benefits) > 0)
            @foreach ($product->benefits as $benefit)
                @if ($loop->iteration % 2 == 0)
                    <div class="row w-100 m-0 align-items-center py-5 d-none d-sm-flex">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <div class="mb-5">
                                <img src="{{ asset('uploads/benefits' . '/' . $benefit->icon) }}" width="75px"
                                    class="mb-2">
                                <h3 class="text-argavell font-elmessiri font-weight-bold">{{ $benefit->title }}
                                </h3>
                                <div>{!! $benefit->content !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/benefits' . '/' . $benefit->banner) }}" class="w-100">
                                @if ($product->type == 0)
                                    <div
                                        class="position-absolute top-0 start-0 text-argavell font-elmessiri font-weight-bold text-8xl translate-middle">
                                        {{ $loop->iteration }}</div>
                                @else
                                    <div
                                        class="position-absolute top-0 start-0 text-kleanse font-proxima-nova font-weight-bold text-8xl translate-middle">
                                        {{ $loop->iteration }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                @else
                    <div class="row w-100 m-0 align-items-center py-5 d-none d-sm-flex">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/benefits' . '/' . $benefit->banner) }}" class="w-100">
                                @if ($product->type == 0)
                                    <div
                                        class="position-absolute top-0 start-0 text-argavell font-elmessiri font-weight-bold text-8xl translate-middle">
                                        {{ $loop->iteration }}</div>
                                @else
                                    <div
                                        class="position-absolute top-0 start-0 text-kleanse font-proxima-nova font-weight-bold text-8xl translate-middle">
                                        {{ $loop->iteration }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="mb-5">
                                <img src="{{ asset('uploads/benefits' . '/' . $benefit->icon) }}" width="75px"
                                    class="mb-2">
                                @if ($product->type == 0)
                                    <h3 class="text-argavell font-elmessiri font-weight-bold">{{ $benefit->title }}
                                    </h3>
                                @else
                                    <h3 class="text-kleanse font-proxima-nova font-weight-bold">{{ $benefit->title }}
                                    </h3>
                                @endif
                                <div>{!! $benefit->content !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                @endif
                {{-- benefits 1 mobile --}}
                <div class="row w-100 m-0 align-items-center my-5 d-block d-sm-none">
                    <div class="col-md-2"></div>
                    <div class="col-md-3 px-5">
                        <div class="position-relative">
                            <img src="{{ asset('uploads/benefits' . '/' . $benefit->banner) }}" class="w-100">
                            <div
                                class="position-absolute top-0 start-0 text-argavell font-elmessiri font-weight-bold text-8xl translate-middle">
                                {{ $loop->iteration }}</div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 px-5 pt-4">
                        <div class="mb-3">
                            <img src="{{ asset('uploads/benefits' . '/' . $benefit->icon) }}" width="75px"
                                class="mb-2">
                            @if ($product->type == 0)
                                <h2 class="text-argavell font-elmessiri font-weight-bold">{{ $benefit->title }}
                                </h2>
                            @else
                                <h2 class="text-kleanse font-proxima-nova font-weight-bold">{{ $benefit->title }}
                                </h2>
                            @endif
                            <div>{!! $benefit->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            @endforeach
        @endif
    </div>
    {{-- mobile
        <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
            <div class="col-12 p-0">
                <img src="{{ asset('images/argan-oil-detail-1.jpg') }}" class="w-100">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
                <h1 class="text-argavell font-elmessiri font-weight-bold">Argan Oil Benefits</h1>
                <div class="px-4"><strong>Argan oil is extremely rich in Vitamin E</strong> (more than 2x richer
                    than
                    Olive Oil, for about 620mg/l) with loads of antioxidants, linoleic acid
                    (omega-6) that are known for its calming & healing properties on skin.</div>
            </div>
        </div> --}}
    @if ($product->banner)
        <div class="row w-100 p-0 m-0 mb-5">
            <img src="{{ asset('uploads/products/') . '/' . $product->banner }}" class="w-100 p-0"
                style="height: 250px; object-fit: cover;">
        </div>
    @endif

    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        @if ($product->type == '0')
            <h1 class="text-argavell font-elmessiri font-weight-bold text-center">Let's Take Our Bundle of Love</h1>
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
            <h1 class="col-8 mx-auto text-argavell font-elmessiri font-weight-bold text-center text-4xl">Let's Take Our Bundle
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

    @if (count($product->guides) > 0)
        <div class="container text-center py-5">
            @if ($product->type == 0)
                <img src="{{ asset('images/leaf.png') }}" width="100px">
                <h1 class="text-argavell font-elmessiri font-weight-bold">How to Use</h1>
            @else
                <img src="{{ asset('images/logo-kleanse.png') }}" width="100px">
                <h1 class="text-kleanse font-proxima-nova font-weight-bold">How to Use</h1>
            @endif
            <span class="mb-5 text-center text-secondary">This guide may be able to help you.</span>
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-xs-12 col-md-10">
                    <div class="row align-items-center">
                        @foreach ($product->guides as $guide)
                            @if ($loop->iteration % 2 == 0)
                                <div class="col-md-2"></div>
                            @endif
                            <div class="col-xs-12 col-md-5 row align-items-center mb-4">
                                <div class="col-3">
                                    <img src="{{ asset('uploads/guides') . '/' . $guide->logo }}" width="75px">
                                </div>
                                <div class="col-9 text-start">
                                    @if ($product->type == 0)
                                        <h2 class="text-argavell font-elmessiri font-weight-bold">{{ $guide->title }}</h2>
                                    @else
                                        <h2 class="text-kleanse font-proxima-nova font-weight-bold">{{ $guide->title }}
                                        </h2>
                                    @endif
                                    <span class="text-secondary">{!! $guide->description !!}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    @endif
    @if ($product->link_video)
        {{-- video desktop --}}
        <div class="row w-100 m-0 d-none d-sm-block">
            <video class="w-100 p-0" height="800px" title="YouTube video player" frameborder="0" controls
                allowfullscreen>
                <source src="{{ asset('uploads/products') . '/' . $product->link_video }}" type="video/mp4">
            </video>
        </div>
        {{-- video mobile --}}
        <div class="row w-100 m-0 d-block d-sm-none">
            <video class="w-100 p-0" height="200px" title="YouTube video player" frameborder="0" controls
                allowfullscreen>
                <source src="{{ asset('uploads/products') . '/' . $product->link_video }}" type="video/mp4">
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
                    $('#cartQuantityLabel').html(
                        parseInt($('#cartQuantityLabel').html()) + 1
                    );
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

        $(document).ready(function() {
            setupTabButtons();
        });
        
        function setupTabButtons() {
            $('#description-tab').on('click', function() {
                $('#ingredients').addClass("d-none");
                $('#description').removeClass("d-none");
            });

            $('#ingredients-tab').on('click', function() {
                $('#description').addClass("d-none");
                $('#ingredients').removeClass("d-none");
            });
        }

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
