@foreach ($titles as $key => $title)
    @if ($title)
        <div id="product-guide-{{ $key }}" class="row">
            <div class="col-2 mb-2">
                <a target="_blank" href="{{ asset('uploads/guides') . '/' . $images[$key] }}" class="text-argavell"
                    style="text-decoration: underline;">Lihat Gambar</a>
            </div>
            <div class="col-2 mb-2">
                {{ $titles[$key] }}
            </div>
            <div class="col-6 mb-2 mx-2">
                {!! $descriptions[$key] !!}
            </div>
            <div class="col-1 mb-2">
                <span class="fa fa-fw fa-trash-alt cursor-pointer" onclick="deleteGuide({{ $key }});"></span>
            </div>
        </div>
    @endif
@endforeach
