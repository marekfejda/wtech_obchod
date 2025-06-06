@extends('layouts.app')

@section('title', 'iSHOP - Prihlásenie')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/login/styles.css') }}">
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

    @if (session('error'))
        <div id="flash-message" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('error') }}
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
    
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="w-100" style="max-width: 250px;">
            <!-- User Icon -->
            <div class="text-center mb-4">
                <i class="bi bi-person-circle" style="font-size: 5rem; color: #45503B;"></i>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control rounded-pill" placeholder="User name" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control rounded-pill" placeholder="Password" required>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary rounded-pill button_color">Login</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="text-muted text-decoration-none">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/login/scripts.js') }}"></script>
@endsection