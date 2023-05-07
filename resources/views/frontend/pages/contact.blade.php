@extends('frontend.index')

@section('content')
    <div class="container">
        <p class="display-4 text-center">Ponerse en contácto</p>
        <div class="card p-4">
            <div class="card-group">
                @forelse($settings as $setting)
                    <div class="col-sm-4">
                        <div class="card m-1">
                            {!! $setting['icon'] !!}
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <ul class="text-center list-group">
                                    @foreach($setting['links'] as $link)
                                        <li class="list-group-item border-0">
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
                                                <p>{!! $link['name'] !!}</p>
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
@endsection
