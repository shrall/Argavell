<div class="modal fade" id="productbannerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            @if (Route::current()->getName() == 'admin.product.create')
                <img src="" class="product-banner-preview" style="max-width: 500px; max-height: 500px;">
            @elseif (Route::current()->getName() == 'admin.product.edit')
                <img src="{{asset('uploads/products/' . $product->banner)}}" class="product-banner-preview">
            @endif
        </div>
    </div>
</div>
