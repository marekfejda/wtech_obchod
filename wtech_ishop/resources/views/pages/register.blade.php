@extends('layouts.app')

@section('title', 'iSHOP - Registrácia')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/register/styles.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="w-100" style="max-width: 250px;">
            <div class="text-center mb-4">
                <i class="bi bi-person-circle" style="font-size: 5rem; color: #45503B;"></i>
            </div>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="User name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control rounded-pill" placeholder="Email">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control rounded-pill" placeholder="Password">
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary rounded-pill button_color">Register</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-muted text-decoration-none">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/register/scripts.js') }}"></script>
@endsection