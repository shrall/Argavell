<form action="{{ route('admin.transaction.export') }}" method="post">
    @csrf
    <div class="modal fade" id="reportModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header border-0 d-block justify-content-center position-relative">
                    <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Download Laporan
                        Penjualan
                    </h5>
                    <h6 class="text-center text-secondary">Laporan penjualan untuk meringkas dan mengecek
                        aktivitas penjualan toko</h6>
                    <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                        style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"
                        aria-label="Close"></span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="text-start font-weight-bold">Rentang Waktu</label>
                            <input type="text" name="report_date_range" id="report-date" class="form-control" />
                            <input type="hidden" name="report_date_start" id="report-date-start">
                            <input type="hidden" name="report_date_end" id="report-date-end">
                        </div>
                        <div class="col-12">
                            <label class="text-start font-weight-bold">Detail laporan yang dibutuhkan</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="report-type-radio-all"
                                        value="all" checked>
                                    <label class="form-check-label" for="report-type-radio-all">Semua</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="report-type-radio-new"
                                        value="new">
                                    <label class="form-check-label" for="report-type-radio-new">Pesanan Baru</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type"
                                        id="report-type-radio-canceled" value="canceled">
                                    <label class="form-check-label" for="report-type-radio-canceled">Dibatalkan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn-admin-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Download</button>
                </div>
            </div>
        </div>
    </div>
</form>
