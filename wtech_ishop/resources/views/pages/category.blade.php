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
                        <li><input class="form-check-input me-1" type="checkbox" value="red"> Červená</li>
                        <li><input class="form-check-input me-1" type="checkbox" value="blue"> Modrá</li>
                        <li><input class="form-check-input me-1" type="checkbox" value="green"> Zelená</li>
                        <li><input class="form-check-input me-1" type="checkbox" value="black"> Čierna</li>
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
                        <li><input class="form-check-input me-1" type="checkbox" value="z1"> Značka 1</li>
                        <li><input class="form-check-input me-1" type="checkbox" value="z2"> Značka 2</li>
                        <li><input class="form-check-input me-1" type="checkbox" value="z3"> Značka 3</li>
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
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="{{ route('detail') }}" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <a href="../detail/detail.html" class="text-decoration-none">
                        <div class="card product-card h-100 p-3 border rounded-4 d-flex flex-column flex-md-row"
                            style="min-height: 250px; max-width: 380px; width: 100%; cursor: pointer;">
                            <!-- Left: Image + Price -->
                            <div class="d-flex flex-column align-items-center mb-3 mb-md-0 w-100 w-md-50 pe-md-3">
                                <div class="image-container d-flex align-items-end p-2 mb-2"
                                    style="width: 100%; height: 140px; overflow: hidden;">
                                    <img src="../../assets/mac/mac_air_blue.webp" alt="Macbook Air Blue"
                                        class="product-img">
                                </div>
                                <div class="fw-bold fs-6 text-center text-color">1624.23€</div>
                            </div>

                            <!-- Right: Name + Description -->
                            <div class="d-flex flex-column justify-content-center w-100 w-md-50">
                                <div class="fw-semibold fs-5 mb-1 text-color">Macbook Air Blue</div>
                                <div class="text-muted small text-color">Ľahký, výkonný notebook s čipom M2, ideálny pre študentov
                                    a
                                    profesionálov.</div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Page counter -->
            <nav aria-label="Product pagination" class="d-flex justify-content-center mt-4">
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
            </nav>                       
        </main>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/category/scripts.js') }}"></script>
@endsection