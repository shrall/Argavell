@component('mail::message')
    <div class="card-header" style="padding-top: 32px; padding-left: 32px; padding-right: 32px;">
        <img src="https://github.com/shrall/datasets/raw/main/images/argavell-email-header.png" width="420px">
        <p class="invoice-number">Invoice Number {{$transaction->order_number}}</p>
    </div>
    <div class="card-body" style="color: black; padding-left: 32px; padding-right: 32px;">
        <p class="hello" style="line-height: 1.2;font-size:12px; margin-top:8px; margin-bottom:1em;"><span class="font-weight-medium" style="font-weight: 700;">Hello, man! Thank you for
                ordering our product.</span> Please
            confirm the payment immediately so that we can process the order.</p>
        <div class="order-summary" style="margin-left: 20px; margin-bottom:1em;">
            <p style="font-weight: 700; text-decoration: underline; margin-bottom: 0;font-size:12px;">YOUR ORDER SUMMARY</p>
            <table>
                <tr>
                    <td style="font-size:12px;">Invoice Number</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{$transaction->order_number}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;">Order Date</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">{{date("j F Y",strtotime($transaction->created_at))}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;">Order Total</td>
                    <td style="font-size:12px;">:</td>
                    <td style="font-size:12px;">Rp. {{number_format($transaction->price_total, 0, ',', '.')}}</td>
                </tr>
            </table>
        </div>
        <p class="hello" style="font-size:12px;line-height: 1.2;">Don't forget to copy your invoice number above when making payment confirmation on the
            website. Thank you for your attention.</p>
        @component('mail::button', ['url' => $url ?? '#'])
            Confirm Payment Now
        @endcomponent
    </div>
    <div class="card-footer"
        style="color:white; background-color: #bb9164; padding-left: 32px; padding-right: 32px; padding-top:24px; padding-bottom:24px; border-radius: 0 0 24px 24px;">
        <p style="font-weight:700; margin-bottom:2px;">What is Argavell?</p>
        <p style="line-height: 1; font-size:12px; margin-bottom:4px;">Our brand focuses on <span style="font-weight:700;">Argan Oil-based product</span>, since Argan Oil is renowned
            to be very gentle on sensitive & allergic skins, nourishing, very hydrating due to its <span
                style="font-weight: 700;">high vitamin E & fatty acids content.</span></p>
        <p style="line-height: 1; font-size:12px;">You can access Winged Savior with any device by going to <span style="font-weight: 700; text-decoration: underline;color:#ffffff !important;">www.argavell.id</span></p>
    </div>
@endcomponent
