@foreach ($titles as $key => $title)
    @if ($title)
        <div id="product-benefit-{{ $key }}" class="row">
            <div class="col-2 mb-2">
                <a target="_blank" href="{{ asset('uploads/benefits') . '/' . $banners[$key] }}" class="text-argavell"
                    style="text-decoration: underline;">Lihat Gambar</a>
            </div>
            <div class="col-2 mb-2">
                <a target="_blank" href="{{ asset('uploads/benefits') . '/' . $images[$key] }}" class="text-argavell"
                    style="text-decoration: underline;">Lihat Gambar</a>
            </div>
            <div class="col-2 mb-2">
                {{ $titles[$key] }}
            </div>
            <div class="col-4 mb-2 mx-2">
                {!! $descriptions[$key] !!}
            </div>
            <div class="col-1 mb-2">
                <span class="fa fa-fw fa-trash-alt cursor-pointer" onclick="deleteBenefit({{ $key }});"></span>
            </div>
        </div>
    @endif
@endforeach
