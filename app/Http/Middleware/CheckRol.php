<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        if (!Auth::guard('web')->check()){
            abort(407, 'Debes iniciar sesión para acceder a este recurso');
        }
        $user = Auth::guard('web')->user();

        foreach($roles as $role) {
            if($user->hasRole($role)){
                return $next($request);
            }
        }

        abort(403, 'No tienes permiso para ver este recurso');
    }
}
