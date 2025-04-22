@extends('layouts.app')

@section('title', 'iSHOP - ' . ($currentCategory->category ?? 'Kategória'))

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
                            href="{{ route('category', $category->slug) }}">
                            <i class="bi bi-{{ $category->icon }}"></i> {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-lg-10 p-4 flex-grow-1">
            <!-- Filters -->
            <div class="d-flex flex-wrap align-items-end responsive-gap mb-4">

                <!-- Cena (from-to) -->
                <form id="filterForm" method="GET" action="{{ route('category', ['slug' => $currentCategory->slug]) }}">    
                    <!-- Aktuálne zoradenie -->
                    <input type="hidden" name="sort" value="{{ request('sort', 'id_asc') }}">

                    <!-- Aktuálne vybraté farby -->
                    @foreach (request('colors', []) as $colorId)
                        <input type="hidden" name="colors[]" value="{{ $colorId }}">
                    @endforeach

                    <!-- Aktuálne vybraté značky -->
                    @foreach (request('brands', []) as $brandId)
                        <input type="hidden" name="brands[]" value="{{ $brandId }}">
                    @endforeach

                    <!-- Cena (from-to) -->
                    <div>
                        <label for="priceRange" class="form-label">Cena</label>
                        <div class="input-group">
                            <input
                                type="number"
                                class="form-control rounded-pill"
                                step="0.01"
                                placeholder="od"
                                id="priceFrom"
                                name="price_min"
                                value="{{ request('price_min', 0) }}"
                                min="0"
                                max="{{ request('price_max', $maxPrice) }}"
                            >
                            <span class="input-group-text border-0 bg-transparent rounded-pill">-</span>
                            <input
                                type="number"
                                class="form-control rounded-pill"
                                step="0.01"
                                placeholder="do"
                                id="priceTo"
                                name="price_max"
                                value="{{ request('price_max', $maxPrice) }}"
                                min="{{ request('price_min', 0) }}"
                                max="{{ $maxPrice }}"
                            >
                        </div>
                    </div>

                    <!-- Skryté submit tlačidlo pre Enter -->
                    <button type="submit" hidden></button>
                </form>

                <form method="GET" action="{{ route('category', ['slug' => $currentCategory->slug]) }}">
                    <input type="hidden" name="sort" value="{{ request('sort', 'id_asc') }}">

                    <div class="d-flex flex-wrap gap-4">
                        <!-- Farba dropdown -->
                        <div class="dropdown">
                            <label class="form-label d-block">Farba</label>
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-pill button_color dropdown-toggle-color"
                                    type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                Vyber farby
                            </button>

                            <ul class="dropdown-menu dropdown-menu-color p-2" style="min-width: 200px;">
                                @foreach ($colors as $color)
                                    <li>
                                        <label class="form-check-label">
                                            <input
                                                class="form-check-input me-1"
                                                type="checkbox"
                                                name="colors[]"
                                                value="{{ $color->id }}"
                                                {{ in_array($color->id, request()->input('colors', [])) ? 'checked' : '' }}>
                                            {{ $color->color }}
                                        </label>
                                    </li>
                                @endforeach
                                <li class="mt-2 text-center">
                                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Filtrovať</button>
                                </li>
                            </ul>
                        </div>

                        <!-- Značka dropdown -->
                        <div class="dropdown">
                            <label class="form-label d-block">Značka</label>
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-pill button_color dropdown-toggle-brand"
                                    type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                Vyber značky
                            </button>

                            <ul class="dropdown-menu dropdown-menu-brand p-2" style="min-width: 200px;">
                                @foreach ($brands as $brand)
                                    <li>
                                        <label class="form-check-label">
                                            <input
                                                class="form-check-input me-1"
                                                type="checkbox"
                                                name="brands[]"
                                                value="{{ $brand->id }}"
                                                {{ in_array($brand->id, request()->input('brands', [])) ? 'checked' : '' }}>
                                            {{ $brand->brand }}
                                        </label>
                                    </li>
                                @endforeach
                                <li class="mt-2 text-center">
                                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Filtrovať</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" name="price_min" value="{{ request('price_min', 0) }}">
                    <input type="hidden" name="price_max" value="{{ request('price_max', $maxPrice) }}">
                </form>


                <!-- Sorting -->
                @php
                    $query = [
                        'sort' => $sort === 'price_asc' ? 'price_desc' : 'price_asc',
                        'colors' => request('colors', []),
                        'brands' => request('brands', []),
                        'price_min' => request('price_min', 0),
                        'price_max' => request('price_max', $maxPrice),
                    ];

                    // Vygeneruj URL
                    $sortUrl = route('category', ['slug' => $currentCategory->slug]) . '?' . http_build_query($query);
                @endphp

                <div class="ms-auto d-flex align-items-center">
                    <span class="form-label mb-0 me-1">Cena</span>
                    <a href="{{ $sortUrl }}">


                        <i id="sortIcon"
                        class="bi {{ $sort === 'price_asc' ? 'bi-chevron-up' : ($sort === 'price_desc' ? 'bi-chevron-down' : 'bi-code' ) }}"
                        style="cursor: pointer; color: #000;">
                        </i>
                    </a>
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
        </main>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/category/scripts.js') }}"></script>
@endsection