@extends('layouts.app')

@section('content')
    <div class="row w-100 m-0 p-0 py-5 align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="w-100 product-detail" style="background-image: url({{ asset('images/argan-oil.jpg') }})"></div>
        </div>
        <div class="col-md-5 ps-5">
            <h1 class="text-argavell font-bauer font-weight-bold">Argan Oil</h1>
            <h2 class="text-argavell font-proxima-nova mb-4">IDR 130.000</h2>
            <p class="font-proxima-nova font-weight-bold">Description</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p class="font-proxima-nova font-weight-bold">Argavell Facts</p>
            <ul class="list-unstyled">
                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Suitable for Sensitive Skin</li>
                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Dermatologist Tested</li>
                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Non-Comedogenic Certified</li>
            </ul>
            <div class="row mb-3">
                <div class="col-md-8">
                    <p class="font-proxima-nova font-weight-bold">Size</p>
                    <select class="form-select border-argavell font-proxima-nova font-weight-bold" id="size" name="size">
                        <option value="20">20 ml</option>
                        <option value="30">30 ml</option>
                        <option value="40">40 ml</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <p class="font-proxima-nova font-weight-bold">Quantity</p>
                    <div class="d-flex align-items-center fs-2">
                        <span class="col-md-4 far fa-fw fa-minus-square text-argavell cursor-pointer ps-0 quantity-button"
                            id="minusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                            onclick="addQuantity()"></span>
                        <div class="col-md-4 font-proxima-nova text-argavell text-center ps-0 fs-4" id="quantity-counter">0
                        </div>
                        <span class="col-md-4 far fa-fw fa-plus-square text-argavell cursor-pointer ps-0 quantity-button"
                            id="plusQuantity" onmouseover="overQuantity(this)" onmouseout="outQuantity(this)"
                            onclick="addQuantity()"></span>
                        <input type="hidden" name="quantity" id="quantity" value=0>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <div class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer">Add to Cart</div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row pb-5 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card border-0">
                <ul class="nav nav-products nav-fill" id="detailTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-bauer fs-3" id="how-to-use-tab" data-bs-toggle="tab"
                            data-bs-target="#how-to-use" type="button" role="tab" aria-controls="how-to-use"
                            aria-selected="true">How To Use</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-bauer fs-3" id="ingredients-tab" data-bs-toggle="tab"
                            data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                            aria-selected="false">Ingredients</button>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="how-to-use" role="tabpanel" aria-labelledby="how-to-use-tab">
                            <p class="font-proxima-nova font-weight-bold">HOW TO USE ARGAN OIL</p>
                            <ul class="list-unstyled">
                                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Suitable for Sensitive Skin
                                </li>
                                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Dermatologist Tested</li>
                                <li><span class="fa fa-fw fa-tint text-argavell me-2"></span>Non-Comedogenic Certified</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">Contrary to
                            popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                            Latin literature from 45 BC.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 p-0 m-0 mb-5">
        <img src="{{ asset('images/argan-product-details.jpg') }}" class="w-100 p-0">
    </div>

    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        <h1 class="text-argavell font-bauer font-weight-bold text-center">Let's Take Our Bundle of Love</h1>
        <span class="mb-5 text-center text-secondary">Buy the bundle with special price</span>
        <div class="row gap-3 justify-content-md-center">
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo.jpg') }})">
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN OIL + ARGAN SHAMPOO</div>
                    <div class="font-gotham"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <div class="landing-product position-relative w-100 mb-3"
                    style="background-image: url({{ asset('images/argan-oil-argan-shampoo-argan-kids-shampoo.jpg') }})">
                    <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                </div>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">ARGAN OIL + ARGAN SHAMPOO + ARGAN KIDS SHAMPOO</div>
                    <div class="font-gotham"><del class="text-secondary">IDR 130.000</del><span
                            class="text-danger font-weight-bold ms-2">IDR 130.000</span></div>
                </div>
                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">Add to Cart</div>
            </div>
        </div>
    </div>
    <script>
        function overQuantity(button) {
            $(button).removeClass('far');
            $(button).addClass('fa');
        }

        function outQuantity(button) {
            $(button).removeClass('fa');
            $(button).addClass('far');
        }

        function addQuantity() {
            $('#quantity-counter').html(parseInt($('#quantity-counter').html()) + 1);
            $('#quantity').get(0).value++
            console.log($('#quantity').val())
        }

    </script>
    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#detailTab a'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })

    </script>
@endsection
