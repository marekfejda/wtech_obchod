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
                <li class="nav-item">
                    <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;" href="{{ route('category') }}">
                        <i class="bi bi-laptop"></i> Kategoria 1
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;" href="../category/category.html">
                        <i class="bi bi-phone"></i> Kategoria 2
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;" href="../category/category.html">
                        <i class="bi bi-headphones"></i> Kategoria 3
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;" href="../category/category.html">
                        <i class="bi bi-tv"></i> Kategoria 4
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;" href="../category/category.html">
                        <i class="bi bi-usb-symbol"></i> Kategoria 5
                    </a>
                </li>
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
                    <!-- Product 1: macbook air blue -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="{{ route('detail') }}">
                                    <img src="../../assets/mac/mac_air_blue.webp" class="card-img-top"
                                        alt="Macbook Air Blue">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">Macbook Air Blue</h5>
                                    <p class="card-text fw-bold">1624.23€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 2: macbook air green -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/mac/mac_air_green.webp" class="card-img-top"
                                        alt="Macbook Air Green">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">Macbook Air Green</h5>
                                    <p class="card-text fw-bold">88.48€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 3: macbook air yellow -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/mac/mac_air_yellow.webp" class="card-img-top"
                                        alt="Macbook Air Yellow">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">Macbook Air Yellow</h5>
                                    <p class="card-text fw-bold">785.40€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 4: macbook pro black -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/mac/mac_pro_black.webp" class="card-img-top"
                                        alt="Macbook Pro Black">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">Macbook Pro Black</h5>
                                    <p class="card-text fw-bold">2885.65€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 5: macbook pro silver -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/mac/mac_pro_silver.webp" class="card-img-top"
                                        alt="Macbook Pro Silver">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">Macbook Pro Silver</h5>
                                    <p class="card-text fw-bold">2885.65€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 6: iPhone Black -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/iphone/iphone_black.webp" class="card-img-top"
                                        alt="iPhone Black">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">iPhone Black</h5>
                                    <p class="card-text fw-bold">999€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 7: iPhone Red -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/iphone/iphone_red.webp" class="card-img-top"
                                        alt="iPhone Red">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">iPhone Red</h5>
                                    <p class="card-text fw-bold">999€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 8: iPhone Blue -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/iphone/iphone_blue.webp" class="card-img-top"
                                        alt="iPhone Blue">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">iPhone Blue</h5>
                                    <p class="card-text fw-bold">999€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 9: iPhone Green -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/iphone/iphone_green.webp" class="card-img-top"
                                        alt="iPhone Green">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">iPhone Green</h5>
                                    <p class="card-text fw-bold">999€</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Product 10: iPhone White -->
                    <article class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card product-card rounded-4">
                            <div class="image-container">
                                <a href="../detail/detail.html">
                                    <img src="../../assets/iphone/iphone_white.webp" class="card-img-top"
                                        alt="iPhone White">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="text-container">
                                    <h5 class="card-title">iPhone White</h5>
                                    <p class="card-text fw-bold">999€</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </main>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/index/scripts.js') }}"></script>
@endsection