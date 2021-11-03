@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img width="100px" src='https://github.com/shrall/datasets/raw/main/images/logo-argavell.png' />
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        <center style="margin-top: 4px; margin-bottom: 4px;">
            <a target="_blank" href="https://www.instagram.com/argavell.id/" style="">
                <img src="https://github.com/shrall/datasets/raw/main/images/argavell-ig.png" width="50px">
            </a>
            <a target="_blank" href="mailto:hello@argavell.id" style="">
                <img src="https://github.com/shrall/datasets/raw/main/images/argavell-email.png" width="50px">
            </a>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=6282143211310" style="">
                <img src="https://github.com/shrall/datasets/raw/main/images/argavell-wa.png" width="50px">
            </a>
        </center>
            {{ config('app.name') }} © {{ date('Y') }} @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
