<div class="row gap-3 justify-content-md-center">
    @foreach ($products as $product)
        @if ($product->type == '0')
            @if ($product->bundle == '1')
                @if ($product->bundle_start >= now() && $product->bundle_end <= now())
                    <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <div class="landing-product position-relative w-100 mb-3"
                                style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                @if ($product->price_discount != null)
                                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div style="height:10%" class="mb-3">
                            <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                            @if ($product->price_discount != null)
                                <div class="d-flex justify-content-center">
                                    <div class="position-relative">
                                        <span class="text-secondary cross">IDR {{ $product->price }}</span>
                                    </div>
                                    <span class="text-danger font-weight-bold ms-2">IDR
                                        {{ $product->price - $product->price_discount }}</span>
                                </div>
                            @else
                                <div class="font-gotham">IDR {{ $product->price }}</div>
                            @endif
                        </div>
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                            <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                        </a>
                    </div>
                @endif
            @else
                <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                    <a href="{{ route('product.show', $product->slug) }}">
                        <div class="landing-product position-relative w-100 mb-3"
                            style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                            @if ($product->price_discount != null)
                                <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                            @endif
                        </div>
                    </a>
                    <div style="height:10%" class="mb-3">
                        <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                        @if ($product->price_discount != null)
                            <div class="d-flex @if (Route::current()->getName() != 'home') justify-content-center @endif">
                                <div class="position-relative">
                                    <span class="text-secondary cross">IDR {{ $product->price }}</span>
                                </div>
                                <span class="text-danger font-weight-bold ms-2">IDR
                                    {{ $product->price - $product->price_discount }}</span>
                            </div>
                        @else
                            <div class="font-gotham">IDR {{ $product->price }}</div>
                        @endif
                    </div>
                    <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                        <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                    </a>
                </div>
            @endif
        @endif
    @endforeach
</div>
