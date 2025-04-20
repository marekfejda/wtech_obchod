@extends('layouts.app')

@section('title', 'iSHOP - Môj Účet')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/account/styles.css') }}">
@endsection

@section('content')
    <!-- User/Admin Screen -->
    <div class="container d-flex align-items-center justify-content-center flex-grow-1 flex-column">

        <!-- User Icon -->
        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 5rem; color: #45503B;"></i>
        </div>

        <!-- Admin Buttons -->
        <div class="d-flex flex-column align-items-center mb-3">
            <button class="btn btn-primary mb-2 rounded-pill button_color">Pridať produkt</button>
            <button class="btn btn-primary mb-3 rounded-pill button_color">Odstrániť produkt</button>
        </div>

        <!-- Logout Button -->
        <button class="btn btn-danger mb-3 rounded-pill">Odhlásiť sa</button>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/account/scripts.js') }}"></script>
@endsection