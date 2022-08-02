<div class="modal fade" id="productbenefitimageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            @if (Route::current()->getName() == 'admin.product.create')
                <img src="" class="product-benefitimage-preview" style="max-width: 500px; max-height: 500px;">
            @elseif (Route::current()->getName() == 'admin.product.edit')
                <img src="{{asset('uploads/products/' . $product->benefit_image)}}" class="product-benefitimage-preview">
            @endif
        </div>
    </div>
</div>
