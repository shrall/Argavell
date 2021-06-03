{{-- mobile --}}
<div class="row w-100 my-5 pt-5 p-0 align-items-center d-flex d-sm-none">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
            <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}!</span>
        </div>
        <p class="text-secondary">Welcome back to your personal page, where you can manage your
            orders, exchange & accounts right here.</p>
    </div>
    <div class="col-md-4"></div>
</div>
{{-- desktop --}}
<div class="row w-100 my-4 p-0 align-items-center d-none d-sm-flex">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/argan-fruit.png') }}" width="75px">
            <span class="text-argavell font-bauer font-weight-bold text-4xl">Hello, {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}!</span>
        </div>
        <p class="text-secondary">Welcome back to your personal page, where you can manage your
            orders, exchange & accounts right here.</p>
    </div>
    <div class="col-md-4"></div>
</div>
