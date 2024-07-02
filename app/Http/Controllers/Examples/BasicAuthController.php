<?php

namespace App\Http\Controllers\Examples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicAuthController extends Controller
{
    public function index(){
        return view('examples.homeBA');
    }
}
