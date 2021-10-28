<div class="row align-items-stretch py-2 d-none d-sm-flex cart-row{{ $item->id }}" id="">
    <div class="col-4">
        <img src="{{ asset('uploads/products/' . $item->product->img) }}" width="100px" class="rounded-3">
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-md-10 pe-0">
                <p class="font-proxima-nova font-weight-bold mb-1">{{ $item->product->name }}
                    <span class="ms-1 text-secondary">({{ $item->size }})</span>
                </p>
                @if ($item->price_discount != null)
                    <div class="d-flex font-proxima-nova">
                        <div class="position-relative">
                            <span class="text-secondary cross">IDR {{ number_format($item->product->price, 0, ',', '.') }}</span>
                        </div>
                        <span class="text-danger font-weight-bold ms-2">IDR
                            {{ number_format($item->product->price - $item->product->price_discount, 0, ',', '.') }}</span>
                    </div>
                @else
                    <p class="font-proxima-nova">IDR {{ number_format($item->product->price, 0, ',', '.') }}</p>
                @endif
            </div>
            <div class="col-1">
                <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"
                    onclick="deleteItem({{ $item->id }}, '{{ config('app.url') }}')"></span>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end fs-2">
            <span class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                onclick="subtractQuantity({{ $item->id }}, '{{ config('app.url') }}')"></span>
            <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5 quantity-counter{{ $item->id }}"
                id="">{{ $item->qty }}
            </div>
            <span class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                onclick="addQuantity({{ $item->id }}, '{{ config('app.url') }}')"></span>
            <input type="hidden" name="quantity{{ $item->id }}" id="quantity{{ $item->id }}"
                value={{ $item->qty }}>
        </div>
    </div>
</div>
<div class="row align-items-stretch py-2 d-flex d-sm-none cart-mobile-row{{ $item->id }}" id="">
    <div class="col-4">
        <img src="{{ asset('uploads/products/' . $item->product->img) }}" width="100px" class="rounded-3">
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-md-10 pe-0">
                <p class="font-proxima-nova font-weight-bold mb-1">{{ $item->product->name }}
                    <span class="ms-1 text-secondary">({{ $item->size }})</span>
                </p>
                @if ($item->price_discount != null)
                    <div class="d-flex font-proxima-nova">
                        <div class="position-relative">
                            <span class="text-secondary cross">IDR {{ number_format($item->product->price, 0, ',', '.') }}</span>
                        </div>
                        <span class="text-danger font-weight-bold ms-2">IDR
                            {{ number_format($item->product->price - $item->product->price_discount, 0, ',', '.') }}</span>
                    </div>
                @else
                    <p class="font-proxima-nova">IDR {{ number_format($item->product->price, 0, ',', '.') }}</p>
                @endif
            </div>
            <div class="col-1">
                <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"
                    onclick="deleteItem({{ $item->id }}, '{{ config('app.url') }}')"></span>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end fs-2">
            <span class="col-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                onclick="subtractQuantityMobile({{ $item->id }}, '{{ config('app.url') }}')"></span>
            <div class="col-4 font-proxima-nova text-argavell text-center ps-0 fs-5 quantity-counter-mobile{{ $item->id }}"
                id="">{{ $item->qty }}
            </div>
            <span class="col-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                onclick="addQuantityMobile({{ $item->id }}, '{{ config('app.url') }}')"></span>
            <input type="hidden" name="quantity{{ $item->id }}" id="quantity-mobile{{ $item->id }}"
                value={{ $item->qty }}>
        </div>
    </div>
</div>
