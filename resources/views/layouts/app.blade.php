<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
    <head>

        @include('partials.engine.metasss')
        <title>{{ config('app.name') }}</title>
        <script src="{{ route('statics.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}{{ strtolower(App::environment()) == 'local' ? '?v=' . microtime(true) : '' }}"
            defer></script>

        {{-- RECAPTCHA GOOGLE --}}
        {{-- @if(has_recaptcha(request()->route()->uri))
            <!-- <script src="https://www.google.com/recaptcha/api.js?render={{ config('engine.captcha_key') }}"></script> -->
        @endif --}}
        {{-- RECAPTCHA GOOGLE --}}

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link
            href="{{ asset('/css/app.css') }}{{ strtolower(App::environment()) == 'local' ? '?v=' . microtime(true) : '' }}"
            rel="stylesheet">

        @if (config('app.use_frontbase'))
            <link rel="shortcut icon" href="{{ config('app.url_favico') }}" />
            <!-- <link rel="stylesheet" type="text/css" href="https://dev.frontendbase.cdmx.gob.mx/file-server/resources/header/adip_dynheader_ext.css?v=1697140571104" /> -->
            <style>
                .adip-menu-btn-mobile {
                    background-image: url('https://dev.frontendbase.cdmx.gob.mx/file-server/resources/header/sesion_mobile.svg?v=1697140571107') !important;
                }

                #frmAdipHeaderMenu\:mnuAdipHeaderOptions_menu {
                    z-index: 9995 !important;
                    top: 62px !important;
                    left: calc(100% - 246px) !important;
                    font-family: 'Montserrat' !important;
                }

                #adip-header-nav .navbar-collapse .nav-link-adip-llave {
                    max-height: 70px;
                    display: flex;
                    flex-wrap: wrap;
                    align-content: center;
                    align-items: center;
                    justify-content: center;
                    background-color: #fff;
                }

                .ui-panelgrid-login .ui-panelgrid-cell {
                    border: none !important;
                }

                header {
                    background: #fff !important;
                }
            </style>
        @else
            <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
            <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
            <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon192.png') }}" />
        @endif

        @include('partials.engine.opengraph-twitter')
        @include('partials.engine.apple-pwa')
        @include('partials.engine.general-pwa')


        <script>
            var base_url = "{{ url('') }}";
        </script>
        @livewireStyles
    </head>
    <body class="d-flex flex-column">
        @if (config('engine.home_disabled') && \Request::route()->getName() == 'welcome')
            <div class="loader"></div>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
        <div id="app" class="flex-fill @if (Route::is('welcome')) bg @else bg-bluelight @endif">
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
        @livewireScripts

        @if (config('app.use_frontbase'))
            <script type="text/javascript">
                window.addEventListener("message",
                    function(e) {
                        document.getElementById("footerIframe").style.height = e.data;
                    },
                    false);
            </script>
        @endif

        {{-- RECAPTCHA GOOGLE --}}
        @stack('recaptcha-script')
        {{-- RECAPTCHA GOOGLE --}}

    </body>
</html>