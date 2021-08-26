@foreach ($refunds as $refund)
    <div class="card card-admin-transactions px-0">
        <div class="card-header">
            <div class="d-flex align-items-center gx-3">
                <div class="mx-2">
                    <input type="checkbox" name="transaction_checkbox_download{{ $transaction->id }}"
                        id="checkbox-transaction-download{{ $transaction->id }}" class="checkbox-transaction-download"
                        value={{ $transaction->id }} onclick="addDownloadToArray({{ $transaction->id }});" />
                    <span class="font-weight-bold">Dikomplain</span>
                </div>
                <div class="mx-2">
                    <span class="text-argavell">{{ $refund->transaction->order_number }}</span>
                </div>
                <div class="mx-2 px-2 border-start border-end border-2">
                    <span class="far fa-fw fa-user me-1"></span>
                    {{ $refund->name }}
                </div>
                <div class="mx-2">
                    <span
                        class="far fa-fw fa-clock me-1"></span>{{ date('j F Y, g:i a', strtotime($refund->transaction->created_at)) }}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="row">
                        <div class="col-3 col-xxl-2">
                            <img src="{{ asset('uploads/products/' . $refund->transaction->carts[0]->product->img) }}"
                                class="rounded" width="75px">
                        </div>
                        <div class="col-9 col-xxl-10">
                            <div class="row">
                                @foreach ($refund->transaction->carts as $item)
                                    <div class="col-6">
                                        <h6 class="font-weight-black">{{ $item->product->name }}</h6>
                                        <h6>{{ $item->qty }}x {{ $item->price }}</h6>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 px-4 border-start border-end border-2">
                    <p class="my-0">Address @if ($refund->transaction->is_cetak == '1')
                            <span class="btn btn-gray btn-panel p-0 px-2">Sudah dicetak</span>
                        @endif
                    </p>
                    <p class="my-0 text-secondary">{{ $refund->transaction->user->first_name }}
                        {{ $refund->transaction->user->last_name }} ({{ $refund->transaction->address->phone }})
                    </p>
                    <p class="my-0 text-secondary">{{ $refund->transaction->address->address }}</p>
                </div>
                <div class="col-4 row">
                    <div class="col-6">
                        <p class="my-0">Kurir <span class="btn btn-gray btn-panel p-0 px-2">Harus Sesuai</span></p>
                        <p class="my-0 mb-2 text-secondary">{{ $refund->transaction->shipment_name }}</p>
                    </div>
                    <div class="col-6">
                        <p class="my-0">Occasion</p>
                        @if ($refund->occasion == '0')
                            <p class="my-0 mb-2 text-secondary">Wrong Item</p>
                        @elseif ($refund->occasion == '1')
                            <p class="my-0 mb-2 text-secondary">Broken</p>
                        @endif
                    </div>
                    <div class="col-6">
                        <p class="my-0">Nomor Resi</p>
                        <p class="my-0 mb-2 text-secondary">{{ $refund->transaction->nomor_resi ?? '-' }}</p>
                    </div>
                    <div class="col-6">
                        <p class="my-0">Product Condition</p>
                        <p class="my-0 mb-2 text-secondary cursor-pointer" style="text-decoration: underline;"
                            data-bs-toggle="modal" data-bs-target="#refundPreviewModal{{ $refund->id }}"><span
                                class="fas fa-fw fa-paperclip me-2"></span>{{ $refund->condition }}</p>
                    </div>
                </div>
            </div>
            @include('admin.transaction.inc.modal.refund_image_preview')
            <div class="row justify-content-between mx-1 py-2 rounded bg-gray-light">
                <div class="col-2 text-start">
                    <span class="font-weight-bold">Total Bayar</span>
                </div>
                <div class="col-2 text-end">
                    <span class="font-weight-bold">Rp. {{ $refund->transaction->price_total }}</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center gx-3">
                <div class="ms-auto">
                    <a href="https://api.whatsapp.com/send?phone={{ $refund->user->address->phone ?? '08123456789' }}"
                        target="_blank" class="btn btn-admin-argavell text-white text-decoration-none me-2">
                        Kontak Pembeli
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if (Route::current()->getName() == 'admin.transaction.fetchdataall' || Route::current()->getName() == 'admin.transaction.fetchdatanew' || Route::current()->getName() == 'admin.transaction.fetchdataready' || Route::current()->getName() == 'admin.transaction.fetchdataondelivery' || Route::current()->getName() == 'admin.transaction.fetchdatacomplain' || Route::current()->getName() == 'admin.transaction.fetchdatadelivered' || Route::current()->getName() == 'admin.transaction.fetchdatacanceled')
    {{ $refunds->links() }}
@endif
