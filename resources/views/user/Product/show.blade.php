@extends('layouts.app')

@section('content')
    <div class="row w-100 m-0 p-0 py-5 align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="w-100 product-detail" style="background-image: url({{ asset('products/' . $product->img) }})">
            </div>
        </div>
        <div class="col-md-5">
            @if ($product->type == '0')
                <h1 class="text-argavell font-bauer font-weight-bold">{{ $product->name }}</h1>
            @else
                <h1 class="text-kleanse font-bauer font-weight-bold">{{ $product->name }}</h1>
            @endif
            @if ($product->price_discount != null)
                <p class="my-0 text-danger">SALE!</p>
                <h2 class="font-proxima-nova mb-4">
                    <del class="text-secondary">IDR {{ $product->price }}</del>
                    <span class="text-danger ms-2">IDR {{ $product->price - $product->price_discount }}</span>
                </h2>
            @else
                @if ($product->type == '0')
                    <h2 class="text-argavell font-proxima-nova mb-4">IDR {{ $product->price }}</h2>
                @else
                    <h2 class="text-kleanse font-proxima-nova mb-4">IDR {{ $product->price }}</h2>
                @endif
            @endif
            <p class="font-proxima-nova font-weight-bold">Description</p>
            <p>{{ $product->description }}</p>
            @if ($product->type == '0')
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
            </ul>
            <form action="{{ route('user.cart.store') }}" method="post" id="form-product">
                @csrf
                <div class="row mb-3">
                    <div class="col-8">
                        <p class="font-proxima-nova font-weight-bold">Size</p>
                        @if ($product->type == '0')
                            <select class="form-select border-argavell font-proxima-nova font-weight-bold" id="size"
                                name="size">
                                @foreach ($product->size as $size)
                                    <option value="{{ $size }}">{{ $size }} ml</option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-select border-kleanse font-proxima-nova font-weight-bold" id="size"
                                name="size">
                                @foreach ($product->size as $size)
                                    <option value="{{ $size }}">{{ $size }} ml</option>
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
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    @if ($product->type == '0')
                        <button type="submit" class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');">Add
                            to Cart</button>
                    @else
                        <button type="submit" class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');">Add
                            to Cart</button>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row pb-5 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card border-0">
                @if ($product->type == '0')
                    <ul class="nav nav-argavell nav-fill" id="detailTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-bauer fs-3" id="how-to-use-tab" data-bs-toggle="tab"
                                data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                aria-selected="true">How To Use</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-bauer fs-3" id="ingredients-tab" data-bs-toggle="tab"
                                data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                aria-selected="false">Ingredients</button>
                        </li>
                    </ul>
                @else
                    <ul class="nav nav-kleanse nav-fill" id="detailTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-bauer fs-3" id="how-to-use-tab" data-bs-toggle="tab"
                                data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                                aria-selected="true">How To Use</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-bauer fs-3" id="ingredients-tab" data-bs-toggle="tab"
                                data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                aria-selected="false">Ingredients</button>
                        </li>
                    </ul>
                @endif
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="how-to-use" role="tabpanel" aria-labelledby="how-to-use-tab">
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
    </div>

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
            <h1 class="text-kleanse font-bauer font-weight-bold text-center">Let's Take Our Bundle of Love</h1>
        @endif
        <span class="mb-5 text-center text-secondary">Buy the bundle with special price</span>
        <div class="row gap-3 justify-content-md-center">
            @foreach ($products as $producty)
                @if ($product->type == $producty->type)
                    <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                        <a href="{{ route('product.show', $producty->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('products/' . $producty->img) }})">
                                @if ($producty->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div style="height:15%" class="mb-3">
                            <div class="font-weight-bold font-gotham">{{ $producty->name }}</div>
                            @if ($producty->price_discount != null)
                                <div class="font-gotham"><del class="text-secondary">IDR
                                        {{ $producty->price }}</del><span class="text-danger font-weight-bold ms-2">IDR
                                        {{ $producty->price - $producty->price_discount }}</span></div>
                            @else
                                <div class="font-gotham">IDR {{ $producty->price }}</div>
                            @endif
                        </div>
                        @if ($producty->type == '0')
                            <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                        @else
                            <div class="btn-kleanse text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container d-block d-sm-none text-center">
        @if ($product->type == '0')
            <h1 class="col-8 mx-auto text-argavell font-bauer font-weight-bold text-center text-4xl">Let's Take Our Bundle
                of
                Love</h1>
        @else
            <h1 class="col-8 mx-auto text-kleanse font-bauer font-weight-bold text-center text-4xl">Let's Take Our Bundle of
                Love</h1>
        @endif
        <span class="mb-5 text-center text-secondary">Buy the bundle with special price</span>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        <div class="row px-3 gap-3 flex-nowrap text-start">
            @foreach ($products as $producty)
                @if ($producty->type == $product->type)
                    <div class="col-10 p-0">
                        <a href="{{ route('product.show', $producty->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('products/' . $producty->img) }})">
                                @if ($producty->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                                @endif
                            </div>
                        </a>
                        <div class="mb-3">
                            <div class="w-100" style="height: 50px">
                                <p class="w-100 font-weight-bold font-gotham text-break">{{ $producty->name }}</p>
                            </div>
                            @if ($producty->price_discount != null)
                                <div class="font-gotham mb-3"><del class="text-secondary">IDR 130.000</del><span
                                        class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                            @else
                                <div class="font-gotham mb-3">IDR {{ $producty->price }}</div>
                            @endif
                            @if ($product->type == '0')
                                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                            @else
                                <div class="btn-kleanse text-center w-100 py-2 cursor-pointer">Add to Cart</div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
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
            $('#quantity-counter').html(parseInt($('#quantity-counter').html()) + 1);
            $('#quantity').get(0).value++
        }

        function subtractProductQuantity() {
            if (parseInt($('#quantity-counter').html()) > 0) {
                $('#quantity-counter').html(parseInt($('#quantity-counter').html()) - 1);
                $('#quantity').get(0).value--
            }
        }

    </script>
    <script>
        function addToCart(id, url) {
            console.log(id);
            console.log($('#size').val());
            console.log($('#quantity').val());
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.post(url + "/cart", {
                    _token: CSRF_TOKEN,
                    id: id,
                    size: $('#size').val(),
                    quantity: $('#quantity').val(),
                })
                .done(function(data) {
                    console.log("cart added");
                })
                .fail(function() {
                    console.log("fail");
                })
                .always(function() {
                    console.log("always");
                });
        }

    </script>
@endsection
