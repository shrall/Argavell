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
            @if ($product->price_discount != null)
                <p class="my-0 text-danger">SALE!</p>
                <h2 class="font-proxima-nova mb-4 d-flex">
                    <div class="position-relative">
                        <span class="text-secondary cross">IDR {{ $product->price }}</span>
                    </div>
                    <span class="text-danger font-weight-bold ms-2">IDR
                        {{ $product->price - $product->price_discount }}</span>
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
                                    id="quantity-counter">0
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
                                    id="quantity-counter">0
                                </div>
                                <span
                                    class="col-4 far fa-fw fa-plus-square text-kleanse cursor-pointer ps-0 quantity-button"
                                    id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                    onclick="addProductQuantity()"></span>
                            @endif
                            <input type="hidden" name="quantity" id="quantity" value=0>
                            <input type="hidden" name="id" id="id" value={{ $product->id }}>
                            <input type="hidden" name="price" id="price" value={{ $product->price }}>
                            <input type="hidden" name="price_discount" id="price_discount"
                                value={{ $product->price_discount }}>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    @if ($product->type == '0')
                        <button type="submit"
                            class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModal" disabled>Add
                            to Cart</button>
                        <button type="submit"
                            class="btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModalMobile" disabled>Add
                            to Cart</button>
                    @else
                        <button type="submit"
                            class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-none d-sm-block add-to-cart-button"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModal" disabled>Add
                            to Cart</button>
                        <button type="submit"
                            class="btn btn-kleanse text-center w-100 my-2 py-2 cursor-pointer d-block d-sm-none add-to-cart-button"
                            onclick="event.preventDefault(); addToCart({{ $product->id }}, '{{ config('app.url') }}');"
                            data-bs-toggle="modal" data-bs-target="#cartModalMobile" disabled>Add
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
                                    @if ($bundle->price_discount != null)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div style="height:10%" class="mb-3">
                                <div class="font-weight-bold font-gotham mb-1">{{ $bundle->name }}</div>
                                @if ($bundle->price_discount != null)
                                    <div class="d-flex justify-content-center">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR {{ $bundle->price }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ $bundle->price - $bundle->price_discount }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham">IDR {{ $bundle->price }}</div>
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
                                @if ($bundle->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div class="mb-3">
                            <div class="w-100" style="height: 50px">
                                <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $bundle->name }}</p>
                            </div>
                            @if ($bundle->price_discount != null)
                                <div class="d-flex mb-3">
                                    <div class="position-relative">
                                        <span class="text-secondary cross">IDR {{ $bundle->price }}</span>
                                    </div>
                                    <span class="text-danger font-weight-bold ms-2">IDR
                                        {{ $bundle->price - $bundle->price_discount }}</span>
                                </div>
                            @else
                                <div class="font-gotham mb-3">IDR {{ $bundle->price }}</div>
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
@endsection

@section('scripts')

    <script>
        var product = @json($product);
        console.log(product);
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
            if (parseInt($('#quantity-counter').html()) < product['stock']) {
                $('#quantity-counter').html(parseInt($('#quantity-counter').html()) + 1);
                $('#quantity').get(0).value++
                if (parseInt($('#quantity-counter').html()) > 0) {
                    $('.add-to-cart-button').prop("disabled", false);
                }
            }
        }

        function subtractProductQuantity() {
            if (parseInt($('#quantity-counter').html()) > 0) {
                $('#quantity-counter').html(parseInt($('#quantity-counter').html()) - 1);
                $('#quantity').get(0).value--
                if (parseInt($('#quantity-counter').html()) == 0) {
                    $('.add-to-cart-button').prop("disabled", true);
                }
            }
        }
    </script>
    <script>
        function addToCart(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            $.post(url + "/cart", {
                    _token: CSRF_TOKEN,
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
                        $('#cart-subtotal').html(parseInt($('#cart-subtotal').html()) + (parseInt($('#price').val()) *
                            parseInt($('#quantity').val())));
                        $('#cart-discount').html(parseInt($('#cart-discount').html()) + (parseInt(
                            {{ $product->price_discount ?: 0 }}) * parseInt($('#quantity').val())));
                        $('#cart-total').html(parseInt($('#cart-total').html()) + ((parseInt($('#price').val()) *
                            parseInt(
                                $('#quantity').val())) - (parseInt({{ $product->price_discount ?: 0 }}) *
                            parseInt(
                                $('#quantity').val()))));
                        $('#cart-mobile-subtotal').html(parseInt($('#cart-mobile-subtotal').html()) + (parseInt($(
                                '#price')
                            .val()) * parseInt($('#quantity').val())));
                        $('#cart-mobile-discount').html(parseInt($('#cart-mobile-discount').html()) + (parseInt(
                            {{ $product->price_discount ?: 0 }}) * parseInt($('#quantity').val())));
                        $('#cart-mobile-total').html(parseInt($('#cart-mobile-total').html()) + ((parseInt($('#price')
                            .val()) * parseInt($('#quantity').val())) - (parseInt(
                            {{ $product->price_discount ?: 0 }}) * parseInt($('#quantity').val()))));
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
@endsection
