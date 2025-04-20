@extends('layouts.app')

@section('title', 'iSHOP - Hotovo!)

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/cart4/styles.css') }}">
@endsection

@section('content')
    <!-- Confirmation Message -->
    <div class="confirmation-message">
        <h2 style="color: #45503B;">Ďakujeme za objednávku číslo 191841549</h2>
        <img src="{{ asset('assets/icons/checkmark.png') }}" style="color: #45503B;" alt="Checkmark" class="checkmark">
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/cart4/scripts.js') }}"></script>
@endsection