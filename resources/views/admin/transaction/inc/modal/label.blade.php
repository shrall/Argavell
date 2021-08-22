<form action="{{ route('admin.transaction.downloadlabeltransaction') }}" method="post">
    @csrf
    <div class="modal fade" id="labelModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 d-block justify-content-center position-relative">
                    <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Cetak Label Pesanan</h5>
                    <h6 class="text-center text-secondary" id="label-description">
                        Anda akan mencetak label untuk 0 pesanan
                    </h6>
                    <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                        style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-body pt-0">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <input type="checkbox" id="checkbox-cetak" name="checkbox_cetak" />
                        <input type="hidden" name="transaction_label[]" id="transaction-label">
                        Tandai pesanan sebagai "Sudah Dicetak"
                    </div>
                </div>
                <div class="modal-footer justify-content-center gap-3">
                    <button data-bs-dismiss="modal"
                        class="btn btn-admin-light text-center flex-grow-1 py-2 cursor-pointer border-0"
                        style="border: 1px solid #888 !important;">Batal</button>
                    <button type="submit" id="button-label-submit" disabled
                        class="btn btn-admin-argavell text-center flex-grow-1 py-2 cursor-pointer border-0">Download</button>
                </div>
            </div>
        </div>
    </div>
</form>
