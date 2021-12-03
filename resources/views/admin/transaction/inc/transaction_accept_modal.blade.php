@foreach ($transactions as $transaction)
    <div class="col-12">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('uploads/products/' . $transaction->carts[0]->product->img) }}" class="rounded"
                    width="75px">
            </div>
            <div class="col-9">
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
@endforeach
