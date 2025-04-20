@extends('layouts.app')

@section('title', 'iSHOP - Platba')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/cart3/styles.css') }}">
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
                <div class="progress-bar" style="width: 100%;"></div>
            </div>
            <div class="step active">3</div>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <span>Summary</span>
            <span>Shipping</span>
            <span><b>Payment</b></span>
        </div>
    </div>


    <!-- Main content-->
    <main class="flex-grow-1">
        <div class="container">

            <div class="mt-5"></div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2 style="color: #45503B;">Vyberte si spôsob platby</h2>
                </div>
            </div>

            <div class="row mt-4">
                <!-- PLATBA KARTOU -->
                <div class="col-12 col-md-6">
                    <div class="bg-light p-3 rounded-4 element-shadow">
                        <h4 style="color: #45503B;">Platobná karta</h4>
                        <form>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label" style="color: #45503B;">Číslo karty</label>
                                <input type="text" class="form-control rounded-pill" id="cardNumber"
                                    placeholder="1234 5678 9876 5432" required>
                            </div>
                            <div class="mb-3">
                                <label for="expiryDate" class="form-label" style="color: #45503B;">Dátum expirácie (MM/YY)</label>
                                <input type="text" class="form-control rounded-pill" id="expiryDate" placeholder="MM/YY"
                                    maxlength="5" required>
                            </div>
                            <div class="mb-3">
                                <label for="cvv" class="form-label" style="color: #45503B;">CVV</label>
                                <input type="text" class="form-control rounded-pill" id="cvv" placeholder="123" required>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-success rounded-pill button_color"
                                    onclick="window.location.href='{{ route('cart.4') }}'">Zaplatiť kartou</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- PLATBA CASH -->
                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <div class="bg-light p-3 rounded-4 element-shadow">
                        <h4 style="color: #45503B;">Hotovosť pri doručení</h4>
                        <p class="mt-4" style="color: #45503B;">Ak uprednostňujete platbu v hotovosti, môžete si zvoliť túto možnosť. Uistite
                            sa, že pri doručení produktu máte presnú sumu.</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success mt-4 rounded-pill button_color"
                                onclick="window.location.href='{{ route('cart.4') }}'">Zaplatiť pri doručení</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Cart Summary -->
    <div class="cart-summary">
        <div class="container">
            <div class="row bg-light p-3 align-items-center rounded element-shadow rounded-pill">
                <!-- Back Button -->
                <div class="col-3 text-start">
                    <a href="{{ route('cart.2') }}" class="btn btn-outline-secondary w-50 rounded-pill">Back</a>
                </div>

                <!-- Cart Total -->
                <div class="col-6 fw-bold text-center">
                    Total: <span id="cartTotal">37.98$</span>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/cart3/scripts.js') }}"></script>
@endsection