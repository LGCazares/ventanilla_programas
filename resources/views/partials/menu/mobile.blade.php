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
<div class="dropdown-menu dropdown-menu-right mnu-mobile">
    <a class="dropdown-item" href="{{  config('app.url_expediente') }}" target="_blank"><span class="rosita">Consulta tu <br><strong>Expediente</strong></span></a>
    <a class="dropdown-item" href="{{ route($ruta) }}"><span>Bandeja de Trámites</span></a>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span>Cerrar sesión</span>
    </a>
</div>
