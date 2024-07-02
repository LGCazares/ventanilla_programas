<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome(){
        $user = Auth::user();
        if(isset($user->idUsuario)){
            if(
                $user->hasRole(Permiso::TURISMO) ||
                $user->hasRole(Permiso::SEDUVI)
            ){
                // return redirect()->route('administrador.bandeja');
            }elseif ($user->hasRole(Permiso::CIUDADANO)){
                // Auth::logout();
                return redirect()->route('home');
            }
        }

        return view('welcome');
    }
}
