@extends('layouts.app')

@section('title', 'iSHOP - ' . ($category->category ?? 'Detail'))

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/detail/styles.css') }}">
@endsection

@section('extra-header-button')
    <button id="sideBarBut" class="btn btn-outline-dark d-md-none">
        <i class="bi bi-list"></i>
    </button>
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div class="container-fluid flex-grow-1 d-flex">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-lg-2 collapse d-md-block p-3" style="background-color: #E5EBEA;">
            <ul class="nav flex-column">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;"
                            href="{{ route('category', $category->slug) }}">
                            <i class="bi bi-{{ $category->icon }}"></i> {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-lg-10 d-flex align-items-center justify-content-center">
            <div class="row align-items-center justify-content-center">
                <!-- Image Gallery Column-->
                <div class="col-md-6 mb-4">
                    <div id="imageGallery" class="carousel slide" style="max-width: 550px; margin: 0 auto;">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            @foreach ($product->images as $index => $image)
                                <button
                                    type="button"
                                    data-bs-target="#imageGallery"
                                    data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}">
                                </button>
                            @endforeach
                        </div>

                        <div class="carousel-inner ratio ratio-1x1 bg-white">
                            @foreach ($product->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} h-100">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <img src="{{ asset( $image->path) }}"
                                            class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image {{ $index + 1 }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#imageGallery"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"
                                aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageGallery"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                </div>

                <!-- Product Details Column -->
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="w-75">
                        <h3 class="fw-bold ms-3 mb-5 mt-4 text-color">{{ $product->name }}</h3>

                        <p class="product-text text-color">{{ $product->description }}</p>

                        <div class="ms-3 d-flex align-items-center mt-3">
                            <input id="quantityInput" type="number" class="form-control me-3 rounded-pill" value="1" min="1" max="{{ $product->stockquantity }}"
                                style="width: 60px; text-align: left;">
                                <script>
                                    const input = document.getElementById('quantityInput');
                                    input.addEventListener('input', function () {
                                        const max = parseInt(input.max);
                                        const val = parseInt(input.value);
                                        if (val > max) {
                                            input.value = max;
                                        }
                                    });
                                </script>

                            <button class="btn btn-primary rounded-pill button_color" style="min-width: 145px;">
                                Pridať do košíka
                            </button>

                            
                            @php
                            $user = session('user');
                            @endphp
                            
                            @if ($user && $user->role === 'admin')
                                    <span class="ms-2 product-uid"
                                        style="opacity: 0.4; font-size: 0.8rem; color: #6c757d;">{{ $product->id }}</span>

                                    <button class="btn btn-outline-secondary"
                                        style="opacity: 0.4; border: none; background: none;">
                                        <i class="bi bi-pencil" style="font-size: 1.2rem; color: #6c757d;"></i>
                                    </button>
                                @endif
                        </div>
                    </div>
                </div>

            </div>
    </div>
    </main>
    </div>

    <div class="mb-5"></div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/detail/scripts.js') }}"></script>
@endsection