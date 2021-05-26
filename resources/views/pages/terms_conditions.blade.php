@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <h1 class="text-argavell font-bauer font-weight-bold">Terms & Conditions</h1>
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
            <h1 class="text-argavell font-bauer font-weight-bold text-4xl">Terms & Conditions</h1>
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
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Intellectual
                    Property Rights
                </h2>
                <div class="ms-5">Other than the content you own, under these Terms, Argavell and/or its licensors own all
                    the
                    intellectual
                    property rights and materials
                    contained in this Website. You are granted limited license only for purposes of viewing the material
                    contained on this Website.</div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Restrictions
                </h2>
                <div class="ms-5 mb-2">You are specifically restricted from all of the following: publishing any Website
                    material in any other media; selling, sublicensing and/or
                    otherwise commercializing any Website material; publicly performing and/or showing any Website material;
                    using this Website in any
                    way that is or may be damaging to this Website; using this Website in any way that impacts user access
                    to
                    this Website; using this
                    Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to
                    any
                    person or business entity;
                    engaging in any data mining, data harvesting, data extracting or any other similar activity in relation
                    to
                    this Website; using this Website
                    to engage in any advertising or marketing.</div>
                <div class="ms-5">Certain areas of this Website are restricted from being access by you and Argavell may
                    further
                    restrict access by you to any areas of
                    this Website, at any time, in absolute discretion. Any user ID and password you may have for this
                    Website
                    are confidential and you
                    must maintain confidentiality as well.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Your Content
                </h2>
                <div class="ms-5">In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video
                    text, images or other material you
                    choose to display on this Website. By displaying Your Content, you grant Argavell a non-exclusive,
                    worldwide irrevocable, sub
                    licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                    Your Content must be your own and
                    must not be invading any third-party’s rights. Argavell reserves the right to remove any of Your Content
                    from this Website at any time
                    without notice.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Limitation of Liability
                </h2>
                <div class="ms-5">In no event shall Argavell, nor any of its officers, directors and employees, shall be
                    held liable for anything arising out of or in any way
                    connected with your use of this Website whether such liability is under contract. Argavell, including
                    its officers, directors and
                    employees shall not be held liable for any indirect, consequential or special liability arising out of
                    or in any way related to your use of
                    this Website.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Indemnification
                </h2>
                <div class="ms-5">You hereby indemnify to the fullest extent Argavell from and against any and/or all
                    liabilities, costs, demands, causes of action,
                    damages and expenses arising in any way related to your breach of any of the provisions of these Terms.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Severability
                </h2>
                <div class="ms-5">If any provision of these Terms is found to be invalid under any applicable law, such
                    provisions shall be deleted without affecting the
                    remaining provisions herein.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Variation of Terms
                </h2>
                <div class="ms-5">Argavell is permitted to revise these Terms at any time as it sees fit, and by using this
                    Website you are expected to review these Terms
                    on a regular basis.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Entire Agreement
                </h2>
                <div class="ms-5">These Terms constitute the entire agreement between Argavell and you in relation to your
                    use of this Website, and supersede all prior
                    agreements and understandings.
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-argavell font-bauer font-weight-bold">
                    <span class="fa fa-fw fa-tint me-2"></span>Governing Law & Jurisdiction
                </h2>
                <div class="ms-5">These Terms will be governed by and interpreted in accordance with the laws of the State
                    of id, and you submit to the non-exclusive
                    jurisdiction of the state and federal courts located in id for the resolution of any disputes.
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
