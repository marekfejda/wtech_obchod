@extends('layouts.app')

@section('title', 'iSHOP - Informácie')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/cart2/styles.css') }}">
@endsection

@section('content')
    <!-- Progress Bar -->
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="step active">1</div>
            <div class="progress flex-grow-1 mx-2" style="height: 6px;">
                <div class="progress-bar" style="width: 100%;"></div>
            </div>
            <div class="step active">2</div>
            <div class="progress flex-grow-1 mx-2" style="height: 6px;">
                <div class="progress-bar" style="width: 0;"></div>
            </div>
            <div class="step">3</div>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <span>Summary</span>
            <span><b>Shipping</b></span>
            <span>Payment</span>
        </div>
    </div>


    <!-- Main content -->
    <main class="container flex-grow-1">
        <form id="shippingForm" class="bg-light p-4 rounded-4 shadow-sm" action="{{ route('cart.2.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="client_name" class="form-label">Meno a priezvisko</label>
                        <input name="name_surname" type="text" class="form-control rounded-pill @error('name_surname') is-invalid @enderror" id="name_surname" placeholder="Jožko Mrkvička" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresa a číslo domu</label>
                        <input name="address_streetnumber" type="text" class="form-control rounded-pill @error('address_streetnumber') is-invalid @enderror" id="address_streetnumber" placeholder="Ilkovičova 2" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="PSC" class="form-label">ZIP Code</label>
                                <input name="PSC" type="text" class="form-control rounded-pill @error('PSC') is-invalid @enderror" id="PSC" placeholder="842 16" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Mesto</label>
                                <input name="city" type="text" class="form-control rounded-pill @error('city') is-invalid @enderror" id="city" placeholder="Bratislava" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Krajina</label>
                        <select name="country" class="form-control rounded-pill @error('country') is-invalid @enderror" id="country" required>
                            <option value="">Vyberte krajinu</option>
                            <option value="SK">Slovenská republika</option>
                            <option value="CZ">Česká republika</option>
                        </select>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Telefónne číslo</label>
                        <div class="input-group">
                            <select name="country_code" id="countryCode" class="form-select rounded-pill" style="max-width: 100px;">
                                <option value="+421">+421</option>
                                <option value="+420">+420</option>
                            </select>

                            <input name="phone_number" type="tel" id="phoneNumber" class="form-control rounded-pill @error('phone_number') is-invalid @enderror" placeholder="912 345 678" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email</label>
                        <input name="email" type="email" id="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="vasa_adresa@mail.com" required>
                    </div>
                </div>
            </div>
        </form>
    </main>


    <!-- Cart Summary -->
    <div class="cart-summary">
        <div class="container">
            <div class="row bg-light p-3 align-items-center rounded element-shadow rounded-pill">
                <!-- Back Button -->
                <div class="col-3 text-start">
                    <a href="{{ route('cart.1') }}" class="btn btn-outline-secondary w-50 rounded-pill">Back</a>
                </div>

                <!-- Cart Total -->
                <div class="col-6 fw-bold text-center">
                    Total: <span id="cartTotal">{{ number_format($total, 2) }}$</span>
                </div>

                <!-- Next Button -->
                <div class="col-3 text-end">
                    <button type="button" onclick="document.getElementById('shippingForm').submit();" class="btn btn-primary w-75 rounded-pill button_color">Next</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('page-js')
    <script src="{{ asset('pages/cart2/scripts.js') }}"></script>
@endsection