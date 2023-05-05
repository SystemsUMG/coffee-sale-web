@php
    $nested = '/*';
    $urlHome = '/';

    $isHome = Request::is($urlHome);
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img
                src="https://websitedemos.net/organic-shop-02/wp-content/uploads/sites/465/2019/06/organic-store-logo5.svg"
                alt="logo"
                width="50%"
            >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
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
                </ul>
            </div>
        </div>
    </div>
</nav>
