{{-- navbar desktop --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-none d-sm-block">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="50" height="50"
                class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-4">
                    <a href="{{ route('page.arganoil') }}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Oil
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="{{ route('page.arganshampoo') }}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Shampoo
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="{{ route('page.kleanse') }}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Kleanse
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Contact Us
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mx-4">
                            <a class="text-argavell text-decoration-none font-proxima-nova font-weight-bold"
                                href="{{ route('login') }}">
                                <span class="fa fa-fw fa-user me-2"></span>Login
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item mx-4">
                        <a href="{{ route('user.user.index') }}"
                            class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                            <span class="fa fa-fw fa-user me-2"></span>My Account
                        </a>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="#"
                            class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer"
                            data-bs-toggle="modal" data-bs-target="#cartModal">
                            <span class="fa fa-fw fa-shopping-cart"></span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
{{-- navbar mobile --}}
<div id="navbar-mobile" class="vw-100 vh-100 bg-navbar-mobile position-fixed d-none" style="z-index: 20000">
    <div class="col-12 text-center py-5">
        <img src="{{ asset('images/logo-argavell-white.png') }}" width="100px" class="pb-5 mb-5">
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{ route('page.arganoil') }}" class="text-decoration-none text-white font-gotham">Argan Oil</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{ route('page.arganshampoo') }}" class="text-decoration-none text-white font-gotham">Argan
            Shampoo</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{ route('page.kleanse') }}" class="text-decoration-none text-white font-gotham">Kleanse</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">Contact Us</a>
    </div>
    @guest
        @if (Route::has('login'))
            <div class="col-12 text-center my-3">
                <a class="text-decoration-none text-white font-gotham" href="{{ route('login') }}">Login</a>
            </div>
        @endif
    @else
        <div class="col-12 text-center my-3">
            <a class="text-decoration-none text-white font-gotham" href="{{ route('user.user.index') }}">My Account</a>
        </div>
    @endguest
    <span class="fa fa-fw fa-times position-absolute text-white fs-1" style="top:10px; right:10px;"
        onclick="closeNavbarMobile()"></span>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top d-block d-sm-none">
    <div class="container px-0">
        <div class="w-25 text-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNavbarMobile()"
                data-target="#navbarSupportedContentMobile" aria-controls="navbarSupportedContentMobile"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a class="navbar-brand w-25 text-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="50" height="50"
                class="d-inline-block align-text-top">
        </a>
        <div class="w-25 text-center">
            @guest
                @if (Route::has('login'))
                    <a class="text-argavell text-decoration-none font-proxima-nova font-weight-bold mx-1"
                        href="{{ route('login') }}">
                        <span class="text-argavell fa fa-fw fa-user fs-2"></span>
                    </a>
                @endif
            @else
                <a href="{{ route('user.user.index') }}"
                    class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer mx-1">
                    <span class="text-argavell fa fa-fw fa-user fs-2"></span>
                </a>
                <span class="text-argavell fa fa-fw fa-shopping-cart fs-2" data-bs-toggle="modal"
                    data-bs-target="#cartModalMobile"></span>
            @endguest

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContentMobile">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
            </ul>
        </div>
    </div>
</nav>

