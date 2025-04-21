@extends('layouts.app')

@section('title', 'iSHOP - Košík')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/cart1/styles.css') }}">
@endsection

@section('content')
    <!-- Progress Bar -->
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="step active">1</div>
            <div class="progress flex-grow-1 mx-2" style="height: 6px;">
                <div class="progress-bar" style="width: 0%;"></div>
            </div>
            <div class="step">2</div>
            <div class="progress flex-grow-1 mx-2" style="height: 6px;">
                <div class="progress-bar" style="width: 0;"></div>
            </div>
            <div class="step">3</div>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <span><b>Summary</b></span>
            <span>Shipping</span>
            <span>Payment</span>
        </div>
    </div>


    <!-- Main content -->
    <main class="flex-grow-1">
        <div class="container">

            <div class="mt-5"></div>
            @if ($cartItems->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                    <p class="text-muted fs-4 m-0">Košík je prázdny</p>
                </div>
            @else
                @foreach($cartItems as $item)
                    @php
                        $product = $item->product;
                        $image = $product->images->first();
                    @endphp
                    
                    <form action="{{ route('addToCart', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="update" value="1">
                        <div class="row bg-light p-3 align-items-center rounded element-shadow mt-3 rounded-pill">
                            <!-- Product Image -->
                            <div class="col-2">
                                <a href="/detail/{{ $product->id }}">
                                    <img src="{{ asset($image->path ) }}" class="product-image" alt="Product Image">
                                </a>
                            </div>

                            <!-- Product Details -->
                            <div class="col-6">
                                <a href="/detail/{{ $product->id }}" class="fw-bold text-dark text-decoration-none">
                                    {{ $product->name }}
                                </a>
                            </div>

                            <!-- Quantity -->
                            <div class="col-2 text-center">
                                <input name="quantity" type="number" class="form-control rounded-pill" value="{{ $item->amount }}" min="0" max="{{ $product->stockquantity }}"
                                    style="width: 60px; text-align: center;" oninput="this.form.submit()">
                            </div>

                            <!-- Price -->
                            <div class="col-2 text-end fw-bold">
                                {{ number_format($product->price * $item->amount, 2) }}$
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif
        </div>
    </main>

    <!-- Cart Summary -->
    <div class="cart-summary">
        <div class="container">
            <div class="row bg-light p-3 align-items-center rounded element-shadow rounded-pill">
                <!-- Back Button -->
                <div class="col-3 text-start">
                    <a href="{{ route('index') }}" class="btn btn-outline-secondary w-50 rounded-pill">Back</a>
                </div>

                <!-- Cart Total -->
                <div class="col-6 fw-bold text-center">
                    Total: <span id="cartTotal">{{ number_format($total, 2) }}$</span>
                </div>

                <!-- Next Button -->
                <div class="col-3 text-end">
                    <a href="{{ $cartItems->isEmpty() ? '' : route('cart.2') }}"
                        class="btn btn-primary w-75 
                        rounded-pill button_color
                        {{ $cartItems->isEmpty() ? 'disabled-link' : '' }}"
                        {{ $cartItems->isEmpty() ? 'aria-disabled=true' : '' }}>
                        Next</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/cart1/scripts.js') }}"></script>
@endsection