@extends('layouts.app')

@section('title', 'iSHOP - Kontakt')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/contact/styles.css') }}">
@endsection

@section('content')
    <!-- About Us Section -->
    <div class="container my-5">
        <!-- Title -->
        <h1 class="text-center mb-4 text-color">Kontakt</h1>

        <!-- About Us Text Block -->
        <div class="bg-light p-5 rounded-4 text-start">
            <p class="fs-4 text-color"><b>Email:</b> informacie@obchod.sk</p>
            <p class="fs-4 text-color"><b>Telefon:</b> 0903 123 123</p>
            <p class="fs-4 text-color"><b>Adresa:</b> Súmračná 25, 821 02 Bratislava</p>
            <p class="fs-4 text-color"><b>IČO:</b> 496 498 196</p>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/contact/scripts.js') }}"></script>
@endsection