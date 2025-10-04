<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuario\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí defines todas tus rutas web.
|
*/

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

    // Módulo de reservas (formulario)
    // Ruta sin parámetro: formulario vacío
    Route::get('/reservas/create', function () {
        return view('reservas.create');
    })->name('reservas.create');

    // Ruta con cancha seleccionada
    Route::get('/reservas/create/{cancha}', function($cancha) {
        return view('reservas.create', ['canchaSeleccionada' => $cancha]);
    })->name('reservas.create.cancha');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');
});

