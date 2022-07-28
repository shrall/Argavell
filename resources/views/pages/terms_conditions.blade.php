@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <h1 class="text-argavell font-elmessiri font-weight-bold">Terms & Conditions</h1>
            <div class="pe-4 mb-2">These Website Standard Terms and Conditions written on this webpage shall
                manage your use of our website, Argavell accessible at https://argavell.id/.
            </div>
            <div class="pe-4">These Terms will be applied fully and affect to your use of this Website. By
                using this Website, you agreed to accept all terms and conditions written in
                here. You must not use this Website if you disagree with any of these Website
                Standard Terms and Conditions. Minors or people below 18 years old are not
                allowed to use this Website.
            </div>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/terms-and-conditions.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile header --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 py-4">
            <img src="{{ asset('images/terms-and-conditions.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <h1 class="text-argavell font-elmessiri font-weight-bold text-4xl">Terms & Conditions</h1>
            <div class="px-2 mb-2 text-start">These Website Standard Terms and Conditions written on this webpage shall
                manage your use of our website, Argavell accessible at https://argavell.id/.
            </div>
            <div class="px-2 text-start">These Terms will be applied fully and affect to your use of this Website. By
                using this Website, you agreed to accept all terms and conditions written in
                here. You must not use this Website if you disagree with any of these Website
                Standard Terms and Conditions. Minors or people below 18 years old are not
                allowed to use this Website.
            </div>
        </div>
    </div>

    <div class="row w-100 m-0 p-0 py-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="mb-4">
                @foreach ($tncs as $tnc)
                    <div class="mb-4">
                        <h2 class="text-argavell font-elmessiri font-weight-bold">
                            <span class="fa fa-fw fa-tint me-2"></span>{{ $tnc->title }}
                        </h2>
                        <div class="ms-5">
                            {{ $tnc->content }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-2"></div>
        </div>
    @endsection
