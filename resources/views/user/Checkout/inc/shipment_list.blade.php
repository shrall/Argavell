@foreach ($shipments['costs'] as $shipment)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="shipping_method" data-order={{ $loop->iteration }}
            value="{{ $shipments['name'] }} - {{ $shipment['service'] }}" onchange="refreshSummary();"
            id="shipping_radio_{{ $loop->iteration }}" @if ($loop->iteration == 1) checked @endif>
        <input class="form-check-input" type="hidden" name="shipping_etd" value="{{ $shipment['cost'][0]['etd'] }}">
        <label class="form-check-label" for="shipping_radio_{{ $loop->iteration }}">
            <span class="font-weight-bold">{{ $shipment['description'] }} -
                {{ $shipment['service'] }}</span> : IDR <span
                id="shipping_cost_{{ $loop->iteration }}">{{ $shipment['cost'][0]['value'] }}</span>
        </label>
    </div>
@endforeach
