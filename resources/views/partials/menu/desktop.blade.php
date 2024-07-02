@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Permiso;

    $user = Auth::user();
    if(isset($user->idUsuario)){
        if(
            $user->hasRole(Permiso::TURISMO) ||
            $user->hasRole(Permiso::SEDUVI)
        ){
            $ruta = "administrador.bandeja";
        }elseif($user->hasRole(Permiso::CIUDADANO)){
            $ruta = "auxiliar.carnet";
        }
    }
@endphp
<ul class="navbar-nav ml-auto only-uncollapsed">
    <div class="btn-expediente-copntainer py-2">
        <a href="{{ config('app.url_expediente') }}" target="_blank" class="cont-img" title="Abrir expediente digital en una nueva pestaña">
            <img class="img-fluid goto-expediente-menu" src="{{ asset('images/btnLlaveLoggedIn.svg') }}"
                alt="Imagen que contiene el icono de Llave CDMX">
        </a>
        <li class="nav-item dropdown">
            <a id="navbarDropdownTenant" class="llave-cdmx nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span>{{ strtoupper(Auth::user()->nombre) }}</span>
                <img src="{{ asset('images/icon-op-menu.svg') }}" alt="Abrir menú">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownTenant">
                <a class="dropdown-item rosita" href="{{ config('app.url_expediente') }}">
                    Consulta tu <br> <strong>Expediente</strong>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route($ruta) }}">
                    Bandeja de Trámites
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
            </div>
        </li>
    </div>
</ul>
