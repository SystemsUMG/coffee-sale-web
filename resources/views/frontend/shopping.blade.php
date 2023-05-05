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
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <img
                    src="https://websitedemos.net/organic-shop-02/wp-content/uploads/sites/465/2021/03/organic-products-hero.png"
                    class="img-header"
                    alt="">
            </div>
            <div class="col-sm-6 text-start d-flex align-items-center">
                <div class="row">
                    <p class="fw-bold">
                        Best Quality Products
                    </p>
                    <p class="display-3 fw-bold">
                        Join The Organic Movement!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                        mattis,
                        pulvinar dapibus leo.
                    </p>
                    <button class="btn btn-success col-3 py-2">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Compra ahora
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