@auth
    <?php
    $subtotal = 0;
    $discount = 0;
    $totalqty = 0;
    foreach (Auth::user()->carts->where('transaction_id', null) as $item) {
    $totalqty += $item->qty;
    $subtotal += $item->price * $item->qty;
    $discount += $item->price_discount * $item->qty;
    }
    ?>
    {{-- cart modal desktop --}}
    <div class="modal fade p-0" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-cart">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">
                        <span class="text-argavell font-bauer fs-3 me-2">Cart</span>
                        <span class="text-secondary fs-6" id="modal-header-qty">{{ $totalqty }}</span>
                        <span class="text-secondary fs-6"> item(s)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body position-relative">
                    <div id="cart-loader" class="d-none">
                        <div class="position-absolute w-100 h-100" style="background-color: #fff; opacity: 70%;"></div>
                        <img src="{{ asset('cart-loading.svg') }}"
                            class="position-absolute top-50 start-50 translate-middle" style="z-index: 100" />
                    </div>
                    @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                        <div class="row align-items-stretch py-2" id="cart-row{{ $item->id }}">
                            <div class="col-md-4">
                                <img src="{{ asset('products/' . $item->product->img) }}" width="100px"
                                    class="rounded-3">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-10 pe-0">
                                        <p class="font-proxima-nova font-weight-bold mb-1">{{ $item->product->name }}</p>
                                        @if ($item->price_discount != null)
                                            <p class="font-proxima-nova"><del class="text-secondary">IDR
                                                    {{ $item->product->price }}</del>
                                                <span class="text-danger ms-2">IDR
                                                    {{ $item->product->price - $item->product->price_discount }}</span>
                                            </p>
                                        @else
                                            <p class="font-proxima-nova">IDR {{ $item->product->price }}</p>
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"
                                            onclick="deleteItem({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end fs-2">
                                    <span
                                        class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                                        id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                        onclick="subtractQuantity({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5"
                                        id="quantity-counter{{ $item->id }}">{{ $item->qty }}
                                    </div>
                                    <span
                                        class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                                        id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                        onclick="addQuantity({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    <input type="hidden" name="quantity{{ $item->id }}"
                                        id="quantity{{ $item->id }}" value={{ $item->qty }}>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer ">
                    <div class="col-12 px-3 font-proxima-nova">
                        <div class="d-flex justify-content-between">
                            <div>Subtotal
                                <span class="text-secondary" id="modal-footer-qty">{{ $totalqty }}</span>
                                <span class="text-secondary"> item(s)</span>
                            </div>
                            <div>IDR <span id="cart-subtotal">{{ $subtotal }}</span></div>
                        </div>
                        <div class="d-flex justify-content-between text-argavell">
                            <div>Discount</div>
                            <div>- IDR <span id="cart-discount">{{ $discount }}</span></div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <div>Total</div>
                            <div>IDR <span id="cart-total">{{ $subtotal - $discount }}</span></div>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    {{-- cart modal mobile --}}
    <div class="modal fade p-0" id="cartModalMobile" tabindex="-1" aria-labelledby="cartModalMobileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalMobileLabel">
                        <span class="text-argavell font-bauer fs-3 me-2">Cart</span>
                        <span class="text-secondary fs-6" id="modal-header-mobile-qty">{{ $totalqty }}</span>
                        <span class="text-secondary fs-6"> item(s)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body position-relative">
                    <div id="cart-mobile-loader" class="d-none">
                        <div class="position-absolute w-100 h-100" style="background-color: #fff; opacity: 70%;"></div>
                        <img src="{{ asset('cart-loading.svg') }}"
                            class="position-absolute top-50 start-50 translate-middle" style="z-index: 100" />
                    </div>
                    @foreach (Auth::user()->carts->where('transaction_id', null) as $item)
                        <div class="row align-items-stretch py-2" id="cart-mobile-row{{ $item->id }}">
                            <div class="col-4">
                                <img src="{{ asset('products/' . $item->product->img) }}" width="100px"
                                    class="rounded-3">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-md-10 pe-0">
                                        <p class="font-proxima-nova font-weight-bold mb-1">{{ $item->product->name }}</p>
                                        @if ($item->price_discount != null)
                                            <p class="font-proxima-nova"><del class="text-secondary">IDR
                                                    {{ $item->product->price }}</del>
                                                <span class="text-danger ms-2">IDR
                                                    {{ $item->product->price - $item->product->price_discount }}</span>
                                            </p>
                                        @else
                                            <p class="font-proxima-nova">IDR {{ $item->product->price }}</p>
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"
                                            onclick="deleteItem({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end fs-2">
                                    <span
                                        class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                                        id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                        onclick="subtractQuantityMobile({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5"
                                        id="quantity-counter-mobile{{ $item->id }}">{{ $item->qty }}
                                    </div>
                                    <span
                                        class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                                        id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                        onclick="addQuantityMobile({{ $item->id }}, '{{ config('app.url') }}')"></span>
                                    <input type="hidden" name="quantity{{ $item->id }}"
                                        id="quantity-mobile{{ $item->id }}" value={{ $item->qty }}>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer ">
                    <div class="col-12 px-3 font-proxima-nova">
                        <div class="d-flex justify-content-between">
                            <div>Subtotal
                                <span class="text-secondary" id="modal-footer-mobile-qty">{{ $totalqty }}</span>
                                <span class="text-secondary">item(s)</span>
                            </div>
                            <div>IDR <span id="cart-mobile-subtotal">{{ $subtotal }}</span></div>
                        </div>
                        <div class="d-flex justify-content-between text-argavell">
                            <div>Discount</div>
                            <div>- IDR <span id="cart-mobile-discount">{{ $discount }}</span></div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <div>Total</div>
                            <div>IDR <span id="cart-mobile-total">{{ $subtotal - $discount }}</span></div>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function overQuantity(button) {
            $(button).removeClass('far');
            $(button).addClass('fa');
        }

        function outQuantity(button) {
            $(button).removeClass('fa');
            $(button).addClass('far');
        }

        function addQuantity(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            $.post(url + "/cart/additem", {
                    _token: CSRF_TOKEN,
                    id: id
                })
                .done(function(data) {
                    $('#quantity-counter' + id).html(parseInt($('#quantity-counter' + id).html()) + 1);
                    $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) + 1);
                    $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) + 1);
                    $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) + 1);
                    $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) + 1);
                    $('#cart-subtotal').html(parseInt($('#cart-subtotal').html()) + (data['price']));
                    $('#cart-discount').html(parseInt($('#cart-discount').html()) + (data['price_discount']));
                    $('#cart-total').html(parseInt($('#cart-total').html()) + (data['price'] - data['price_discount']));
                    $('#cart-mobile-subtotal').html(parseInt($('#cart-mobile-subtotal').html()) + (data['price']));
                    $('#cart-mobile-discount').html(parseInt($('#cart-mobile-discount').html()) + (data[
                        'price_discount']));
                    $('#cart-mobile-total').html(parseInt($('#cart-mobile-total').html()) + (data['price'] - data[
                        'price_discount']));
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    console.log("quantity added");
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        function subtractQuantity(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if (parseInt($('#quantity-counter' + id).html()) > 0) {
                $('#cart-loader').removeClass('d-none');
                $('#cart-mobile-loader').removeClass('d-none');
                $.post(url + "/cart/subtractitem", {
                        _token: CSRF_TOKEN,
                        id: id
                    })
                    .done(function(data) {
                        $('#quantity-counter' + id).html(parseInt($('#quantity-counter' + id).html()) - 1);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) - 1);
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) - 1);
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) - 1);
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) - 1);
                        $('#cart-subtotal').html(parseInt($('#cart-subtotal').html()) - (data['price']));
                        $('#cart-discount').html(parseInt($('#cart-discount').html()) - (data['price_discount']));
                        $('#cart-total').html(parseInt($('#cart-total').html()) - (data['price'] - data[
                            'price_discount']));
                        $('#cart-mobile-subtotal').html(parseInt($('#cart-mobile-subtotal').html()) - (data['price']));
                        $('#cart-mobile-discount').html(parseInt($('#cart-mobile-discount').html()) - (data[
                            'price_discount']));
                        $('#cart-mobile-total').html(parseInt($('#cart-mobile-total').html()) - (data['price'] - data[
                            'price_discount']));
                    })
                    .fail(function() {
                        alert('Fail')
                    })
                    .always(function() {
                        console.log("quantity subtracted");
                        $('#cart-loader').addClass('d-none');
                        $('#cart-mobile-loader').addClass('d-none');
                    });
            }
        }

        function deleteItem(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            $.post(url + "/cart/" + id, {
                    _token: CSRF_TOKEN,
                    _method: "DELETE",
                    id: id
                })
                .done(function(data) {
                    $('#cart-row' + id).addClass('d-none');
                    $('#cart-mobile-row' + id).addClass('d-none');
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    console.log("quantity added");
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        function addQuantityMobile(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            $.post(url + "/cart/additem", {
                    _token: CSRF_TOKEN,
                    id: id
                })
                .done(function(data) {
                    $('#quantity-counter-mobile' + id).html(parseInt($('#quantity-counter-mobile' + id).html()) + 1);
                    $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) + 1);
                    $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) + 1);
                    $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) + 1);
                    $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) + 1);
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    console.log("quantity added");
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        function subtractQuantityMobile(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if (parseInt($('#quantity-counter-mobile' + id).html()) > 0) {
                $('#cart-loader').removeClass('d-none');
                $('#cart-mobile-loader').removeClass('d-none');
                $.post(url + "/cart/subtractitem", {
                        _token: CSRF_TOKEN,
                        id: id
                    })
                    .done(function(data) {
                        $('#quantity-counter-mobile' + id).html(parseInt($('#quantity-counter-mobile' + id).html()) -
                            1);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) - 1);
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) - 1);
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) - 1);
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) - 1);
                    })
                    .fail(function() {
                        alert('Fail')
                    })
                    .always(function() {
                        console.log("quantity subtracted");
                        $('#cart-loader').addClass('d-none');
                        $('#cart-mobile-loader').addClass('d-none');
                    });
            }
        }

    </script>
@endauth


<script>
    function openNavbarMobile() {
        $("#navbar-mobile").removeClass('d-none');
        $("#navbar-mobile").addClass('d-block');
    }

    function closeNavbarMobile() {
        $("#navbar-mobile").removeClass('d-block');
        $("#navbar-mobile").addClass('d-none');
    }

</script>
