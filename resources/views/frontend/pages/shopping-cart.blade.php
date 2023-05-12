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
                            <input type="radio" class="btn-check" name="options" id="tarjeta" autocomplete="off"
                                   checked>
                            <label class="btn btn-outline-danger" for="tarjeta">
                                <i class="bi bi-credit-card"></i>
                                Tarjeta
                            </label>
                            <input type="radio" class="btn-check" name="options" id="cheque" autocomplete="off">
                            <label class="btn btn-outline-danger" for="cheque">
                                <i class="bi bi-card-heading"></i>
                                Cheque
                            </label>
                            <input type="radio" class="btn-check" name="options" id="efectivo" autocomplete="off">
                            <label class="btn btn-outline-danger" for="efectivo">
                                <i class="bi bi-cash-stack"></i>
                                Efectivo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card p-sm-4 mt-3">
                    <div class="card-header">
                        <h5>Mi Carrito</h5>
                    </div>
                    <span class="fw-light" id="shopping-description">
                            description
                        </span>
                    <div class="card-body">
                        <ul class="list-group border-0" id="shopping-container">
                            <template id="shopping-products">
                                <li class="list-group-item border-0 border-bottom">
                                    <div class="row">
                                        <div class="col-sm-2 my-auto">
                                            <img src="" width="100%" alt="...">
                                        </div>
                                        <div class="col-sm-4 my-auto">
                                            <div class="row">
                                                <span class="col-sm-12 fw-bold title"></span>
                                                <div class="col-sm-12 fw-light">
                                                    <label for="price">Precio unitario</label>
                                                    <span class="col-sm-12 price">Q0.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 my-auto">
                                            <div class="bg-dark-subtle rounded-pill px-3 row">
                                                <div class="fw-light my-auto col-5 col-sm-7">
                                                    Subtotal: <span class="fw-bold subTotal">Q0.00</span>
                                                </div>
                                                <div
                                                    class="bg-light-subtle d-flex align-items-center rounded-pill col-3 my-2">
                                                    <button class="btn p-0 m-0 decrease-amount">
                                                        <i class="bi bi-dash fs-4"></i>
                                                    </button>
                                                    <span class="amount"></span>
                                                    <button class="btn p-0 m-0 increase-amount">
                                                        <i class="bi bi-plus fs-4"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2 col-sm-1 mx-auto my-auto">
                                                    <button class="btn p-0 m-0 remove-product">
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

            <div class="col-md-4">
                <div class="card mt-3 px-3 py-2">
                    <div class="card-header text-center">
                        <h5>Resumen</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6 class="col-2 text-start">Total</h6>
                            <h6 class="col text-end" id="shopping-total">Q0.00</h6>
                        </div>
                        <div class="d-grid gap-2 col-12 mt-4 mx-auto">
                            <button class="btn btn-warning text-dark" onClick="finalizePurchase()"
                                    type="button" id="hide-checkout-button">
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
        let selectedPaymentMethod = 'tarjeta';
        const shoppingContainer = document.querySelector('#shopping-container')

        setTimeout(function () {
            const shopping = window.shopping
            const products = shopping.products

            const shoppingProducts = document.getElementById('shopping-products').content;
            const fragment = document.createDocumentFragment()

            products.forEach(product => {
                const {productId, url, name, price, total, amount} = product
                shoppingProducts.querySelector('img').setAttribute('src', url)
                shoppingProducts.querySelector('.title').textContent = name
                shoppingProducts.querySelector('.price').textContent = 'Q' + price.toFixed(2)
                shoppingProducts.querySelector('.subTotal').textContent = 'Q' + total.toFixed(2)
                shoppingProducts.querySelector('.decrease-amount').dataset.id = productId
                shoppingProducts.querySelector('.amount').textContent = amount
                shoppingProducts.querySelector('.decrease-amount').dataset.id = productId
                shoppingProducts.querySelector('.decrease-amount').dataset.type = 'decrease-amount'
                shoppingProducts.querySelector('.increase-amount').dataset.id = productId
                shoppingProducts.querySelector('.increase-amount').dataset.type = 'increase-amount'
                shoppingProducts.querySelector('.remove-product').dataset.id = productId
                shoppingProducts.querySelector('.remove-product').dataset.type = 'remove-product'
                const clone = shoppingProducts.cloneNode(true)
                fragment.appendChild(clone)
            })
            shoppingContainer.appendChild(fragment)

            const shoppingTotal = document.getElementById('shopping-total');
            const shoppingDescription = document.getElementById('shopping-description');
            const hideCheckoutButton = document.getElementById('hide-checkout-button');
            shoppingTotal.textContent = 'Q' + shopping.total.toFixed(2)
            shoppingDescription.textContent = products.length <= 0 ? ' No tienes productos en tu carrito' : 'Productos disponibles'
            hideCheckoutButton.style.display = products.length <= 0 ? "none" : "";

            detectButtons(products)
            savePaymentMethod()
        }, 700);

        const detectButtons = (products) => {
            const botones = document.querySelectorAll('.card button')

            botones.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (btn.dataset.type === 'decrease-amount') {
                        decreaseAmount(btn.dataset.id)
                    } else if (btn.dataset.type === 'increase-amount') {
                        increaseAmount(btn.dataset.id)
                    } else if (btn.dataset.type === 'remove-product') {
                        removeProduct(btn.dataset.id)
                    }
                })
            })
        }

        function decreaseAmount(productId) {
            let products = JSON.parse(localStorage.getItem('products'));
            if (products[productId]) {
                products[productId].amount -= 1;
                localStorage.setItem('products', JSON.stringify(products));
            }
            window.location.reload();
        }

        function increaseAmount(productId) {
            let products = JSON.parse(localStorage.getItem('products'));
            if (products[productId]) {
                products[productId].amount += 1;
                localStorage.setItem('products', JSON.stringify(products));
            }
            window.location.reload();
        }

        function removeProduct(productId) {
            const products = JSON.parse(localStorage.getItem('products'));
            if (!products || !products[productId]) {
                return;
            }
            delete products[productId];
            localStorage.setItem('products', JSON.stringify(products));
            window.location.reload();
        }

        function savePaymentMethod() {
            const radios = document.getElementsByName('options');
            radios.forEach(radio => {
                radio.addEventListener('click', () => {
                    selectedPaymentMethod = radio.id;
                });
            });
        }

        function finalizePurchase() {

        }
    </script>
@endpush
