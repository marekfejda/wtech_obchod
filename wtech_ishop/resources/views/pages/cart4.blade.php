@extends('layouts.app')

@section('title', 'iSHOP - Hotovo!')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/cart4/styles.css') }}">
@endsection

@section('content')
    <!-- Confirmation Message -->
    <div class="confirmation-message">
        <h2 style="color: #45503B;">Ďakujeme za objednávku!</h2>
        <img src="{{ asset('assets/icons/checkmark.png') }}" style="color: #45503B;" alt="Checkmark" class="checkmark">
        <h5 class="mt-5" style="color: #45503B;">Vaša objednávka číslo {{ $order->id }} bola úspešne odoslaná a spracovaná.</h5>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/cart4/scripts.js') }}"></script>
@endsection