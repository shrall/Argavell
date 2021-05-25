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
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Oil
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Shampoo
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
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
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        <span class="fa fa-fw fa-shopping-cart"></span>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        <span class="fa fa-fw fa-search"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- navbar mobile --}}
<div id="navbar-mobile" class="vw-100 vh-100 bg-navbar-mobile position-absolute d-none" style="z-index: 20000">
    <div class="col-12 text-center py-5">
        <img src="{{ asset('images/logo-argavell-white.png') }}" width="100px" class="pb-5 mb-5">
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">Argan Oil</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">Argan Shampoo</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">Kleanse</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">Contact Us</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="#" class="text-decoration-none text-white font-gotham">My Account</a>
    </div>
    <span class="fa fa-fw fa-times position-absolute text-white fs-1" style="top:10px; right:10px;" onclick="closeNavbarMobile()"></span>
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
            <span class="fa fa-fw fa-user fs-2 mx-1"></span>
            <span class="fa fa-fw fa-shopping-cart fs-2 mx-1"></span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContentMobile">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Oil
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Shampoo
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#"
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
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

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
