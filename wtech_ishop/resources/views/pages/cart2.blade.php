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
        <form class="bg-light p-4 rounded-4 shadow-sm">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="client_name" class="form-label">Meno a priezvisko</label>
                        <input type="text" class="form-control rounded-pill " id="name" placeholder="Jožko Mrkvička" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresa a číslo domu</label>
                        <input type="text" class="form-control rounded-pill" id="address" placeholder="Ilkovičova 2" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="zip" class="form-label">ZIP Code</label>
                                <input type="text" class="form-control rounded-pill" id="zip" placeholder="842 16" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Mesto</label>
                                <input type="text" class="form-control rounded-pill" id="city" placeholder="Bratislava" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Krajina</label>
                        <select class="form-control rounded-pill" id="country" required>
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
                            <select id="countryCode" class="form-select rounded-pill" style="max-width: 100px;">
                                <option value="+421">+421</option>
                                <option value="+420">+420</option>
                            </select>

                            <input type="tel" id="phoneNumber" class="form-control rounded-pill" placeholder="912 345 678" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email</label>
                        <input type="email" id="emailAddress" class="form-control rounded-pill" placeholder="vasa_adresa@mail.com"
                            required>
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
                    Total: <span id="cartTotal">37.98$</span>
                </div>

                <!-- Next Button -->
                <div class="col-3 text-end">
                    <a href="{{ route('cart.3') }}" class="btn btn-primary w-75 rounded-pill button_color">Next</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/cart2/scripts.js') }}"></script>
@endsection