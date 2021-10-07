@foreach ($transactions as $transaction)
    <div class="card card-admin-transactions px-0">
        <div class="card-header">
            <div class="d-flex align-items-center gx-3">
                <div class="mx-2">
                    @if ($transaction->status == '0')
                        <input type="checkbox" name="transaction_checkbox_download{{ $transaction->id }}"
                            id="checkbox-transaction-download{{ $transaction->id }}"
                            class="checkbox-transaction-download" value={{ $transaction->id }}
                            onclick="addDownloadToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold">Menunggu Pembayaran</span>
                    @elseif ($transaction->status == '1')
                        <input type="checkbox" name="transaction_checkbox_download{{ $transaction->id }}"
                            id="checkbox-transaction-download{{ $transaction->id }}"
                            class="checkbox-transaction-download" value={{ $transaction->id }}
                            onclick="addDownloadToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold">Pesanan Selesai</span>
                    @elseif ($transaction->status == '2')
                        <input type="checkbox" name="transaction_checkbox_download{{ $transaction->id }}"
                            id="checkbox-transaction-download{{ $transaction->id }}"
                            class="checkbox-transaction-download" value={{ $transaction->id }}
                            onclick="addDownloadToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold">Dibatalkan</span>
                    @elseif ($transaction->status == '3')
                        <input type="checkbox" name="transaction_checkbox_download{{ $transaction->id }}"
                            id="checkbox-transaction-download{{ $transaction->id }}"
                            class="checkbox-transaction-download" value={{ $transaction->id }}
                            onclick="addDownloadToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold">Dalam Pengiriman</span>
                    @elseif ($transaction->status == '4')
                        <input type="checkbox" name="transaction_checkbox_accept{{ $transaction->id }}"
                            id="checkbox-transaction-accept{{ $transaction->id }}"
                            class="checkbox-transaction-accept" value={{ $transaction->id }}
                            onclick="addAcceptToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold ms-2">Pesanan Baru</span>
                    @elseif ($transaction->status == '5')
                        <input type="checkbox" name="transaction_checkbox_label{{ $transaction->id }}"
                            id="checkbox-transaction-label{{ $transaction->id }}" class="checkbox-transaction-label"
                            value={{ $transaction->id }} onclick="addLabelToArray({{ $transaction->id }});" />
                        <span class="font-weight-bold ms-2">Siap Dikirim</span>
                    @endif
                </div>
                <div class="mx-2">
                    <span class="text-argavell">{{ $transaction->order_number }}</span>
                </div>
                <div class="mx-2 px-2 border-start border-end border-2">
                    <span class="far fa-fw fa-user me-1"></span>
                    {{ $transaction->user->first_name }} {{ $transaction->user->last_name }}
                </div>
                <div class="mx-2">
                    <span
                        class="far fa-fw fa-clock me-1"></span>{{ date('j F Y, g:i a', strtotime($transaction->created_at)) }}
                </div>
                <div class="ms-auto @if ($transaction->status != '4') invisible @endif">
                    <span class="me-2">Batas Respon</span>
                    <a href="#" class="btn btn-warning btn-panel text-white text-decoration-none">
                        <span
                            class="far fa-fw fa-clock me-1"></span>{{ round((strtotime($transaction->updated_at . ' +1 day') - strtotime(\Carbon\Carbon::now())) / 60 / 60) }}
                        Jam
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="row">
                        <div class="col-3 col-xxl-2">
                            <img src="{{ asset('uploads/products/' . $transaction->carts[0]->product->img) }}"
                                class="rounded" width="75px">
                        </div>
                        <div class="col-9 col-xxl-10">
                            <div class="row">
                                @foreach ($transaction->carts as $item)
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
                    <p class="my-0">Address @if ($transaction->is_cetak == '1')<span
                                class="btn btn-gray btn-panel p-0 px-2">Sudah dicetak</span> @endif
                    </p>
                    <p class="my-0 text-secondary">{{ $transaction->user->first_name }}
                        {{ $transaction->user->last_name }} ({{ $transaction->address->phone }})
                    </p>
                    <p class="my-0 text-secondary">{{ $transaction->address->address }}</p>
                </div>
                <div class="col-3">
                    <div class="my-2">
                        <p class="my-0">Kurir <span class="btn btn-gray btn-panel p-0 px-2">Harus
                                Sesuai</span></p>
                        <p class="my-0 text-secondary">{{ $transaction->shipment_name }}</p>
                    </div>
                    @if ($transaction->status != '0')
                        <div class="my-2">
                            <p class="my-0">Nomor Resi</p>
                            <form action="{{ route('admin.transaction.store') }}"
                                id="form-send-transaction-{{ $transaction->id }}" method="post">
                                @csrf
                                <input type="hidden" name="transaction_id[]"
                                    id="input-transaction-send{{ $transaction->id }}"
                                    value="{{ $transaction->id }}">
                                <input type="hidden" name="input_method" value="send">
                                <input type="text" name="resi" id="input-resi{{ $loop->iteration }}"
                                    class="form-control" placeholder="Ketik Nomor Resi Disini"
                                    value="{{ $transaction->nomor_resi ?? null }}" @if ($transaction->status != '5') disabled @endif>
                            </form>
                            @if ($transaction->status == 0 || $transaction->status == 4)
                                <p class="my-0 text-danger fst-italic">*Terima pesanan terlebih dahulu</p>
                            @endif
                        </div>
                    @else
                        <div class="my-2">
                            <p class="my-0">Bukti Pembayaran</p>
                            <form action="{{ route('admin.transaction.store') }}"
                                id="form-waiting-transaction-{{ $transaction->id }}" method="post">
                                @csrf
                                <input type="hidden" name="transaction_id[]"
                                    id="input-transaction-waiting{{ $transaction->id }}"
                                    value="{{ $transaction->id }}">
                                <input type="hidden" name="input_method" value="waiting">
                            </form>
                            @if (count($transaction->proofs) > 0)
                                @foreach ($transaction->proofs as $proof)
                                    <p class="my-0 text-argavell">
                                        <span class="fa fa-fw fa-paperclip"></span>
                                        <a class="text-argavell-link" target="_blank"
                                            href="{{ asset('payment/' . $proof->payment_file) }}">{{ $proof->payment_file }}</a>
                                    </p>
                                @endforeach
                            @else
                                <p class="my-0 text-secondary">Belum ada bukti pembayaran.</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <div class="row justify-content-between mx-1 py-2 rounded bg-gray-light">
                <div class="col-2 text-start">
                    <span class="font-weight-bold">Total Bayar</span>
                </div>
                <div class="col-2 text-end">
                    <span class="font-weight-bold">Rp. {{ $transaction->price_total }}</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center gx-3">
                <div class="mx-2">
                    <a href="https://api.whatsapp.com/send?phone={{ $refund->user->address->phone ?? '#' }}"
                        class="text-secondary text-decoration-none">
                        <span class="far fa-fw fa-comment-dots me-1"></span>Tanya Pembeli
                    </a>
                </div>
                <div class="ms-auto">
                    @if ($transaction->status == '4')
                        <button class="btn btn-danger text-white text-decoration-none me-2" data-bs-toggle="modal"
                            data-bs-target="#cancelModal{{ $transaction->id }}">
                            Tolak Pesanan
                        </button>
                        @include('admin.transaction.inc.modal.cancel')
                    @endif
                    @if ($transaction->status == '4')
                        <button class="btn btn-admin-argavell text-white text-decoration-none ms-2"
                            data-bs-toggle="modal" data-bs-target="#acceptModal{{ $transaction->id }}">
                            Terima Pesanan
                        </button>
                        @include('admin.transaction.inc.modal.accept')
                    @elseif ($transaction->status == '5')
                        <button class="btn btn-admin-argavell text-white text-decoration-none ms-2" onclick="event.preventDefault();
                            document.getElementById('form-send-transaction-{{ $transaction->id }}').submit();">
                            Kirim Pesanan
                        </button>
                    @elseif ($transaction->status == '0')
                        <button class="btn btn-admin-argavell text-white text-decoration-none ms-2"
                            @if (count($transaction->proofs) <= 0) disabled @endif
                            onclick="event.preventDefault();
                                document.getElementById('form-waiting-transaction-{{ $transaction->id }}').submit();">
                            Kirim Pesanan
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@if (Route::current()->getName() == 'admin.transaction.index' || Route::current()->getName() == 'admin.transaction.fetchdataall' || Route::current()->getName() == 'admin.transaction.fetchdatawaiting' || Route::current()->getName() == 'admin.transaction.fetchdatanew' || Route::current()->getName() == 'admin.transaction.fetchdataready' || Route::current()->getName() == 'admin.transaction.fetchdataondelivery' || Route::current()->getName() == 'admin.transaction.fetchdatacomplain' || Route::current()->getName() == 'admin.transaction.fetchdatadelivered' || Route::current()->getName() == 'admin.transaction.fetchdatacanceled')
    {{ $transactions->links() }}
@endif
