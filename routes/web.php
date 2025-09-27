<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;

// Página de inicio
Route::get('/', function () {
    return view('inicio');
});

// Login
Route::get('/login', function () {
    return view('login');
});

// Registro
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

// Contáctenos
Route::get('/contactenos', function () {
    return view('contactenos');
});

// Error 404
Route::get('/error404', function () {
    return view('error404');
});


