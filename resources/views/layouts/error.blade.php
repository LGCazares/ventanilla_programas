<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
    <head>

        @include('partials.engine.metasss')
        <title>{{ config('app.name') }}</title>
        <script src="{{ route('statics.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}{{ strtolower(App::environment()) == 'local' ? '?v=' . microtime(true) : '' }}"
                defer></script>

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('/css/app.css') }}{{ strtolower(App::environment()) == 'local' ? '?v=' . microtime(true) : '' }}"
            rel="stylesheet">

        @if(config('app.use_frontbase'))
            <link rel="shortcut icon" href="{{ config('app.url_favico') }}"/>
        @else
            <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
            <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
            <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon192.png') }}"/>
        @endif

        @include('partials.engine.opengraph-twitter')
        @include('partials.engine.apple-pwa')
        @include('partials.engine.general-pwa')

        <script>
            var base_url = "{{ url('') }}";
        </script>
    </head>
    <body id="pg-error" class="d-flex flex-column">

    <div id="app" class="flex-fill">
        @include('partials.header')
        @include('partials.engine.noscript')
        @include('partials.engine.nonetwork')
        <main class="container-fluid px-0">
            @yield('content')
        </main>
    </div>

    @include('partials.engine.footer')

    @include('partials.engine.modal-relogi')

    @include('partials.engine.modal-loader')

    @include('partials.engine.g-analytics')

    @include('partials.engine.chat-locatel')

    @include('partials.engine.file-viewer')

    </body>
</html>
