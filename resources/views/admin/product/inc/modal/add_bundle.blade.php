<div class="modal fade" id="bundleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 d-block justify-content-center position-relative">
                <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Add Bundle Item</h5>
                <h6 class="text-center text-secondary" id="label-description">
                    Add a new item to your bundle!
                </h6>
                <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                    style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"></span>
            </div>
            <div class="modal-body pt-0">
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="col-12 text-start font-weight-bold">Tipe Produk</label>
                        <div class="col-12">
                            <select name="bundle_item" id="bundle-item" class="form-select" onchange="setPrice()">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="col-12 text-start font-weight-bold">Price</label>
                        <div class="col-12">
                            <input type="text" name="bundle_item_price" id="bundle-item-price" class="form-control"
                                value="{{ $products[0]->price }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="button-bundle-add" data-bs-dismiss="modal" onclick="addItem()"
                    class="btn btn-admin-argavell text-center flex-grow-1 py-2 cursor-pointer border-0">Add Item</div>
            </div>
        </div>
    </div>
</div>
