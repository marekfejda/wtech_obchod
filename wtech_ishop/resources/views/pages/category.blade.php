@extends('layouts.app')

@section('title', 'iSHOP - dynamicka_category')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/category/styles.css') }}">
@endsection

@section('extra-header-button')
    <button id="sideBarBut" class="btn btn-outline-dark d-md-none">
        <i class="bi bi-list"></i>
    </button>
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div class="d-flex w-100">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-lg-2 collapse d-md-block p-3" style="background-color: #E5EBEA;">
            <ul class="nav flex-column">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link sidebar-category rounded-pill" style="color: #45503B;"
                            href="{{ route('category', $category->id) }}">
                            <i class="bi bi-box"></i> {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-lg-10 p-4 flex-grow-1">
            <!-- Filters -->
            <div class="d-flex flex-wrap align-items-end responsive-gap mb-4">

                <!-- Cena (from-to in one input group) -->
                <div>
                    <label for="priceRange" class="form-label">Cena</label>
                    <div class="input-group">
                        <input type="number" class="form-control rounded-pill" placeholder="od" id="priceFrom" min="0">
                        <span class="input-group-text border-0 bg-transparent rounded-pill">-</span>
                        <input type="number" class="form-control rounded-pill" placeholder="do" id="priceTo" min="0">
                    </div>
                </div>

                <!-- Farba dropdown -->
                <div class="dropdown">
                    <label class="form-label d-block">Farba</label>
                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill button_color" type="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">
                        Vyber farby
                    </button>
                    <ul class="dropdown-menu p-2" style="min-width: 200px;">
                        @foreach ($colors as $color)
                            <li><input class="form-check-input me-1" type="checkbox" value="red">{{ $color->color }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Značka dropdown -->
                <div class="dropdown">
                    <label class="form-label d-block">Značka</label>
                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill button_color" type="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">
                        Vyber značky
                    </button>
                    <ul class="dropdown-menu p-2" style="min-width: 200px;">
                        @foreach ($brands as $brand)
                            <li><input class="form-check-input me-1" type="checkbox" value="z1">{{ $brand->brand }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sorting -->
                <div class="ms-auto d-flex align-items-center">
                    <span class="form-label mb-0 me-1">Cena</span>
                    <i id="sortIcon" class="bi bi-caret-up-fill" style="cursor: pointer;"></i>
                </div>

            </div>

            <!-- Product List -->
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                        <a href="{{ route('detail', $product->id) }}" class="text-decoration-none">
                            <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                                style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                                <!-- Left: Image + Price -->
                                <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                    <div class="image-container d-flex align-items-end p-2 mb-2"
                                        style="width: 100%; height: 140px; overflow: hidden;">
                                        @php
                                            $firstImage = $product->images->first();
                                        @endphp

                                        @if ($firstImage)
                                            <img src="{{ asset($firstImage->path) }}" class="product-img"
                                                alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('assets/favicon.png') }}" class="product-img"
                                                alt="Bez obrázka">
                                        @endif
                                    </div>
                                    <div class="fw-bold fs-6 text-center text-color">{{ number_format($product->price, 2) }} €</div>
                                </div>

                                <!-- Right: Name + Description -->
                                <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                    <div class="fw-semibold fs-5 mb-1 text-color">{{ $product->name }}</div>
                                    <div class="text-muted small text-color">{{ $product->short_description }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Page counter -->
            @php
                $currentPage = $products->currentPage();
                $lastPage = $products->lastPage();
            @endphp

            @if ($lastPage > 1)
                <nav aria-label="Product pagination" class="d-flex justify-content-center mt-4">
                    <ul class="pagination responsive-pagination">
                        @for ($i = 1; $i <= min(9, $lastPage); $i++)
                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($lastPage > 9)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item {{ $lastPage == $currentPage ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($lastPage) }}">{{ $lastPage }}</a>
                            </li>
                        @endif

                        @if ($lastPage > 10 && $currentPage < $lastPage)
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&rsaquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif

            <!-- <nav aria-label="Product pagination" class="d-flex justify-content-center mt-4">
                <ul class="pagination responsive-pagination">
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item"><a class="page-link" href="#">6</a></li>
                  <li class="page-item"><a class="page-link" href="#">7</a></li>
                  <li class="page-item"><a class="page-link" href="#">8</a></li>
                  <li class="page-item"><a class="page-link" href="#">9</a></li>
                  <li class="page-item disabled"><span class="page-link">...</span></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&rsaquo;</span>
                    </a>
                  </li>
                </ul>
            </nav>                        -->
        </main>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/category/scripts.js') }}"></script>
@endsection