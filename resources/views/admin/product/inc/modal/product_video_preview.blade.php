<div class="modal fade" id="productvideoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            @if (Route::current()->getName() == 'admin.product.create')
                <video class="w-100 p-0" width="800px" title="YouTube video player" frameborder="0" controls class="product-video-preview"
                    allowfullscreen>
                </video>
            @elseif (Route::current()->getName() == 'admin.product.edit')
                <video class="w-100 p-0" width="800px" title="YouTube video player" frameborder="0" controls class="product-video-preview"
                    allowfullscreen>
                    <source src="{{ asset('uploads/products/' . $product->link_video) }}" type="video/mp4">
                </video>
            @endif
        </div>
    </div>
</div>
