<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\ContactoController;

// Página de inicio
Route::get('/', function () {
    return view('inicio');
});

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Registro
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

// Contáctenos
Route::get('/contactenos', function () {
    return view('contactenos');
})->name('contacto.form'); // nombre opcional para redirect o mensajes

Route::post('/contactenos', [ContactoController::class, 'enviar'])->name('contacto.send');

// Error 404
Route::get('/error404', function () {
    return view('error404');
});


