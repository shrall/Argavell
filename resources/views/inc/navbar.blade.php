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
                    <a href="{{route('page.arganoil')}}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Oil
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="{{route('page.arganshampoo')}}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Shampoo
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="{{route('page.kleanse')}}"
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
                        <a href="{{route('page.profile')}}"
                            class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                            <span class="fa fa-fw fa-user me-2"></span>My Account
                        </a>
                    </li>
                @endguest
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer"
                        data-bs-toggle="modal" data-bs-target="#cartModal">
                        <span class="fa fa-fw fa-shopping-cart"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- cart modal desktop --}}
<div class="modal fade p-0" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-cart">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel"><span
                        class="text-argavell font-bauer fs-3 me-2">Cart</span><span class="text-secondary fs-6">1
                        item(s)</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-stretch py-2">
                    <div class="col-md-4">
                        <img src="{{ asset('images/argan-oil.jpg') }}" width="100px" class="rounded-3">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-10 pe-0">
                                <p class="font-proxima-nova font-weight-bold mb-1">Argan Oil</p>
                                <p class="font-proxima-nova">IDR 130.000</p>
                            </div>
                            <div class="col-1">
                                <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end fs-2">
                            <span
                                class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                                id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                onclick="subtractQuantity()"></span>
                            <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5"
                                id="quantity-counter">0
                            </div>
                            <span
                                class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                                id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                onclick="addQuantity()"></span>
                            <input type="hidden" name="quantity" id="quantity" value=0>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <div class="col-12 px-3 font-proxima-nova">
                    <div class="d-flex justify-content-between">
                        <div>Subtotal <span class="text-secondary">1 item(s)</span></div>
                        <div>IDR 1.000.000</div>
                    </div>
                    <div class="d-flex justify-content-between text-argavell">
                        <div>Discount</div>
                        <div>-IDR 200.000</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <div>Total</div>
                        <div>IDR 800.000</div>
                    </div>
                </div>
                <button type="submit"
                    class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Checkout</button>
            </div>
        </div>
    </div>
</div>

{{-- navbar mobile --}}
<div id="navbar-mobile" class="vw-100 vh-100 bg-navbar-mobile position-fixed d-none" style="z-index: 20000">
    <div class="col-12 text-center py-5">
        <img src="{{ asset('images/logo-argavell-white.png') }}" width="100px" class="pb-5 mb-5">
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{route('page.arganoil')}}" class="text-decoration-none text-white font-gotham">Argan Oil</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{route('page.arganshampoo')}}" class="text-decoration-none text-white font-gotham">Argan Shampoo</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{route('page.kleanse')}}" class="text-decoration-none text-white font-gotham">Kleanse</a>
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
            <a class="text-decoration-none text-white font-gotham" href="{{route('page.profile')}}">My Account</a>
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
            <span class="text-argavell fa fa-fw fa-user fs-2 mx-1"></span>
            <span class="text-argavell fa fa-fw fa-shopping-cart fs-2 mx-1" data-bs-toggle="modal"
                data-bs-target="#cartModalMobile"></span>
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
{{-- cart modal mobile --}}
<div class="modal fade p-0" id="cartModalMobile" tabindex="-1" aria-labelledby="cartModalMobileLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalMobileLabel"><span
                        class="text-argavell font-bauer fs-3 me-2">Cart</span><span class="text-secondary fs-6">1
                        item(s)</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-stretch py-2">
                    <div class="col-4">
                        <img src="{{ asset('images/argan-oil.jpg') }}" width="100px" class="rounded-3">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-md-10 pe-0">
                                <p class="font-proxima-nova font-weight-bold mb-1">Argan Oil</p>
                                <p class="font-proxima-nova">IDR 130.000</p>
                            </div>
                            <div class="col-1">
                                <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end fs-2">
                            <span
                                class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                                id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                onclick="subtractQuantity()"></span>
                            <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5"
                                id="quantity-counter">0
                            </div>
                            <span
                                class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                                id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                                onclick="addQuantity()"></span>
                            <input type="hidden" name="quantity" id="quantity" value=0>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <div class="col-12 px-3 font-proxima-nova">
                    <div class="d-flex justify-content-between">
                        <div>Subtotal <span class="text-secondary">1 item(s)</span></div>
                        <div>IDR 1.000.000</div>
                    </div>
                    <div class="d-flex justify-content-between text-argavell">
                        <div>Discount</div>
                        <div>-IDR 200.000</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <div>Total</div>
                        <div>IDR 800.000</div>
                    </div>
                </div>
                <button type="submit"
                    class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Checkout</button>
            </div>
        </div>
    </div>
</div>

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
<script>
    function overQuantity(button) {
        $(button).removeClass('far');
        $(button).addClass('fa');
    }

    function outQuantity(button) {
        $(button).removeClass('fa');
        $(button).addClass('far');
    }

    function addQuantity() {
        $('#quantity-counter').html(parseInt($('#quantity-counter').html()) + 1);
        $('#quantity').get(0).value++
    }

    function subtractQuantity() {
        if (parseInt($('#quantity-counter').html()) > 0) {
            $('#quantity-counter').html(parseInt($('#quantity-counter').html()) - 1);
            $('#quantity').get(0).value--
        }
    }

</script>
