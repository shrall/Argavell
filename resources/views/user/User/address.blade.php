@extends('layouts.app')

@section('content')
    @include('user.User.inc.header')
    <div class="row w-100 m-0 p-0">
        <div class="col-md-2"></div>
        <div class="col-md-2 px-5 d-none d-sm-block">
            @include('user.User.inc.sidebar')
        </div>
        <div class="col-md-6">
            <div class="row w-100 mx-0 my-4 p-0 align-items-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('Success'))
                    <div class="alert alert-success">
                        <ul class="mb-0 list-unstyled">
                            <li>{{ session('Success') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session('Error'))
                    <div class="alert alert-danger">
                        <ul class="mb-0 list-unstyled">
                            <li>{{ session('Error') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 text-center">
                    <div class="d-none d-sm-flex justify-content-between align-items-center bg-light px-3 py-2 rounded">
                        <div class="text-start">
                            <p class="my-0 font-weight-bold fs-3">Manage Your Address</p>
                            <p class="my-0">Add or delete your addresses right here.</p>
                        </div>
                        <div class="btn-argavell text-center w-25 m-0 py-2 cursor-pointer border-0" data-bs-toggle="modal"
                            data-bs-target="#addressModal">Add New Address</div>
                    </div>
                    <div class="d-block d-sm-none bg-light rounded px-3 py-2 text-center">
                        <p class="my-0 font-weight-bold fs-3">Manage Your Address</p>
                        <p class="my-0 text-secondary">Add or delete your addresses right here.</p>
                        <div class="btn-argavell text-center w-50 mx-auto my-2 py-2 cursor-pointer border-0"
                            data-bs-toggle="modal" data-bs-target="#addressModal">Add New Address</div>
                    </div>
                    <div class="my-4 text-start">
                        <form action="{{ route('user.user.store') }}" method="post">
                            @csrf
                            @foreach ($addresses as $address)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="address" value="{{ $address->id }}"
                                        id="radio_address_{{ $address->id }}" @if (Auth::user()->address_id == $address->id) checked @endif>
                                    <div class="row m-0 p-0 ms-2">
                                        <div class="col-3 p-0 text-start">
                                            <p class="my-0 font-weight-bold">{{ $address->first_name }}
                                                {{ $address->last_name }}</p>
                                            <p class="my-0 text-secondary">{{ $address->phone }}</p>
                                            <a href="#" class="text-argavell" data-bs-toggle="modal"
                                                data-bs-target="#addressEditModal{{ $address->id }}">Edit</a>
                                        </div>
                                        <div class="col-4 p-0 text-start d-none d-sm-block">
                                            <p class="my-0 font-weight-bold">{{ $address->address_type }}</p>
                                            <p class="my-0 text-secondary">{{ $address->address }} </p>
                                        </div>
                                        <div class="col-4 p-0 text-start d-none d-sm-block">
                                            <p class="my-0 font-weight-bold">{{ $address->city }}</p>
                                            <p class="my-0 text-secondary">{{ $address->province }},
                                                {{ $address->postal_code }}
                                            </p>
                                        </div>
                                        <div class="col-7 ms-3 p-0 text-start d-block d-sm-none">
                                            <p class="my-0 font-weight-bold">{{ $address->address_type }}</p>
                                            <p class="my-0 text-secondary">{{ $address->address }} </p>
                                            <p class="my-0 font-weight-bold">{{ $address->city }}</p>
                                            <p class="my-0 text-secondary">{{ $address->province }},
                                                {{ $address->postal_code }}
                                            </p>
                                        </div>
                                        <div class="col-1 p-0 text-end">
                                            <span class="fa fa-fw fa-trash-alt text-secondary cursor-pointer"
                                                onclick="event.preventDefault();
                                                                                    document.getElementById('delete-address-form-{{ $address->id }}').submit();"></span>
                                        </div>
                                    </div>
                                    @if ($loop->iteration != $addresses->count())
                                        <hr>
                                    @endif
                                </div>
                            @endforeach
                            <button type="submit"
                                class="btn-argavell text-center w-50 my-4 py-2 cursor-pointer border-0">Change
                                Address</button>
                        </form>
                        @foreach ($addresses as $address)
                            <form action="{{ route('user.address.destroy', $address->id) }}"
                                id="delete-address-form-{{ $address->id }}" class="d-none" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    @foreach ($addresses as $address)
        <div class="modal fade" id="addressEditModal{{ $address->id }}" tabindex="-1"
            aria-labelledby="addressEditModalLabel" aria-hidden="true">
            <form action="{{ route('user.address.update', $address->id) }}" method="post">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0 justify-content-center position-relative">
                            <h5 class="modal-title text-center text-argavell font-bauer text-4xl"
                                id="addressEditModalLabel">
                                <img src="{{ asset('images/argan-fruit.png') }}" width="75px">Add New Address
                            </h5>
                            <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                                style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"
                                aria-label="Close"></span>
                        </div>
                        <div class="modal-body font-proxima-nova px-5">
                            <div class="row">
                                <div class="col-6">
                                    <label for="first_name" class="col-form-label font-weight-bold">First Name<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-6">
                                    <label for="last_name" class="col-form-label font-weight-bold">Last Name<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter your first name" value="{{ $address->first_name }}" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter your last name" value="{{ $address->last_name }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="phone_number" class="col-form-label font-weight-bold">Phone Number<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="Enter your phone number" value="{{ $address->phone }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="address" class="col-form-label font-weight-bold">Address<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter your address" value="{{ $address->address }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="city" class="col-form-label font-weight-bold">City<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-6">
                                    <label for="province" class="col-form-label font-weight-bold">Province<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <select class="form-select font-proxima-nova font-weight-bold" id="city" name="city"
                                        required>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city['city_name'] }}" @if ($city['city_name'] == $address->city) selected @endif>{{ $city['city_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select font-proxima-nova font-weight-bold" id="province"
                                        name="province" required>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province['province'] }}" @if ($province['province'] == $address->province) selected @endif>{{ $province['province'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="address_type" class="col-form-label font-weight-bold">Address Type<span
                                            class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label for="postal_code" class="col-form-label font-weight-bold">Postal Code<span
                                            class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="address_type" name="address_type"
                                        placeholder="e.g Home, Office, etc" value="{{ $address->address_type }}"
                                        required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                        placeholder="Enter your postal code" value="{{ $address->postal_code }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
    {{-- form modal --}}
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <form action="{{ route('user.address.store') }}" method="post">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 justify-content-center position-relative">
                        <h5 class="modal-title text-center text-argavell font-bauer text-4xl" id="addressModalLabel"><img
                                src="{{ asset('images/argan-fruit.png') }}" width="75px">Add New Address</h5>
                        <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                            style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"
                            aria-label="Close"></span>
                    </div>
                    <div class="modal-body font-proxima-nova px-5">
                        <div class="row">
                            <div class="col-6">
                                <label for="first_name" class="col-form-label font-weight-bold">First Name<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-6">
                                <label for="last_name" class="col-form-label font-weight-bold">Last Name<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="phone_number" class="col-form-label font-weight-bold">Phone Number<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="address" class="col-form-label font-weight-bold">Address<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter your address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="city" class="col-form-label font-weight-bold">City<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-6">
                                <label for="province" class="col-form-label font-weight-bold">Province<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <select class="form-select font-proxima-nova font-weight-bold" id="city" name="city"
                                    required>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['city_name'] }}">{{ $city['city_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select font-proxima-nova font-weight-bold" id="province" name="province"
                                    required>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['province'] }}">{{ $province['province'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="address_type" class="col-form-label font-weight-bold">Address Type<span
                                        class="text-danger">*</span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label for="postal_code" class="col-form-label font-weight-bold">Postal Code<span
                                        class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input type="text" class="form-control" id="address_type" name="address_type"
                                    placeholder="e.g Home, Office, etc" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    placeholder="Enter your postal code" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
