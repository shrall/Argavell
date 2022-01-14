@foreach ($product->size as $key => $size)
    <div id="product-promotion-1" class="row mb-1">
        <div class="col-1">{{ $loop->iteration }}.</div>
        <div class="col-2">
            <input type="number" class="form-control" value={{ $size }} disabled />
        </div>
        <div class="col-2">
            <input type="number" class="form-control" value={{ $product->price[$key] }} disabled />
        </div>
        <div class="col-3">
            <input type="number" class="form-control" name="amount[{{ $key }}]" value=0 />
        </div>
        <div class="col-4">
            <div class="form-check form-check-inline mb-0 pt-2">
                <input class="form-check-input" type="radio" name="percent[{{ $key }}]" value=0
                    id="percent-rupiah" checked>
                <label class="form-check-label" for="percent-rupiah">
                    Rupiah
                </label>
            </div>
            <div class="form-check form-check-inline mb-0 pt-2">
                <input class="form-check-input" type="radio" name="percent[{{ $key }}]" value=1
                    id="percent-percent">
                <label class="form-check-label" for="percent-percent">
                    Percent
                </label>
            </div>
        </div>
    </div>
@endforeach
