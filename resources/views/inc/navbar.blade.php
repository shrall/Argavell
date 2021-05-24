<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Oil
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Argan Shampoo
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Kleanse
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
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
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        <span class="fa fa-fw fa-shopping-cart"></span>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="#" class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        <span class="fa fa-fw fa-search"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
