<ul class="list-unstyled" id="account-sidebar">
    <li class="my-2 @if (Route::current()->getName() == 'page.profile') active @endif"><a href="{{ route('page.profile') }}" class="text-secondary text-decoration-none @if (Route::current()->getName() == 'page.profile') active @endif">My
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
        <form action="{{ route('logout') }}" method="post">
            @csrf <button type="submit" class="text-danger text-decoration-none">Logout</button></form>
    </li>
</ul>
