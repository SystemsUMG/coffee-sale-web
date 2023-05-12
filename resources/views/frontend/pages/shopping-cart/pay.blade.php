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

            <div class="card col-md-8 opacity-75">
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
                    <svg width="44" height="31" viewBox="0 0 44 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="opacity: 1; margin-right: 10px;">
                        <rect y="0.321289" width="43.1522" height="30" rx="5.83333" fill="#00579F"></rect>
                        <path d="M18.4634 20.4247H16.0234L17.5495 10.8577H19.9893L18.4634 20.4247Z" fill="white"></path>
                        <path
                            d="M27.3074 11.0919C26.8261 10.8983 26.0628 10.6846 25.119 10.6846C22.7095 10.6846 21.0127 11.9872 21.0023 13.8497C20.9823 15.2238 22.2171 15.987 23.1407 16.4451C24.0847 16.9133 24.4055 17.2189 24.4055 17.6362C24.3959 18.2771 23.6428 18.5726 22.9403 18.5726C21.9662 18.5726 21.4442 18.4203 20.651 18.0637L20.3297 17.9108L19.9883 20.0584C20.5605 20.3227 21.6149 20.5573 22.7095 20.5676C25.2696 20.5676 26.9363 19.2851 26.9561 17.3003C26.9658 16.2113 26.3138 15.3768 24.908 14.6949C24.0546 14.2571 23.532 13.9619 23.532 13.5141C23.542 13.1069 23.9741 12.6898 24.9374 12.6898C25.7306 12.6694 26.3134 12.8627 26.7549 13.0562L26.9756 13.1578L27.3074 11.0919Z"
                            fill="white"></path>
                        <path
                            d="M30.5484 17.0354C30.7493 16.4858 31.5225 14.3586 31.5225 14.3586C31.5124 14.3791 31.7231 13.7989 31.8435 13.4427L32.0141 14.2671C32.0141 14.2671 32.4761 16.5571 32.5764 17.0354C32.1951 17.0354 31.0303 17.0354 30.5484 17.0354ZM33.5602 10.8577H31.6729C31.0909 10.8577 30.6487 11.0305 30.3976 11.6514L26.7734 20.4245H29.3336C29.3336 20.4245 29.7551 19.2437 29.8457 18.9894C30.1265 18.9894 32.617 18.9894 32.9783 18.9894C33.0484 19.3253 33.2694 20.4245 33.2694 20.4245H35.5286L33.5602 10.8577Z"
                            fill="white"></path>
                        <path
                            d="M13.9849 10.8577L11.5954 17.3814L11.3343 16.0583C10.8925 14.5317 9.50705 12.873 7.96094 12.0482L10.1496 20.4145H12.7298L16.5649 10.8577H13.9849Z"
                            fill="white"></path>
                        <path
                            d="M9.37591 10.8577H5.45032L5.41016 11.051C8.47237 11.8449 10.5004 13.7586 11.3336 16.0588L10.4803 11.6619C10.3398 11.0508 9.90801 10.8778 9.37591 10.8577Z"
                            fill="#FAA61A"></path>
                    </svg>
                    <svg width="44" height="31" viewBox="0 0 44 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="opacity: 1;">
                        <rect x="0.117188" y="0.321289" width="43.1522" height="30" rx="5.83333" fill="black"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.9994 21.7673C20.5303 23.0528 18.6245 23.8288 16.5421 23.8288C11.8956 23.8288 8.12891 19.9655 8.12891 15.2C8.12891 10.4345 11.8956 6.57129 16.5421 6.57129C18.6245 6.57129 20.5303 7.3473 21.9994 8.63275C23.4686 7.34732 25.3743 6.57133 27.4568 6.57133C32.1032 6.57133 35.8699 10.4345 35.8699 15.2001C35.8699 19.9656 32.1032 23.8288 27.4568 23.8288C25.3743 23.8288 23.4685 23.0528 21.9994 21.7673Z"
                              fill="#ED0006"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M22 21.7673C23.8088 20.1846 24.9558 17.8297 24.9558 15.2C24.9558 12.5703 23.8088 10.2154 22 8.63273C23.4691 7.34729 25.3749 6.57129 27.4574 6.57129C32.1038 6.57129 35.8705 10.4345 35.8705 15.2C35.8705 19.9655 32.1038 23.8288 27.4574 23.8288C25.3749 23.8288 23.4691 23.0528 22 21.7673Z"
                              fill="#F9A000"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.9988 21.7674C23.8076 20.1847 24.9546 17.8298 24.9546 15.2001C24.9546 12.5704 23.8076 10.2155 21.9988 8.63281C20.1899 10.2155 19.043 12.5704 19.043 15.2001C19.043 17.8298 20.1899 20.1847 21.9988 21.7674Z"
                              fill="#FF5E00"></path>
                    </svg>
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
                        <ul class="list-group border-0 opacity-50" id="shopping-container">
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
                            <button class="btn btn-warning text-dark" onClick="finalizePurchase()"
                                    type="button" id="hide-checkout-button">
                                Finalizar compra
                                <i class="bi bi-arrow-right"></i>
                            </button>
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
        let products;
        let sale_id;
        const shoppingContainer = document.querySelector('#shopping-container')
        setTimeout(function () {
            const shopping = window.shopping
            products = shopping.products

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
        }, 800);

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
            const loaderElement = document.getElementById("loader");
            loaderElement.classList.remove("d-none");
            const items = {};
            Object.keys(products).forEach(key => {
                items[key] = {
                    id: products[key].productId,
                    amount: products[key].amount
                };
            });
            let paymentMethodId;
            if (paymentMethod === "tarjeta") {
                paymentMethodId = 1;
            } else if (paymentMethod === "cheque") {
                paymentMethodId = 2;
            } else if (paymentMethod === "efectivo") {
                paymentMethodId = 3;
            }

            axios.post('{{ route('api-sales.store') }}', {
                withCredentials: true,
                headers: {
                    'X-XSRF-TOKEN': "{{csrf_token()}}"
                },
                'user_id': {!! $user->id !!},
                'transaction_number': "{!! Str::random(16) !!}",
                'payment_type': paymentMethodId,
                'items': items,
                'date_generated': "{{ \Carbon\Carbon::now() }}"
            })
                .then(function (response) {
                    sale_id = response.data.sale_id;
                    showToast('Éxito', response.data.message, 'success', 'bi bi-check-circle-fill text-success fs-3 me-2');
                })
                .catch(function (error) {
                    showToast('Error', error.response.data.message, 'danger', 'bi bi-x-circle-fill text-danger fs-3 me-2');
                })
                .finally(function () {
                    localStorage.removeItem("products")
                    localStorage.removeItem("paymentMethod")
                    window.location.href = '{{ route('shopping.end-of-order', ':sale_id') }}'.replace(':sale_id', sale_id);
                });
        }
    </script>
@endpush
