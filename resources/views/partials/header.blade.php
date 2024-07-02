<header class="separator-header">
    <nav id="adip-header-nav" class="navbar navbar-expand-md py-0 w-100" style="min-width:360px;background-color:#FFF;">
        @if(config('app.use_frontbase'))
            <object id="iframeHeader"
                    data="{{ config('app.url_header') }}&isLogged={{ \Auth::check() ? 'true' : 'false' }}"
                    class="{{ \Auth::check() ? '':'btn-guest' }}">
                <p class="fb-error">No pudimos cargar el encabezado</p>
            </object>
            @auth
                <div class="dropdown only-collapsed mnu-mobile-container">
                    <a class="p-0 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        @php
                            $kual = \Auth::check() ? 'images/ico-user-morado.svg' : 'images/ico-hamburger.svg';
                            $stil = \Auth::check() ? 'width:49px;' : '';
                        @endphp
                        <span class="navbar-toggler-icon" style="{{$stil}}">
                            <img src="{{ asset($kual) }}">
                        </span>
                    </a>
                    @include('partials.menu.mobile')
                </div>
            @endauth
            @auth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('partials.menu.desktop')
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <a href="{{ config('app.url_expediente') }}" title="Ingresa a tu expediente digital" class="nav-link i-uc p-0">
                    <img src="{{ asset('images/btnLlaveExpediente.svg') }}" alt="Botón para ingresar con Llave CDMX" class="btn-llave img-fluid">
                </a>
            @endauth
            <div id="menuMobile"></div>
            <script type="text/javascript">
                window.onload = function () {
                    var isSession = {{ json_encode(Auth::check()) }};
                    if (!isSession) {
                        var logged = isSession ? "&isLogged=true" : "&isLogged=false";
                        var xmlhttp = new XMLHttpRequest();
                        var url_menu_header = '{{ config('app.url_menu') }}' + logged;

                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
                                if (xmlhttp.status == 200) {
                                    document.getElementById("menuMobile").innerHTML = xmlhttp.responseText;
                                } else {
                                    console.error('Failed to retreive mobile menu');
                                }
                            }
                        };
                        xmlhttp.open("GET", url_menu_header, false);
                        xmlhttp.send();
                    }
                }
            </script>
        @else
            <a class="navbar-brand" href="{{ route('welcome') }}" title="Inicio">
                <img src="{{ asset('images/brand.svg') }}" class="brand-logo-cdmx only-uncollapsed" alt="Logotipo del Gobierno de la Ciudad de México">
                <img src="{{ asset('images/brand-mini.svg') }}" class="brand-logo-cdmx only-collapsed" alt="Logotipo del Gobierno de la Ciudad de México">
            </a>
            @auth
            @else
                <a href="{{ config('app.url_expediente') }}" title="Ingresa a tu expediente digital"
                   class="nav-link only-collapsed p-0">
                    <img src="{{ asset('images/btnLlaveExpediente.svg') }}"
                         alt="Botón para ingresar con Llave CDMX" class="btn-llave img-fluid">
                </a>
            @endauth

            <div class="dropdown only-collapsed mnu-mobile-container">
                <a class="p-0 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    @php
                        $kual = \Auth::check() ? 'images/ico-user-morado.svg' : 'images/ico-hamburger.svg';
                        $stil = \Auth::check() ? 'width:49px;' : '';
                    @endphp
                    <span class="navbar-toggler-icon" style="{{$stil}}">
                        <img src="{{ asset($kual) }}">
                    </span>
                </a>
                @guest
                    @include('partials.menu.guest-links-mobile')
                @else
                    @include('partials.menu.mobile')
                @endguest
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    @include('partials.menu.guest-links-desktop')
                @endguest
                @auth
                    @include('partials.menu.desktop')
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ config('app.url_expediente') }}" title="Ingresa a tu expediente digital" class="nav-link only-uncollapsed">
                        <img src="{{ asset('images/btnLlaveExpediente.svg') }}" alt="Botón para ingresar con Llave CDMX" class="btn-llave img-fluid">
                    </a>
                @endauth
            </div>
        @endif
    </nav>
</header>
