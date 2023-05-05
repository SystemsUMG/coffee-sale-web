@extends('frontend.index')
@push('styles')
    <style>
        .img-header {
            width: 40rem;
        }

        @media (max-width: 1250px) {
            .img-header {
                width: 24rem;
            }
        }
    </style>
@endpush
@section('content')
    <div class="container pt-5 mt-5 mb-0 pb-0 vh-100">
        <div class="row">
            <div class="col-sm-6">
                <img
                    src="{{ asset('assets/img/covers/coffee_grains.png') }}"
                    class="img-header"
                    alt="">
            </div>
            <div class="col-sm-6 text-start d-flex align-items-center p-5 p-sm-3">
                <div class="row">
                    <p class="fw-bold">
                        Productos de la mejor calidad
                    </p>
                    <p class="display-3 fw-bold">
                        ¡Disfruta del sabor y aroma con nuestro café en grano y molido!
                    </p>
                    <p>
                        Nuestro café es cuidadosamente seleccionado y tostado para resaltar su sabor y
                        aroma. Disfruta del café perfecto con nuestra selección de granos o café molido, para una
                        experiencia excepcional en cada taza.
                    </p>
                    <button class="btn btn-success col-sm-3 py-2">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Compra ahora
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black p-4 mt-0 p-sm-3">
        <div class="row justify-content-center">
            <div class="card text-bg-dark col-sm-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center">
                            <i class="fa-solid fa-truck fa-2xl"></i>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Envío gratis</h5>
                            <p class="card-text">Por encima de 5 articulos solamente</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-bg-dark col-sm-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center">
                            <i class="fa-solid fa-circle-check fa-2xl"></i>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Producto Natural</h5>
                            <p class="card-text">100% natural garantizado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-bg-dark col-sm-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center">
                            <i class="fa-solid fa-money-bill-wave fa-2xl"></i>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Grandes ahorros</h5>
                            <p class="card-text">Al precio más bajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 container">
        <h3 class="text-center display-6">Productos</h3>

        <div class="card-group text-center mt-5 mb-5">
            <div class="card border-0">
                <div class="text-center p-1">
                    <img src="{{ asset('assets/img/products/coffee_bag.png') }}"
                         style="width: 25%"
                         alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Café </h5>
                    <p class="card-text">Q35</p>
                </div>
            </div>
            <div class="card border-0">
                <div class="text-center p-1">
                    <img src="{{ asset('assets/img/products/coffee_beans.jpg') }}"
                         style="width: 38%"
                         alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Café en Grano</h5>
                    <p class="card-text">Q35</p>
                </div>
            </div>
            <div class="card border-0">
                <div class="text-center p-1">
                    <img src="{{ asset('assets/img/products/ground_coffee.png') }}"
                         style="width: 38%"
                         alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Café Molido</h5>
                    <p class="card-text">Q35</p>
                </div>
            </div>
        </div>
    </div>
@endsection
