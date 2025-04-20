@extends('layouts.app')

@section('title', 'iSHOP - O Nás')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/about_us/styles.css') }}">
@endsection

@section('content')
    <!-- About Us Section -->
    <div class="container my-5">
        <!-- Title -->
        <h1 class="text-center mb-4 text-default-color">O nás</h1>

        <!-- About Us Text Block -->
        <div class="bg-light p-5 rounded-4 text-start text-default-color">
            <p class="fs-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut odio tincidunt, tristique libero non,
                elementum turpis. Nullam cursus leo at lacinia tempor. Cras quis tincidunt quam. Vivamus porttitor
                mauris ut nunc tempus, ut faucibus ante euismod. Etiam vitae lacinia dui. Aenean mattis erat at
                fermentum fringilla.
                Aenean quis hendrerit magna. Sed sit amet condimentum ex. Integer egestas tincidunt sapien vitae porta.
                Pellentesque et efficitur justo, a rutrum metus. Nulla facilisi. Ut porta sollicitudin vulputate.
            </p>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/about_us/scripts.js') }}"></script>
@endsection