<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

// Redirigir /registro a /register de Breeze
Route::get('/registro', function() {
    return redirect()->route('register');
});

// Contáctenos
Route::get('/contactenos', function () {
    return view('contactenos');
})->name('contacto.form');

Route::post('/contactenos', [App\Http\Controllers\ContactoController::class, 'enviar'])
    ->name('contacto.send');

