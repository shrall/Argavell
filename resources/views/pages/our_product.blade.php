@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-12 p-0">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100" style="height: 60vh; object-fit: cover;">
        </div>
    </div>
    {{-- mobile header --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 py-4">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100" style="height: 30vh; object-fit: cover;">
        </div>
    </div>
    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        <div style="margin-bottom: 5rem">
            <h1 class="text-argavell font-bauer font-weight-bold text-center">Our Products</h1>
            <h5 class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</h5>
            <div class="row gap-3 justify-content-md-center">
                @foreach ($products as $product)
                    @if ($product->bundle == '1')
                        @if ($product->bundle_start <= now() && $product->bundle_end >= now())
                            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <div class="landing-product position-relative w-100 mb-3"
                                        style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                        @if ($product->price_discount[0] != 0)
                                            <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                            </div>
                                        @endif
                                    </div>
                                </a>
                                <div style="height:10%" class="mb-3">
                                    <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                                    @if ($product->price_discount[0] != 0)
                                        <div class="d-flex justify-content-center">
                                            <div class="position-relative">
                                                <span class="text-secondary cross">IDR
                                                    {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                            </div>
                                            <span class="text-danger font-weight-bold ms-2">IDR
                                                {{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="font-gotham">IDR {{ number_format($product->price[0], 0, ',', '.') }}
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="landing-product position-relative w-100 mb-3"
                                    style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                    @if ($product->price_discount[0] != 0)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                                    @endif
                                </div>
                            </a>
                            <div style="height:10%" class="mb-3">
                                <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                                @if ($product->price_discount[0] != 0)
                                    <div class="d-flex @if (Route::current()->getName() != 'home') justify-content-center @endif">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR
                                                {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham">IDR {{ number_format($product->price[0], 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        
        </div>
        <div>
            <div style="margin-bottom: 3rem">
                <h1 class="text-argavell font-bauer font-weight-bold text-center">
                    Bundle Products
                </h1>
                <h5 class="mb-5 text-center text-secondary">
                    Buy the bundle with special price.
                </h5>
            </div>
            <div class="d-flex flex-column gap-5">
                @for($i = 0; $i < count($productBundles)/4; $i++)
                    <div class="d-flex gap-3 mx-auto">
                        @for($j = $i * 4; $j < ($i + 1) * 4; $j++)
                            @if(count($productBundles) - 1 < $j) @break @endif
                            @include(
                                'components.product_item',
                                ['product' => $productBundles[$j]]
                            )
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container pt-3 d-block d-sm-none text-center">
        <h1 class="text-argavell font-bauer font-weight-bold text-center">Our Products</h1>
        <h5 class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</h5>
    </div>
    <div class="container px-4 pb-5 mb-5 d-sm-none">
        <div class="row gap-3 text-start justify-content-center">
            @foreach ($products as $product)
                @if ($product->bundle == '1')
                    @if ($product->bundle_start <= now() && $product->bundle_end >= now())
                        <div class="col-5 p-0">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="landing-product-new position-relative w-100 mb-3"
                                    style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                    @if ($product->price_discount[0] != 0)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">
                                            Sale!
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="mb-3">
                                <div class="w-100" style="height: 50px">
                                    <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $product->name }}
                                    </p>
                                </div>
                                @if ($product->price_discount[0] != 0)
                                    <div class="d-flex mb-3">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR
                                                {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham mb-3">IDR
                                        {{ number_format($product->price[0], 0, ',', '.') }}</div>
                                @endif
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                                </a>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-5 p-0">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <div class="landing-product-new position-relative w-100 mb-3"
                                style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                @if ($product->price_discount[0] != 0)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div class="mb-3">
                            <div class="w-100" style="height: 50px">
                                <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $product->name }}
                                </p>
                            </div>
                            @if ($product->price_discount[0] != 0)
                                <div class="d-flex mb-3">
                                    <div class="position-relative">
                                        <span class="text-secondary cross">IDR
                                            {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                    </div>
                                    <span class="text-danger font-weight-bold ms-2">IDR
                                        {{ number_format($product->price[0] - $product->price_discount[0], 0, ',', '.') }}</span>
                                </div>
                            @else
                                <div class="font-gotham mb-3">IDR
                                    {{ number_format($product->price[0], 0, ',', '.') }}</div>
                            @endif
                            <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0 position-relative" style="height:45vh;">
        <img src="{{ asset('images/landing-argan-oil.jpg') }}" class="d-block w-100 position-absolute top-0 p-0"
            style="height: 100%;object-fit: cover;">
    </div>
@endsection
