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
                            <label class="col-12 text-start font-weight-bold">SKU Produk</label>
                            <div class="col-12">
                                <input id="sku" type="text" class="form-control" name="sku" required placeholder="SKU"
                                    required value="{{ $product->sku }}">
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
                                <input type="hidden" name="bundle_item_sizes" id="bundle-item-sizes">
                                <input type="hidden" name="bundle_item_keys" id="bundle-item-keys">
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
                                                <td>{{ $item->product->name }} ({{ $item->product->size[$item->key] }}
                                                    ml)</td>
                                                <td>{{ $item->product->price[$item->key] }}</td>
                                                <td>
                                                    <div class="btn btn-admin-gray"
                                                        onclick="deleteItem({{ $item->id }})">Hapus</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Stok</label>
                                <div class="col-12">
                                    <input type="number" name="stock" id="stock" class="form-control"
                                        value="{{ $product->stock[0] }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-12">
                                    <input type="number" name="price" id="price" class="form-control"
                                        value="{{ $product->price[0] }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Diskon</label>
                                <div class="col-12">
                                    <input type="number" name="price_discount" id="price_discount" class="form-control"
                                        value="{{ $product->price_discount[0] }}"
                                        placeholder="Kosongkan apabila tidak ada diskon" />
                                </div>
                            </div>
                        </div>
                        <div id="non-bundle-table" @if ($product->bundle == '1') class="d-none" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Info Produk</h6>
                                <input type="hidden" name="item_sizes" id="item-sizes">
                                <h6 class="text-argavell font-weight-black cursor-pointer" onclick="addSize();">+Add Size
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <label class="col-3 text-start font-weight-bold">Stok</label>
                                <label class="col-3 text-start font-weight-bold">Size (ml)</label>
                                <label class="col-4 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-sizes">
                                @foreach ($product->size as $key => $size)
                                    <div id="product-size-{{ $key }}" class="row">
                                        <div class="col-1 mb-2">{{ $loop->iteration }}.</div>
                                        <div class="col-3 mb-2">
                                            <input type="number" id="size-0{{ $key }}" class="form-control"
                                                value={{ $product->stock[$key] }}
                                                onkeyup="changeSize(0, {{ $key }});" />
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="number" id="size-1{{ $key }}" class="form-control"
                                                value={{ $product->size[$key] }}
                                                onkeyup="changeSize(1, {{ $key }});" />
                                        </div>
                                        <div class="col-4 mb-2">
                                            <input type="number" id="size-2{{ $key }}" class="form-control"
                                                value={{ $product->price[$key] }}
                                                onkeyup="changeSize(2, {{ $key }});" />
                                        </div>
                                        <div class="col-1 mb-2">
                                            <span class="fa fa-fw fa-trash-alt cursor-pointer"
                                                onclick="deleteSize({{ $key }});"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="btn btn-admin-gray w-100"
                                    onclick="event.preventDefault(); document.getElementById('delete-product-form').submit();">
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
        </div>
    </form>
    <form action="{{ route('admin.product.destroy', $product->slug) }}" id="delete-product-form" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection

@section('scripts')
    <script>
        var sizes = []
        var sizestemparray = []
        var the_product = @json($product);
        the_product.size.forEach(function(value, i) {
            sizestemparray.push(the_product.stock[i]);
            sizestemparray.push(the_product.size[i]);
            sizestemparray.push(the_product.price[i]);
            sizestemparray.push(the_product.price_discount[i]);
            sizes.push(sizestemparray);
            sizestemparray = [];
        });
        $('#item-sizes').val(sizes);

        function changeSize(index, order) {
            sizes[order][index] = parseInt($('#size-' + index + order).val());
            $('#item-sizes').val(sizes);
            console.log(sizes);
            console.log($('#item-sizes').val());
        }

        function addSize() {
            sizes.push([0, 0, 0, 0]);
            $('#item-sizes').val(sizes);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_sizes", {
                    _token: CSRF_TOKEN,
                    sizes: sizes
                })
                .done(function(data) {
                    $('#product-info-sizes').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function deleteSize(index) {
            if (sizes.length > 1) {
                $('#product-size-' + index).remove();
                sizes.splice(index, 1);
                $('#item-sizes').val(sizes);
                var hostname = "{{ request()->getHost() }}"
                var url = ""
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                } else {
                    url = "{{ config('app.url') }}"
                }
                $.post(url + "/admin/product/add_sizes", {
                        _token: CSRF_TOKEN,
                        sizes: sizes
                    })
                    .done(function(data) {
                        $('#product-info-sizes').html(data);
                    })
                    .fail(function(error) {
                        console.log(error);
                    });
            }
        }
    </script>
    <script>
        $(function() {
            $('#date').daterangepicker({
                opens: 'left',
                startDate: "{{ date('Y-m-d', strtotime($product->bundle_start)) }}",
                endDate: "{{ date('Y-m-d', strtotime($product->bundle_end)) }}",
                locale: {
                    format: 'YYYY-MM-DD',
                },
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
                $('#non-bundle-table').removeClass('d-none').addClass('d-block');
            } else if ($('#bundle').val() == '1') {
                $('#product-bundle-date').removeClass('d-none').addClass('d-block');
                $('#bundle-table').removeClass('d-none').addClass('d-block');
                $('#non-bundle-table').removeClass('d-block').addClass('d-none');
            }
        });
    </script>
    <script>
        var bundleItemsTemp = @json($product->bundles);
        var bundleItems = []
        var bundleItemSizes = [];
        var bundleItemKeys = [];
        bundleItemsTemp.forEach(element => {
            bundleItems.push(element.product_id)
            bundleItemSizes.push(element.size)
            bundleItemKeys.push(element.key)
        });
        $('#bundle-items').val(bundleItems);
        $('#bundle-item-sizes').val(bundleItemSizes);
        $('#bundle-item-keys').val(bundleItemKeys);
        console.log(bundleItems);
        console.log(bundleItemSizes);
        console.log(bundleItemKeys);
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function setPrice() {
            $('#bundle-item-price').val($('#bundle-item').find(":selected").data("price"))
        }

        function addItem() {
            bundleItems.push($('#bundle-item').find(":selected").val());
            bundleItemSizes.push($('#bundle-item').find(":selected").data("size"));
            bundleItemKeys.push($('#bundle-item').find(":selected").data("key"));
            $('#bundle-items').val(bundleItems);
            $('#bundle-item-sizes').val(bundleItemSizes);
            $('#bundle-item-keys').val(bundleItemKeys);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems,
                    keys: bundleItemKeys
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
            bundleItemSizes.splice(index, 1);
            bundleItemKeys.splice(index, 1);
            $('#bundle-items').val(bundleItems);
            $('#bundle-item-sizes').val(bundleItemSizes);
            $('#bundle-item-keys').val(bundleItemKeys);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems,
                    keys: bundleItemKeys
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
