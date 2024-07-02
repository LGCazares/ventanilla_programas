<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta de bienvenida
Route::get('/', [HomeController::class,'welcome'])->name('welcome');
// Home
Route::get('/home', function(){
    abort(403,'Acceso denegado');
})->name('home');

// Ruta de prueba
Route::get('/prueba', function () {
    //return view('welcome');
    abort(503);
})->name('prueba');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
