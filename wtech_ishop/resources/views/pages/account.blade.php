@extends('layouts.app')

@section('title', 'iSHOP - Môj Účet')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/account/styles.css') }}">
@endsection

@section('content')

    @if (session('success'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function () {
                let el = document.getElementById('flash-message');
                if (el) {
                    el.style.transition = 'opacity 0.5s ease';
                    el.style.opacity = 0;
                    setTimeout(() => el.remove(), 500);
                }
            }, 3000); // 3 sekundy
        </script>
    @endif

    
    <!-- User/Admin Screen -->
    <div class="container d-flex align-items-center justify-content-center flex-grow-1 flex-column">

        <!-- User Icon -->
        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 5rem; color: #45503B;"></i>
        </div>

        @php
            $user = session('user');
        @endphp

        @if ($user && $user->role === 'admin')
            <!-- Admin Buttons -->
            <div class="d-flex flex-column align-items-center mb-3">
                <button class="btn btn-primary mb-2 rounded-pill button_color">Pridať produkt</button>
                <button class="btn btn-primary mb-3 rounded-pill button_color">Odstrániť produkt</button>
            </div>
        @endif


        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mb-3 rounded-pill">Odhlásiť sa</button>
        </form>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/account/scripts.js') }}"></script>
@endsection