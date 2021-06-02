<ul class="list-unstyled" id="account-sidebar">
    <li class="my-2 @if (Route::current()->getName() == 'user.user.index') active @endif"><a href="{{ route('user.user.index') }}"
            class="text-secondary text-decoration-none @if (Route::current()->getName() ==
            'user.user.index') active @endif">My
            Profile</a></li>
    <li class="my-2 @if (Route::current()->getName() == 'page.transactions') active @endif"><a href="{{ route('page.transactions') }}"
            class="text-secondary text-decoration-none @if (Route::current()->getName() ==
            'page.transactions') active @endif">My Transactions</a></li>
    <li class="my-2 @if (Route::current()->getName() == 'page.address') active @endif"><a href="{{ route('page.address') }}" class="text-secondary text-decoration-none @if (Route::current()->getName() == 'page.address') active @endif">My
            Address</a></li>
    <li class="my-2 @if (Route::current()->getName() == 'page.changepassword') active @endif"><a href="{{ route('page.changepassword') }}"
            class="text-secondary text-decoration-none @if (Route::current()->getName() ==
            'page.changepassword') active @endif">Change Password</a></li>
    <li class="my-2">
        <a class="text-danger text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
