@php
    $settings = \App\Models\Setting::get()
@endphp
<footer class="bg-black mt-5 pt-4">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2 class="footer-heading">
                <img src="{{ asset('assets/img/logo.png') }}" width="10%" alt="...">
            </h2>
        </div>
    </div>
    <div class="col-12 border-top mt-4 pt-2 pb-1 row text-center">
        <div class="col">
            <p class="text-light-emphasis">
                Desarrollado por Grupo 6 &copy;
                <script>document.write(new Date().getFullYear());</script>
            </p>
        </div>
        <div class="col">
            @foreach($settings as $setting)
                @if (!Str::startsWith($setting->value, 'https://') && !Str::startsWith($setting->value, 'http://'))
                    <a href="{{ "https://".$setting->value }}" target="_blank" class="text-light-emphasis"
                       rel="noopener noreferrer">{!! $setting->name !!}</a>
                @else
                    <a href="{{ $setting->value }}" target="_blank" class="text-light-emphasis"
                       rel="noopener noreferrer">{!! $setting->name !!}</a>
                @endif
            @endforeach
        </div>
    </div>
</footer>
