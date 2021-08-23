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
    <form action="{{ route('admin.product.update', $product->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Nama Produk</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control" name="name" required
                                    placeholder="Nama Produk" required value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Detail Produk</label>
                            <div class="col-12">
                                <textarea id="detail" type="textarea" class="form-control" name="detail" required
                                    autocomplete="detail" placeholder="Detail Produk"
                                    style="resize: none;">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Jenis Produk</label>
                            <label class="col-6 text-start font-weight-bold">Berat (gram)</label>
                            <div class="col-6">
                                <select name="type" id="type" class="form-select">
                                    <option value="0" @if ($product->type == '0') selected @endif>Argavell</option>
                                    <option value="1" @if ($product->type == '1') selected @endif>Kleanse</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="weight" id="weight" class="form-control"
                                    value="{{ $product->weight }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Tipe Produk</label>
                            <div class="col-12">
                                <select name="bundle" id="bundle" class="form-select">
                                    <option value="0" @if ($product->bundle == '0') selected @endif>Single</option>
                                    <option value="1" @if ($product->bundle == '1') selected @endif>Bundle</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 @if ($product->bundle == '0') d-none @endif" id="product-bundle-date">
                            <label class="col-12 text-start font-weight-bold">Jangka Waktu</label>
                            <div class="col-12">
                                <input type="text" name="date" id="date" class="form-control" required />
                                <input type="hidden" name="date_start" id="date-start"
                                    value="{{ $product->bundle_start }}">
                                <input type="hidden" name="date_end" id="date-end" value="{{ $product->bundle_end }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Gambar</label>
                            <div class="col-12 text-argavell">
                                <div id="image-upload-preview" class="cursor-pointer" style="text-decoration: underline;"
                                    data-bs-toggle="modal" data-bs-target="#productPreviewModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>{{ $product->img }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.product.inc.modal.product_image_preview')
            </div>
            <div class="col-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="bundle-table" @if ($product->bundle == '0') class="d-none" @endif>
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
                                        @foreach ($product->bundles as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->product->price }}</td>
                                                <td>
                                                    <div class="btn btn-admin-gray"
                                                        onclick="deleteItem({{ $item->id }})">Hapus</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Stok</label>
                            <label class="col-6 text-start font-weight-bold">Harga Produk</label>
                            <div class="col-6">
                                <input type="number" name="stock" id="stock" class="form-control" required
                                    value="{{ $product->stock }}" />
                            </div>
                            <div class="col-6">
                                <input type="number" name="price" id="price" class="form-control" required
                                    value="{{ $product->price }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="btn btn-admin-gray w-100" onclick="event.preventDefault();
                                        document.getElementById('delete-product-form').submit();">Hapus</div>
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
    <form action="{{ route('admin.product.destroy', $product->slug) }}" id="delete-product-form" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection

@section('scripts')
    <script>
        var bundleItemsTemp = @json($product->bundles);
        var bundleItems = []
        bundleItemsTemp.forEach(element => {
            bundleItems.push(element.product_id)
        });
        $('#bundle-items').val(bundleItems);
        console.log(bundleItems);
    </script>
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
            $('.product-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            $('#image-upload-preview').html('<span class="fas fa-fw fa-paperclip me-2"></span>' + event.target.files[0][
                'name'
            ])
            $('#image-upload-button').removeClass('d-block').addClass('d-none');
            $('#image-upload-preview').removeClass('d-none').addClass('d-block');
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
