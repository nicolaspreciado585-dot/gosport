<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\ReservaController;

// Página pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Usuarios
    Route::resource('usuarios', UsuarioController::class);

    // Módulo de reservas (solo formulario)
    Route::get('/reservas/create', [ReservaController::class, 'createEmpty'])
         ->name('reservas.create');

    Route::get('/reservas/create/{id_cancha}', [ReservaController::class, 'create'])
         ->name('reservas.create.cancha');

    // Página de confirmación de reserva (POST desde formulario)
    Route::post('/reservas/confirmacion', function() {
        return view('reservas.confirmacion');
    })->name('reservas.confirmacion');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');
});


