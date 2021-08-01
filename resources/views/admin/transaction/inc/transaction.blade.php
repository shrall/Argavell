@foreach ($transactions as $transaction)
    <div class="card card-admin-transactions px-0">
        <div class="card-header">
            <div class="d-flex align-items-center gx-3">
                <div class="mx-2">
                    <input type="checkbox" />
                    <span class="font-weight-bold ms-2">Pesanan Baru</span>
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
                        class="far fa-fw fa-clock me-1"></span>{{ date('j F Y, g:i a', strtotime($transaction->updated_at)) }}
                </div>
                <div class="ms-auto">
                    <span class="me-2">Batas Respon</span>
                    <a href="#" class="btn btn-warning btn-panel text-white text-decoration-none">
                        <span class="far fa-fw fa-clock me-1"></span>24 Jam
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="row">
                        <div class="col-3 col-xxl-2"><img src="{{ asset('products/argan-oil.jpg') }}" class="rounded"
                                width="75px">
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
                    <p class="my-0">Address <span class="btn btn-gray btn-panel p-0 px-2">Sudah dicetak</span></p>
                    <p class="my-0 text-secondary">{{ $transaction->user->first_name }}
                        {{ $transaction->user->last_name }} ({{ $transaction->address->phone }})
                    </p>
                    <p class="my-0 text-secondary">{{ $transaction->address->address }}</p>
                </div>
                <div class="col-3">
                    <div class="my-2">
                        <p class="my-0">Kurir <span class="btn btn-gray btn-panel p-0 px-2">Harus Sesuai</span></p>
                        <p class="my-0 text-secondary">{{ $transaction->shipment_name }}</p>
                    </div>
                    <div class="my-2">
                        <p class="my-0">Nomor Resi</p>
                        <input type="text" name="" id="" class="form-control" placeholder="Ketik Nomor Resi Disini">
                    </div>
                </div>
            </div>
            <div class="row justify-content-between mx-1 py-2 rounded bg-gray-light">
                <div class="col-1">
                    <span class="font-weight-bold">Total Bayar</span>
                </div>
                <div class="col-1">
                    <span class="font-weight-bold">Rp. {{$transaction->price_total}}</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center gx-3">
                <div class="mx-2">
                    <a href="#" class="text-secondary text-decoration-none">
                        <span class="far fa-fw fa-comment-dots me-1"></span>Tanya Pembeli
                    </a>
                </div>
                <div class="ms-auto">
                    <button type="submit" class="btn btn-danger text-white text-decoration-none me-2">
                        Tolak Pesanan
                    </button>
                    <button type="submit" class="btn btn-admin-argavell text-white text-decoration-none ms-2">
                        Terima Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{ $transactions->links() }}
{{-- <div class="card card-admin-transactions px-0">
    <div class="card-header">
        <div class="d-flex align-items-center gx-3">
            <div class="mx-2">
                <input type="checkbox" />
                <span class="font-weight-bold ms-2">Pesanan Baru</span>
            </div>
            <div class="mx-2">
                <span class="text-argavell">INV902183812038123</span>
            </div>
            <div class="mx-2 px-2 border-start border-end border-2">
                <span class="far fa-fw fa-user me-1"></span>
                John Doe
            </div>
            <div class="mx-2">
                <span class="far fa-fw fa-clock me-1"></span>02 June 2021, 10:00 AM
            </div>
            <div class="ms-auto">
                <span class="me-2">Batas Respon</span>
                <a href="#" class="btn btn-warning btn-panel text-white text-decoration-none">
                    <span class="far fa-fw fa-clock me-1"></span>24 Jam
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-5">
                <div class="row">
                    <div class="col-3 col-xxl-2"><img src="{{ asset('products/argan-oil.jpg') }}" class="rounded"
                            width="75px">
                    </div>
                    <div class="col-9 col-xxl-10">
                        <h6 class="font-weight-black">Argavell Certified Unrefined Argan Oil 20 ml - sourced from
                            Morocco</h6>
                        <h6>1 x 130.000</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 px-4 border-start border-end border-2">
                <p class="my-0">Address <span class="btn btn-gray btn-panel p-0 px-2">Sudah dicetak</span></p>
                <p class="my-0 text-secondary">John Doe (08391238123)</p>
                <p class="my-0 text-secondary">Jl. Lorem ipsum Blok A No 1
                    Surabaya, Jawa Timur
                    Indonesia 123123</p>
            </div>
            <div class="col-3">
                <div class="my-2">
                    <p class="my-0">Kurir <span class="btn btn-gray btn-panel p-0 px-2">Harus Sesuai</span></p>
                    <p class="my-0 text-secondary">Regular - JNE</p>
                </div>
                <div class="my-2">
                    <p class="my-0">Nomor Resi</p>
                    <p class="my-0 text-secondary">10938102831092831</p>
                </div>
                <div class="my-2">
                    <p class="my-0">No. Resi</p>
                    <input type="text" name="" id="" class="form-control" placeholder="Ketik nomor resi disini">
                </div>
            </div>
        </div>
        <div class="row justify-content-between mx-1 py-2 rounded bg-gray-light">
            <div class="col-1">
                <span class="font-weight-bold">Total Bayar</span>
            </div>
            <div class="col-1">
                <span class="font-weight-bold">Rp. 178.000</span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex align-items-center gx-3">
            <div class="mx-2">
                <a href="#" class="text-secondary text-decoration-none">
                    <span class="far fa-fw fa-comment-dots me-1"></span>Tanya Pembeli
                </a>
            </div>
            <div class="mx-2">
                <a href="#" class="text-secondary text-decoration-none">
                    <span class="fa fa-fw fa-clipboard-list me-1"></span>Status Pesanan
                </a>
            </div>
            <div class="mx-2 position-relative">
                <span
                    class="far fa-fw fa-edit position-absolute top-50 start-0 translate-middle-y ps-3 fs-6 text-secondary"></span>
                <input type="text" name="" id="" class="form-control ps-5" placeholder="Ketik Catatan toko disini">
            </div>
            <div class="ms-auto">
                <button type="submit" class="btn btn-admin-argavell text-white text-decoration-none">
                    Terima Pesanan
                </button>
            </div>
        </div>
    </div>
</div> --}}
