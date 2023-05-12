@extends('frontend.index')
@section('content')
    <div class="container py-4 my-3">
        <div class="mt-5">
            <div class="container col-md-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <p class="nav-link active text-bg-dark" aria-current="page">Mi carrito</p>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link disabled">Pago</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Fin del pedido</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-5 col-12">
            <div class="col-md-8">
                <div class="card p-4 mt-3">
                    <div class="card-header">
                        <h5>Método de pago</h5>
                    </div>
                    <div class="card-body mx-auto">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off"
                                   checked>
                            <label class="btn btn-outline-danger" for="option1">
                                <i class="bi bi-credit-card"></i>
                                Tarjeta
                            </label>
                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                            <label class="btn btn-outline-danger" for="option2">
                                <i class="bi bi-card-heading"></i>
                                Cheque
                            </label>

                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                            <label class="btn btn-outline-danger" for="option4">
                                <i class="bi bi-cash-stack"></i>
                                Efectivo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card p-sm-4 mt-3">
                    <div>
                        <div class="card-header">
                            <h5>Mi Carrito</h5>
                            <span class="fw-light">
                                Productos disponibles
                            </span>
                        </div>
                        <div class="card-body">
                            <span class="fw-light">
                                No tienes productos en tu carrito
                            </span>
                            <ul class="list-group">
                                <template>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-sm-2 my-auto">
                                                <img src="product.url" width="100%" alt="product.name"
                                                     title="product.name">
                                            </div>
                                            <div class="col-sm-5 my-auto">
                                                <div class="row">
                                                    <span class="col-sm-12 fw-bold"></span>
                                                    <div class="col-sm-12 fw-light">
                                                        <label for="amount">Precio unitario</label>
                                                        <span class="col-sm-12">Q0.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 my-auto">
                                                <div class="bg-dark-subtle rounded-pill px-3 row">
                                                    <div class="fw-light my-auto col-5 col-sm-6">
                                                        Subtotal: <span class="fw-bold">Q0.00</span>
                                                    </div>
                                                    <div
                                                        class="bg-light-subtle d-flex align-items-center rounded-pill col-4 my-2">
                                                        <button class="btn p-0 m-0"
                                                                x-on:click="decreaseAmount(product.productId)">
                                                            <i class="bi bi-dash fs-4"></i>
                                                        </button>
                                                        <span x-text="product.amount"></span>
                                                        <button class="btn p-0 m-0"
                                                                x-on:click="increaseAmount(product.productId)">
                                                            <i class="bi bi-plus fs-4"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-2 col-sm-2 mx-auto my-auto">
                                                        <button class="btn p-0 m-0"
                                                                x-on:click="removeProduct(product.productId)">
                                                            <i class="bi bi-trash-fill fs-4 text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-3 px-3 py-2">
                    <div class="card-header text-center">
                        <h5>Resumen</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6 class="col-2 text-start">Total</h6>
                            <h6 class="col text-end" x-text="'Q'+total.toFixed(2)">Q0.00</h6>
                        </div>
                        <div class="d-grid gap-2 col-12 mt-4 mx-auto">
                            <button class="btn btn-warning text-dark" type="button">
                                Finalizar compra
                                <i class="bi bi-arrow-right"></i>
                            </button>
                            <a href="/#products" class="btn btn-primary" type="button">
                                <i class="bi bi-plus-circle-fill"></i>
                                Agregar otro producto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function decreaseAmount(productId) {
            let products = JSON.parse(localStorage.getItem('products'));
            if (products[productId]) {
                products[productId].amount -= 1;
                localStorage.setItem('products', JSON.stringify(products));
            }
            setTimeout(function () {
                window.location.reload();
            }, 500);
        }

        function increaseAmount(productId) {
            let products = JSON.parse(localStorage.getItem('products'));
            if (products[productId]) {
                products[productId].amount += 1;
                localStorage.setItem('products', JSON.stringify(products));
            }
            setTimeout(function () {
                window.location.reload();
            }, 500);
        }

        function removeProduct(productId) {
            const products = JSON.parse(localStorage.getItem('products'));
            if (!products || !products[productId]) {
                return;
            }
            delete products[productId];
            localStorage.setItem('products', JSON.stringify(products));
            setTimeout(function () {
                window.location.reload();
            }, 500);
        }


    </script>
@endpush
