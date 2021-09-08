@extends('layouts.admin')

@section('content')
    <div class="row justify-content-between mb-4">
        <div class="col-2">
            <a href="{{ route('admin.voucher.index') }}" class="btn btn-argavell-light"><span
                    class="fa fa-fw fa-arrow-left mr-2"></span>Kembali</a>
        </div>
        <div class="col-8 text-center align-middle">
            <h4 class="text-argavell font-weight-black">Detail Voucher</h4>
        </div>
        <div class="col-2"></div>
    </div>
    <form action="{{ route('admin.voucher.update', $voucher->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Title</label>
                            <div class="col-12">
                                <input id="title" type="text" class="form-control" name="title" required
                                    placeholder="Judul Voucher" required value="{{ $voucher->title }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Code</label>
                            <div class="col-12">
                                <input id="code" type="text" class="form-control" name="code" required
                                    placeholder="Kode Voucher" required value="{{ $voucher->code }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Expired Date</label>
                            <label class="col-6 text-start font-weight-bold">Minimum Charge</label>
                            <div class="col-6">
                                <input type="date" name="expired_date" id="expired-date" class="form-control"
                                    onchange="console.log(this.value)"
                                    value="{{ date('Y-m-d', strtotime($voucher->expired_date)) }}">
                            </div>
                            <div class="col-6">
                                <input type="number" name="minimum_charge" id="minimum_charge" class="form-control" required
                                    value="{{ $voucher->minimum_charge }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Gambar</label>
                            <div class="col-12 d-none" id="image-upload-button">
                                <div class="btn btn-admin-argavell">
                                    <label for="image" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*"
                                        onchange="loadFile(event)">
                                </div>
                            </div>
                            <div class="col-12 text-argavell d-flex align-items-center">
                                <div id="image-upload-preview" class="cursor-pointer" style="text-decoration: underline;"
                                    data-bs-toggle="modal" data-bs-target="#voucherPreviewModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>{{ $voucher->img }}</div>
                                <span class="d-block far fa-fw fa-times-circle cursor-pointer ms-2" id="delete-image-button"
                                    onclick="deleteImage();"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-argavell d-flex align-items-center">
                    <div id="image-upload-preview" class="cursor-pointer" style="text-decoration: underline;"
                        data-bs-toggle="modal" data-bs-target="#voucherPreviewModal"></div>
                </div>
                @include('admin.voucher.inc.modal.voucher_image_preview')
            </div>
            <div class="col-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Syarat & Ketentuan</label>
                            <div class="col-12">
                                <textarea id="tnc" type="textarea" class="form-control" name="tnc" required
                                    placeholder="Syarat & Ketentuan Voucher"
                                    style="resize: none;min-height:150px;">{{ $voucher->tnc }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-gray w-100" onclick="event.preventDefault();
                                    document.getElementById('delete-voucher-form').submit();">Hapus</button>
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
    <form action="{{ route('admin.voucher.destroy', $voucher->id) }}" id="delete-voucher-form" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection

@section('scripts')
    <script>
        var loadFile = function(event) {
            $('.voucher-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            $('#image-upload-preview').html('<span class="fas fa-fw fa-paperclip me-2"></span>' + event.target.files[0][
                'name'
            ])
            $('#image-upload-button').removeClass('d-block').addClass('d-none');
            $('#image-upload-preview').removeClass('d-none').addClass('d-block');
            $('#delete-image-button').removeClass('d-none').addClass('d-block');
        };
    </script>
    <script>
        function deleteImage() {
            $('.voucher-image-preview').attr('src', null);
            $('#image').val(null);
            $('#image-upload-button').removeClass('d-none').addClass('d-block');
            $('#image-upload-preview').removeClass('d-block').addClass('d-none');
            $('#delete-image-button').removeClass('d-block').addClass('d-none');
        }
    </script>
@endsection
