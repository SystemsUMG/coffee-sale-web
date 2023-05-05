@php
    $nested = '/*';
    $urlHome = '/';

    $isHome = Request::is($urlHome);
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container-fluid">
        <div class="row col-12 col-sm-3">
            <div class="col-9">
                <img
                    src="{{ asset('assets/img/favicon.png') }}"
                    alt="logo"
                >
            </div>
            <div class="col">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img
                        src="{{ asset('assets/img/logo.png') }}"
                        alt="logo"
                        width="15%"
                    >
                    Cafetenango
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link {{ ($isHome ? 'active' : '') }}" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contácto</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="position-relative text-success">
                                <i class="fa-solid fa-bag-shopping fa-xl"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-success">
                                    2+
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <button
                            class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                            id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <i class="fa-solid fa-moon theme-icon-active"></i>
                            <span class="d-lg-none ms-2">{{ __('Tema') }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="light">
                                    <i class="fa-solid fa-sun me-1 theme-icon"></i>
                                    Light
                                    <i class="fa-solid fa-check d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                        data-bs-theme-value="dark">
                                    <i class="fa-solid fa-moon me-1 theme-icon"></i>
                                    Dark
                                    <svg class="bi ms-auto d-none"></svg>
                                    <i class="fa-solid fa-check d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="auto">
                                    <i class="fa-solid fa-circle-half-stroke me-1 theme-icon"></i>
                                    Auto
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                    <i class="fa-solid fa-check d-none"></i>
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
