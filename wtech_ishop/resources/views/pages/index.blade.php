@extends('layouts.app')

@section('title', 'iSHOP')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/index/styles.css') }}">
@endsection

@section('extra-header-button')
    <button id="sideBarBut" class="btn btn-outline-dark d-md-none">
        <i class="bi bi-list"></i>
    </button>
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div class="d-flex flex-grow-1" style="min-height: 0;">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-lg-2 collapse d-md-block p-3" style="background-color: #E5EBEA;">
            <ul class="nav flex-column">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;"
                            href="{{ route('category', $category->id) }}">
                            <i class="bi bi-{{ $category->icon }}"></i> {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-lg-10 p-4">
            <!-- Banner Section -->
            <div class="container-fluid px-0 mb-4">
                <img src="{{ asset('assets/banner.png') }}" alt="Banner" class="img-fluid w-100 rounded-4"
                    style="max-height: 300px; object-fit: cover;">
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card product-card rounded-4">
                                <div class="image-container">
                                    <a href="{{ route('detail', $product->id) }}">
                                        @php
                                            $firstImage = $product->images->first();
                                        @endphp

                                        @if ($firstImage)
                                            <img src="{{ asset($firstImage->path) }}" class="card-img-top"
                                                alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('assets/favicon.png') }}" class="card-img-top"
                                                alt="Bez obrázka">
                                        @endif
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="text-container">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text fw-bold">{{ number_format($product->price, 2) }} €</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/index/scripts.js') }}"></script>
@endsection