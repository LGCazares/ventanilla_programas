<?php

namespace App\Http\Controllers\Invitados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('invitados.home');
    }
}
