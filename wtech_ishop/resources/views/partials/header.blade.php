<header style="background-color: #DBD9DB;" class="shadow-sm">
    <div class="container-fluid p-2 d-flex justify-content-between align-items-center">
        <a href="{{ route('index') }}" id="logo" class="fs-4 fw-bold text-dark text-decoration-none ms-4">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" style="height: 40px;">
        </a>

        <form id="searchForm" class="d-flex flex-grow-1 mx-3 w-100 d-sm-flex d-none" style="max-width: 600px;">
            <input id="searchInput" class="form-control me-2 rounded-pill" type="search" placeholder="Search">
            <button id="searchButton" class="btn btn-primary d-sm-block d-none rounded-pill" type="submit" style="background-color: #45503B; border-color: #45503B;">
                Search
            </button>
        </form>
        <div class="d-flex align-items-center">
            <button id="searchToggle" class="btn d-block d-sm-none me-3">
                <i class="bi bi-search"></i>
            </button>
            @php
                $user = session('user');
            @endphp

            <span class="me-2 d-none d-lg-inline" style="color: #45503B;">
                @if ($user)
                    {{ $user->username }}
                @else
                    Prihlásiť sa
                @endif
            </span>

            <a href="{{ $user ? route('account') : route('login') }}" class="text-dark me-3">
                <i class="bi bi-person-circle fs-4" style="color: #45503B;"></i>
            </a>

            <a href="{{ route('cart.1') }}" class="text-dark me-3">
                <i class="bi bi-cart fs-4" style="color: #45503B;"></i>
            </a>
            {{-- tu sa doplní špecifický button iba ak ho šablóna zadá --}}
            @yield('extra-header-button')
        </div>
    </div>
</header>