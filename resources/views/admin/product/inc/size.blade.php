@foreach ($sizes as $key => $size)
    <div id="product-size-{{ $key }}" class="row">
        <div class="col-1 mb-2">{{ $loop->iteration }}.</div>
        <div class="col-3 mb-2">
            <input type="number" id="size-0{{ $key }}" class="form-control" value={{ $size[0] }}
                onkeyup="changeSize(0, {{ $key }});" />
        </div>
        <div class="col-3 mb-2">
            <input type="number" id="size-1{{ $key }}" class="form-control" value={{ $size[1] }}
                onkeyup="changeSize(1, {{ $key }});" />
        </div>
        <div class="col-4 mb-2">
            <input type="number" id="size-2{{ $key }}" class="form-control" value={{ $size[2] }}
                onkeyup="changeSize(2, {{ $key }});" />
        </div>
        <div class="col-1 mb-2">
            <span class="fa fa-fw fa-trash-alt cursor-pointer" onclick="deleteSize({{ $key }});"></span>
        </div>
    </div>
@endforeach
