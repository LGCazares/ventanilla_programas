<?php

namespace App\Http\Controllers;

use App;

class MetaController extends Controller
{
    /**
     * Devuelve el contenido del archivo robots.txt
     * 
     * @see https://developers.google.com/search/docs/advanced/robots/intro?hl=es
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getRobotsFile(){
        $dev = strtolower(App::environment())=='production' ? '' : 'dev.';
        $p = resource_path('engine'.DIRECTORY_SEPARATOR.'meta'.DIRECTORY_SEPARATOR.'robots.'.$dev.'txt');
        return response()->file($p);
    }

    /**
     * Devuelve el contenido del archivo humans.txt
     * 
     * @see http://humanstxt.org/ES
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getHumansFile(){
        $p = resource_path('engine'.DIRECTORY_SEPARATOR.'meta'.DIRECTORY_SEPARATOR.'humans.txt');
        return response()->file($p);
    }

    /**
     * Devuelve el contenido del archivo security.txt
     * 
     * @see https://securitytxt.org/
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getSecurityFile(){
        $p = resource_path('engine'.DIRECTORY_SEPARATOR.'meta'.DIRECTORY_SEPARATOR.'security.txt');
        $content = file_get_contents($p);
        $content = preg_replace('/%APPNAME%/',config('app.name'), $content);
        return response($content)->header('Content-Type', 'text/plain');
    }

    /**
     * Devuelve el contenido del archivo manifest para Android
     * 
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getWebmanifestFile(){
        $p = resource_path('engine'.DIRECTORY_SEPARATOR.'meta'.DIRECTORY_SEPARATOR.'manifest.webmanifest');
        $content = file_get_contents($p);
        $content = preg_replace('/%APPNAME%/',config('app.name'), $content);
        $content = preg_replace('/%APPDESCRIPTION%/',config('app.description'), $content);
        $content = preg_replace('/%ICON192%/',asset('images/android-chrome-192x192.png'), $content);
        $content = preg_replace('/%ICON512%/',asset('images/android-chrome-512x512.png'), $content);
        $content = preg_replace('/%STARTURL%/',route('welcome'), $content);
        return response($content)->header('Content-Type', 'application/json');
    }

    /**
     * Devuelve el contenido del archivo security.txt
     * 
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getIEconfigFile(){
        $p = resource_path('engine'.DIRECTORY_SEPARATOR.'meta'.DIRECTORY_SEPARATOR.'IEconfig.xml');
        $content = file_get_contents($p);
        $content = preg_replace('/%ICON150%/',asset('images/mstile-150x150.png'), $content);
        $content = preg_replace('/%ICON310%/',asset('images/mstile-310x310.png'), $content);
        return response($content)->header('Content-Type', 'application/xml');
    }
}
