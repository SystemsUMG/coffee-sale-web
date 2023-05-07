@extends('frontend.index')
@push('styles')
    <style>
        .header {
            margin-top: 5rem;
            height: 73vh;
        }

        .img-header {
            width: 40rem;
        }

        .bg-moss-green {
            background: #14261C;
        }

        .bg-green-gray {
            background: #48514C;
        }

        @media (max-width: 1250px) {
            .img-header {
                width: 24rem;
            }
            .header {
                margin-top: 0;
                height: 100vh;
            }
        }

        @media (max-width: 820px) {
            .header {
                margin-top: 0;
                height: 100%;
            }
        }

        @media (min-width: 1920px) {
            .header {
                margin-top: 8rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container header">
        <div class="row">
            <div class="col-sm-6">
                <img
                    src="{{ asset('assets/img/covers/coffee_grains.png') }}"
                    class="img-header"
                    alt="">
            </div>
            <div class="col-sm-6 text-start p-5 p-sm-3">
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
                    <a href="#products" class="btn btn-success col-sm-3 py-2">
                        <i class="bi bi-cart-fill"></i>
                        Compra ahora
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-moss-green p-4 p-sm-3 mt-0">
        <div class="row justify-content-center">
            <div class="card bg-green-gray text-light col-md-5 col-lg-4 col-xl-2 col-xxl-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="bi bi-truck fs-1 text-success"></i>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Envío gratis</h5>
                            <p class="card-text">Por encima de 5 articulos solamente</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-green-gray text-light col-md-5 col-lg-4 col-xl-3 col-xxl-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="bi bi-check-circle-fill fs-1 text-success"></i>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Producto Natural</h5>
                            <p class="card-text">100% natural garantizado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-green-gray text-light col-md-5 col-lg-4 col-xl-3 col-xxl-2 m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="bi bi-cash fs-1 text-success"></i>
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

    <div class="my-5 container py-5" id="products">
        <h3 class="text-center display-6">Productos</h3>
        <div class="swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper py-5">
                    @foreach($products as $product)
                        <div class="card swiper-slide text-center py-2" id="template-card-product">
                            <div class="image-content">
                                <div class="card-image">
                                    <img
                                        src="{!! Storage::disk('public')->url($product->images->where('type', 1)->first()->url ?? '') !!}"
                                        style="width: 25%"
                                        alt="...">
                                </div>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">{!! $product->name !!}</h3>
                                <h5 class="card-text">Q{!! $product->price !!}</h5>
                                <div class="btn-group" role="group">
                                    <button class="btn">
                                        <i class="bi bi-plus-circle-fill text-primary fs-2"></i>
                                    </button>
                                    <button onClick="getImageGallery({{ $product->id }})" class="btn">
                                        <i class="bi bi-images text-secondary fs-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="modal fade" id="modal-edit" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-3 px-4 py-2">
                    <div class="modal-header">
                        <h5 class="modal-title">Galeria de imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-content-center" id="container-images">
                        <template id="template-images">
                            <img src="" alt="..." class="img-fluid" style="width: 30%">
                        </template>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        });

        const containerImages = document.querySelector('#container-images')
        const template = document.querySelector('#template-images').content

        async function getImageGallery(productId) {
            try {
                const response = await axios.get('{{ route('api.products.imageGallery', ':id') }}'.replace(':id', productId));
                const data = response.data.data
                containerImages.innerHTML = ''
                const fragment = document.createDocumentFragment()
                data.forEach(image => {
                    template.querySelector('img').setAttribute('src', image.attributes.url)
                    const clone = template.cloneNode(true)
                    fragment.appendChild(clone)
                })
                containerImages.appendChild(fragment)
                if (containerImages.innerHTML === '') {
                    containerImages.innerHTML = `<p class="display-6 text-center mt-5">No se encontraron resultados ...</h3>`
                }
                let modal = new bootstrap.Modal(document.getElementById('modal-edit'), {
                    keyboard: false
                })
                modal.show()
            } catch (error) {
                console.error(error);
            }
        }
    </script>
@endpush
