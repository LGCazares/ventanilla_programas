<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{View, Response};

class StaticsController extends Controller
{
    public function getStaticsJS(){
        $contents = View::make('engine.staticJS');
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'application/javascript');
        return $response;
    }
}
