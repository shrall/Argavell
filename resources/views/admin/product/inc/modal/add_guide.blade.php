<div class="modal fade" id="guideModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 d-block justify-content-center position-relative">
                <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Add New Guide</h5>
                <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                    style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
            </div>
            <div class="modal-body pt-0">
                <form id="add-guide" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="guide_image" id="guide-image">
                    <input type="hidden" name="guide_title" id="guide-title">
                    <input type="hidden" name="guide_description" id="guide-description">
                    <div class="row mb-3">
                        <div class="col-3 d-flex flex-column">
                            <img src="{{ asset('images/argan-fruit.png') }}" id="guide-imaged" class="mb-1" style="width: 100%;">
                            <label for="guide" class="cursor-pointer btn btn-admin-argavell">Ubah</label>
                            <input type="file" name="guide" id="guide" class="d-none" accept="image/*" required
                                onchange="loadModalFile(event, 'guide')">
                        </div>
                        <div class="col-9">
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Judul</label>
                                <div class="col-12">
                                    <input id="guide_title" type="text" class="form-control" name="title" required
                                        placeholder="Judul" required>
                                </div>
                                <label class="col-12 text-start font-weight-bold">Description</label>
                                <div class="col-12">
                                    <textarea id="guide_description" type="text" class="form-control" rows="3"
                                        name="description" required placeholder="Deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div id="button-guide-add" data-bs-dismiss="modal" onclick="addGuide()"
                    class="btn btn-admin-argavell text-center flex-grow-1 py-2 cursor-pointer border-0">Add New</div>
            </div>
        </div>
    </div>
</div>
