<div class="modal fade" id="benefitModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 d-block justify-content-center position-relative">
                <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Add New benefit</h5>
                <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                    style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
            </div>
            <div class="modal-body pt-0">
                <form id="add-benefit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="benefit_image" id="benefit-image">
                    <input type="hidden" name="benefit_banner" id="benefit-banner">
                    <input type="hidden" name="benefit_title" id="benefit-title">
                    <input type="hidden" name="benefit_description" id="benefit-description">
                    <div class="row mb-3">
                        <div class="col-3 d-flex flex-column">
                            <img src="{{ asset('images/argan-oil-detail-3.jpg') }}" id="benefitbanner-imaged" style="width: 100%;" class="mb-1">
                            <label for="benefitbanner" class="cursor-pointer btn btn-admin-argavell mb-1">Ubah</label>
                            <input type="file" name="benefitbanner" id="benefitbanner" class="d-none" accept="image/*"
                                required onchange="loadBenefitBanner(event, 'benefitbanner')">
                        </div>
                        <div class="col-2 d-flex flex-column">
                            <img src="{{ asset('images/argan-fruit.png') }}" id="benefit-imaged" style="width: 100%;" class="mb-1">
                            <label for="benefit" class="cursor-pointer btn btn-admin-argavell mb-1">Ubah</label>
                            <input type="file" name="benefit" id="benefit" class="d-none" accept="image/*"
                                required onchange="loadBenefitImage(event, 'benefit')">
                        </div>
                        <div class="col-7">
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Judul</label>
                                <div class="col-12">
                                    <input id="benefit_title" type="text" class="form-control" name="title" required
                                        placeholder="Judul" required>
                                </div>
                                <label class="col-12 text-start font-weight-bold">Description</label>
                                <div class="col-12">
                                    <textarea id="benefit_description" type="text" class="form-control"
                                        name="description" required placeholder="Deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div id="button-benefit-add" data-bs-dismiss="modal" onclick="addBenefit()"
                    class="btn btn-admin-argavell text-center flex-grow-1 py-2 cursor-pointer border-0">Submit</div>
            </div>
        </div>
    </div>
</div>
