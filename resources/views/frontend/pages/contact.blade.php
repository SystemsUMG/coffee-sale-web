@extends('frontend.index')

@push('styles')
    <style>
        .bg-image {
            position: relative;
            height: 92vh;
        }

        .bg-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('assets/img/covers/cover-contact.jpg') }}');
            background-size: cover;
            background-position: center;
            filter: blur(5px) brightness(0.5);
        }

        .content {
            margin: 0 auto;
            color: #fff;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
        }


    </style>
@endpush

@section('content')
    <div class="row text-dark">
        <div class="bg-image col-md-8">
            <div class="content p-5 h-100">
                <div class="row">
                    <span class="display-4 col-md-12 fw-bold">Contacto - Descubre nuestro café</span>
                    <span class="col-md-8 fs-5">
                        ¿Tienes alguna pregunta o sugerencia sobre nuestro café? <br>
                        Contáctanos a través de nuestro formulario en línea o nuestras redes sociales. Estamos listos
                        para ayudarte y compartir nuestra pasión por el café contigo.
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <form class="rounded-0 border-0 bg-warning p-5 d-flex align-items-center" style="height: 92vh;">
                <div class="container">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                        <div id="emailHelp" class="text-dark fw-light"> Nunca compartiremos tú correo electrónico con
                            nadie
                            más.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMessage" class="form-label">Mensaje</label>
                        <textarea id="exampleInputMessage" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container mt-5">
            <div class="card col-md-7 mx-auto mt-3 shadow-sm p-3">
                <div class="card-group">
                    @forelse($settings as $setting)
                        <div class="col-sm-4">
                            <div class="card m-3">
                                {!! $setting['icon'] !!}
                                <div class="card-body pt-0">
                            <div class="card m-1">
                                {!! $setting['icon'] ?? '' !!}
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <ul class="text-center list-group">
                                        @foreach($setting['links'] as $link)
                                            <li class="list-group-item border-0 p-0 m-0">
                                                @if ($link['url'])
                                                    @if (!Str::startsWith($link['url'], 'https://') && !Str::startsWith($link['url'], 'http://'))
                                                        <a href="{{ "https://".$link['url'] }}" target="_blank"
                                                           class="text-decoration-none"
                                                           rel="noopener noreferrer">{!! $link['name'] !!}</a>
                                                    @else
                                                        <a href="{{ $link['url'] }}" target="_blank"
                                                           class="text-light-emphasis"
                                                           rel="noopener noreferrer">{!! $link['name'] !!}</a>
                                                    @endif
                                                @else
                                                    <span>{!! $link['name'] !!}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
