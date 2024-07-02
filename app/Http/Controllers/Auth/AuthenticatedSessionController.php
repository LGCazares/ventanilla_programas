<?php

namespace App\Http\Controllers\Auth;

use App\AdipUtils\LlaveCDMX;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function showLoginForm()
    {
        $autenticator = new LlaveCDMX;
        $srvLlave=$autenticator->getAuthURI();
        $clientID=$autenticator->getClientId();
        $redirectTo_=$autenticator->getRedirectTo();
        $randomChars = Str::random(64);
        $uriGetCode=$srvLlave.'?client_id='.$clientID.'&redirect_url='.$redirectTo_.'&state='.$randomChars;
        //
        return Redirect::away($uriGetCode);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
