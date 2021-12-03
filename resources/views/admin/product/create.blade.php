@extends('layouts.admin')

@section('content')
    <div class="row justify-content-between mb-4">
        <div class="col-2">
            <a href="{{ route('admin.product.index') }}" class="btn btn-argavell-light"><span
                    class="fa fa-fw fa-arrow-left mr-2"></span>Kembali</a>
        </div>
        <div class="col-8 text-center align-middle">
            <h4 class="text-argavell font-weight-black">Detail Produk</h4>
        </div>
        <div class="col-2"></div>
    </div>
    @include('admin.product.inc.modal.add_bundle')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Nama Produk</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control" name="name" required
                                    placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Detail Produk</label>
                            <div class="col-12">
                                <textarea id="detail" type="textarea" class="form-control" name="detail" required
                                    autocomplete="detail" placeholder="Detail Produk" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Jenis Produk</label>
                            <label class="col-6 text-start font-weight-bold">Berat (gram)</label>
                            <div class="col-6">
                                <select name="type" id="type" class="form-select">
                                    <option value="0" selected>Argavell</option>
                                    <option value="1">Kleanse</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="weight" id="weight" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Tipe Produk</label>
                            <div class="col-12">
                                <select name="bundle" id="bundle" class="form-select">
                                    <option value="0" selected>Single</option>
                                    <option value="1">Bundle</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 d-none" id="product-bundle-date">
                            <label class="col-12 text-start font-weight-bold">Jangka Waktu</label>
                            <div class="col-12">
                                <input type="text" name="date" id="date" class="form-control" required />
                                <input type="hidden" name="date_start" id="date-start"
                                    value="{{ \Carbon\Carbon::now() }}">
                                <input type="hidden" name="date_end" id="date-end" value="{{ \Carbon\Carbon::now() }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Gambar</label>
                            <div class="col-12 d-block" id="image-upload-button">
                                <div class="btn btn-admin-argavell">
                                    <label for="image" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*"
                                        required onchange="loadFile(event)">
                                </div>
                            </div>
                            <div class="col-12 text-argavell">
                                <div id="image-upload-preview" class="cursor-pointer" style="text-decoration: underline;"
                                    data-bs-toggle="modal" data-bs-target="#productPreviewModal"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.product.inc.modal.product_image_preview')
            </div>
            <div class="col-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="bundle-table" class="d-none">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Produk Bundle</h6>
                                <input type="hidden" name="bundle_items" id="bundle-items">
                                <h6 class="text-argavell font-weight-black cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#bundleModal">+Add Item</h6>
                            </div>
                            <div id="bundle-item-table" class="mb-3">
                                <table id="table_id" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="25px">NO</th>
                                            <th>NAMA PRODUK</th>
                                            <th>HARGA SATUAN</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Stok</label>
                            <div class="col-12">
                                <input type="number" name="stock" id="stock" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Harga Produk</label>
                            <div class="col-12">
                                <input type="number" name="price" id="price" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Diskon</label>
                            <div class="col-12">
                                <input type="number" name="price_discount" id="price_discount" class="form-control"
                                    placeholder="Kosongkan apabila tidak ada diskon" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-gray w-100" disabled>Hapus</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-argavell w-100">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#date').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                $('#date-start').val(start.format('YYYY-MM-DD'))
                $('#date-end').val(end.format('YYYY-MM-DD'))
            });
        });
    </script>
    <script>
        var loadFile = function(event) {
            console.log($('#image')[0].files[0].size);
            if ($('#image')[0].files[0].size > 1048576) {
                alert("Ukuran gambar tidak bisa melebihi 1MB!");
                $('#image').val(null);
            } else {
                $('.product-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
                $('#image-upload-preview').html('<span class="fas fa-fw fa-paperclip me-2"></span>' + event.target
                    .files[0][
                        'name'
                    ])
                $('#image-upload-button').removeClass('d-block').addClass('d-none');
                $('#image-upload-preview').removeClass('d-none').addClass('d-block');
            }
        };
    </script>
    <script>
        $('#bundle').on('change', function(e) {
            if ($('#bundle').val() == '0') {
                $('#product-bundle-date').removeClass('d-block').addClass('d-none');
                $('#bundle-table').removeClass('d-block').addClass('d-none');
            } else if ($('#bundle').val() == '1') {
                $('#product-bundle-date').removeClass('d-none').addClass('d-block');
                $('#bundle-table').removeClass('d-none').addClass('d-block');
            }
        });
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function setPrice() {
            $('#bundle-item-price').val($('#bundle-item').find(":selected").data("price"))
        }
        var bundleItems = [];

        function addItem() {
            bundleItems.push($('#bundle-item').find(":selected").val());
            $('#bundle-items').val(bundleItems);
            $.post('{{ config('app.url') }}' + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems
                })
                .done(function(data) {
                    $('#bundle-item-table').html(data);
                    $('#table_id').DataTable().ajax.reload();
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function deleteItem(id) {
            const index = bundleItems.indexOf(id);
            bundleItems.splice(index, 1);
            $('#bundle-items').val(bundleItems);
            $.post('{{ config('app.url') }}' + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems
                })
                .done(function(data) {
                    $('#bundle-item-table').html(data);
                    $('#table_id').DataTable().ajax.reload();
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
