@extends('layouts.app')

@section('title', 'iSHOP - dynamicky_detail')

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
        <main class="col-lg-10 d-flex align-items-center justify-content-center">
            <div class="row align-items-center justify-content-center">
                <!-- Image Gallery Column-->
                <div class="col-md-6 mb-4">
                    <div id="imageGallery" class="carousel slide" style="max-width: 550px; margin: 0 auto;">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#imageGallery" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#imageGallery" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#imageGallery" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#imageGallery" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#imageGallery" data-bs-slide-to="4"></button>
                        </div>

                        <div class="carousel-inner ratio ratio-1x1 bg-white">
                            <div class="carousel-item active h-100">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="../../assets/iphone/iphone_pro_black_1.webp"
                                        class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image 1">
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="../../assets/iphone/iphone_pro_black_2.webp"
                                        class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image 2">
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="../../assets/iphone/iphone_pro_black_3.webp"
                                        class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image 3">
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="../../assets/iphone/iphone_pro_black_4.webp"
                                        class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image 4">
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="../../assets/iphone/iphone_pro_black_5.webp"
                                        class="d-block img-fluid mh-100 object-fit-contain" alt="Product Image 5">
                                </div>
                            </div>
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
                        <h3 class="fw-bold ms-3 mb-5 mt-4 text-color">Iphone 16 Pro - cierna</h3>
                        <p class="product-text text-color">Mobilný telefón - 6,3" Super Retina XDR OLED 2622 x 1206 (120 Hz),
                            operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro,
                            fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera
                            12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové
                            nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS</p>

                        <div class="ms-3 d-flex align-items-center mt-3">
                            <input type="number" class="form-control me-3 rounded-pill" value="1" min="1" max="99"
                                style="width: 60px; text-align: left;">
                            <button class="btn btn-primary rounded-pill button_color" style="min-width: 145px;">
                                Pridať do košíka
                            </button>

                            <span class="ms-2 product-uid"
                                style="opacity: 0.4; font-size: 0.8rem; color: #6c757d;">AS969AE</span>

                            <button class="btn btn-outline-secondary"
                                style="opacity: 0.4; border: none; background: none;">
                                <i class="bi bi-pencil" style="font-size: 1.2rem; color: #6c757d;"></i>
                            </button>
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