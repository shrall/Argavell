<div class="modal fade" id="productPreviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            @if (Route::current()->getName() == 'admin.product.create')
                <img src="" class="product-image-preview">
            @elseif (Route::current()->getName() == 'admin.product.edit')
                <img src="{{asset('uploads/products/' . $product->img)}}" class="product-image-preview">
            @endif

        </div>
    </div>
</div>
