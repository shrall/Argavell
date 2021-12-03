<div class="modal fade" id="voucherPreviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            @if (Route::current()->getName() == 'admin.voucher.create')
                <img src="" class="voucher-image-preview">
            @elseif (Route::current()->getName() == 'admin.voucher.edit')
                <img src="{{asset('uploads/vouchers/' . $voucher->img)}}" class="voucher-image-preview">
            @endif

        </div>
    </div>
</div>
