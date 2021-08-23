<form action="{{ route('admin.transaction.store') }}" method="post">
    @csrf
    <div class="modal fade" id="acceptModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 d-block justify-content-center position-relative">
                    <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Terima Pesanan</h5>
                    <h6 class="text-center text-secondary">Mohon pastikan semua stok tersedia</h6>
                    <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                        style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-body pt-0">
                    <input type="hidden" name="transaction_id[]" id="transaction-accept">
                    <input type="hidden" name="input_method" value="new">
                    <div class="row" id="accept-modal-transaction-list">
                    </div>
                </div>
                <div class="modal-footer justify-content-center gap-3">
                    <button data-bs-dismiss="modal"
                        class="btn btn-admin-light text-center flex-grow-1 py-2 cursor-pointer border-0"
                        style="border: 1px solid #888 !important;">Batal</button>
                    <button type="submit" id="button-accept-submit" disabled
                        class="btn btn-admin-argavell text-center flex-grow-1 py-2 cursor-pointer border-0">Terima</button>
                </div>
            </div>
        </div>
    </div>
</form>
