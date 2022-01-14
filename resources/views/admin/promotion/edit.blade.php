@extends('layouts.admin')

@section('content')
    <div class="row justify-content-between mb-4">
        <div class="col-2">
            <a href="{{ route('admin.promotion.index') }}" class="btn btn-argavell-light"><span
                    class="fa fa-fw fa-arrow-left mr-2"></span>Kembali</a>
        </div>
        <div class="col-8 text-center align-middle">
            <h4 class="text-argavell font-weight-black">Detail Promotion</h4>
        </div>
        <div class="col-2"></div>
    </div>
    <form action="{{ route('admin.promotion.update', $promotion->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Name</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control" name="name" required
                                    placeholder="Nama Promo" required value="{{ $promotion->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Product</label>
                            <div class="col-12">
                                <select name="product_id" id="product_id" class="form-control" required disabled>
                                    <option value={{ $promotion->product->id }}>{{ $promotion->product->name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="non-bundle-table" class="d-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Info Promotion</h6>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <label class="col-2 text-start font-weight-bold">Size (ml)</label>
                                <label class="col-2 text-start font-weight-bold">Harga</label>
                                <label class="col-3 text-start font-weight-bold">Diskon Produk</label>
                                <label class="col-4 text-start font-weight-bold">Tipe Promo</label>
                            </div>
                            <div class="row mb-3" id="product-info-promotions">
                                @foreach ($promotion->product->size as $key => $size)
                                    <div id="product-promotion-1" class="row mb-1">
                                        <div class="col-1">{{ $loop->iteration }}.</div>
                                        <div class="col-2">
                                            <input type="number" class="form-control" value={{ $size }}
                                                disabled />
                                        </div>
                                        <div class="col-2">
                                            <input type="number" class="form-control"
                                                value={{ $promotion->product->price[$key] }} disabled />
                                        </div>
                                        <div class="col-3">
                                            <input type="number" class="form-control" name="amount[{{ $key }}]"
                                                value={{ $promotion->amount[$key] }} />
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check form-check-inline mb-0 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="percent[{{ $key }}]" value=0 id="percent-rupiah"
                                                    @if ($promotion->percent[$key] == 0) checked @endif>
                                                <label class="form-check-label" for="percent-rupiah">
                                                    Rupiah
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="percent[{{ $key }}]" value=1 id="percent-percent"
                                                    @if ($promotion->percent[$key] == 1) checked @endif>
                                                <label class="form-check-label" for="percent-percent">
                                                    Percent
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="btn btn-admin-gray w-100"
                                    onclick="event.preventDefault(); document.getElementById('delete-promotion-form').submit();">
                                    Hapus
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-argavell w-100">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <form action="{{ route('admin.promotion.destroy', $promotion->id) }}" id="delete-promotion-form" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection

@section('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#product_id').on('change', function(e) {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/promotion/get_product", {
                    _token: CSRF_TOKEN,
                    id: $('#product_id').val()
                })
                .done(function(data) {
                    $('#product-info-promotions').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        });
    </script>
@endsection
