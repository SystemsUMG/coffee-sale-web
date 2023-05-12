@extends('frontend.index')
@section('content')
    <div class="container py-4 my-3">
        <div class="mt-5">
            <div class="container col-md-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <p class="nav-link text-info disabled" aria-current="page">
                            <i class="bi bi-check"></i>
                            Mi carrito
                        </p>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active text-bg-dark">Pago</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Fin del pedido</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-5 col-12">

            <div class="card col-md-8">
                <div class="card-body">
                    <h5>Datos de la factura</h5>
                    <form>
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <x-inputs.text
                                    name="nit"
                                    label="NIT"
                                    value="{!! $user->nit !!}"
                                ></x-inputs.text>
                            </div>
                            <div class="col-sm-4">
                                <x-inputs.text
                                    name="phone"
                                    label="Teléfono"
                                    value="{!! $user->phone !!}"
                                ></x-inputs.text>
                            </div>
                            <div class="col-sm-4">
                                <x-inputs.text
                                    name="dpi"
                                    label="DPI"
                                ></x-inputs.text>
                            </div>
                            <div class="col-sm-12">
                                <x-inputs.text
                                    name="address"
                                    label="Dirección"
                                    value="{!! $user->address !!}"
                                ></x-inputs.text>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h5 class="mt-5">Datos de la tarjeta</h5>
                    <form id="card" class="mt-4">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <x-inputs.number
                                    name="card_number"
                                    label="Número de tarjeta"
                                    required
                                ></x-inputs.number>
                            </div>
                            <div class="col-sm-6">
                                <x-inputs.text
                                    name="card_name"
                                    label="Nombre impreso en la tarjeta"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="col-sm-3">
                                <x-inputs.date
                                    name="expiration_date"
                                    label="Fecha de expiración"
                                    required
                                ></x-inputs.date>
                            </div>
                            <div class="col-sm-3">
                                <x-inputs.number
                                    name="CVV"
                                    label="CVV"
                                    required
                                ></x-inputs.number>
                            </div>
                        </div>
                    </form>
                    <form id="check" class="mt-4">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <x-inputs.number
                                    name="check_number"
                                    label="Número de cheque"
                                    required
                                ></x-inputs.number>
                            </div>
                        </div>
                    </form>
                    <form id="cash" class="mt-4">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <x-inputs.number
                                    name="authorization_number"
                                    label="Número de autorización"
                                    required
                                ></x-inputs.number>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mt-3 px-3 py-2">
                    <div class="card-header text-center">
                        <h5>Resumen</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <ul class="list-group border-0" id="shopping-container">
                            <template id="shopping-products">
                                <li class="list-group-item border-0 border-bottom">
                                    <div class="row">
                                        <div class="col-sm-3 my-auto">
                                            <img src="" width="100%" alt="...">
                                        </div>
                                        <div class="col my-auto">
                                            <div class="row">
                                                <span class="col-sm-12 fw-bold title"></span>
                                            </div>
                                        </div>
                                        <div class="col my-auto text-end">
                                            <span class="fw-bold subTotal">Q0.00</span>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                        <div class="row mt-4">
                            <h6 class="col-3 fw-bold text-start">Total</h6>
                            <h6 class="col fw-bold text-end" id="shopping-total">Q0.00</h6>
                        </div>
                        <div class="d-grid gap-2 col-12 mt-4 mx-auto">
                            <a class="btn btn-warning text-dark" onclick=""
                               type="button" id="hide-checkout-button">
                                Finalizar compra
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="{{ route('shopping.cart') }}" class="btn btn-primary" type="button">
                                <i class="bi bi-arrow-left"></i>
                                Regresar a mi carrito
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
                shoppingProducts.querySelector('.subTotal').textContent = 'Q' + total.toFixed(2)
                const clone = shoppingProducts.cloneNode(true)
                fragment.appendChild(clone)
            })
            shoppingContainer.appendChild(fragment)

            const shoppingTotal = document.getElementById('shopping-total');
            shoppingTotal.textContent = 'Q' + shopping.total.toFixed(2)
        }, 700);

        const paymentMethod = localStorage.getItem("paymentMethod");
        if (paymentMethod === "tarjeta") {
            document.querySelector("#card").style.display = "block";
            document.querySelector("#check").style.display = "none";
            document.querySelector("#cash").style.display = "none";
        } else if (paymentMethod === "cheque") {
            document.querySelector("#card").style.display = "none";
            document.querySelector("#check").style.display = "block";
            document.querySelector("#cash").style.display = "none";
        } else if (paymentMethod === "efectivo") {
            document.querySelector("#card").style.display = "none";
            document.querySelector("#check").style.display = "none";
            document.querySelector("#cash").style.display = "block";
        }


        function finalizePurchase() {

        }
    </script>
@endpush
