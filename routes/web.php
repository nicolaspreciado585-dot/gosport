<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Auth\RegisteredUserController; // 👈 Importamos tu controlador

// Página pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// 🚀 Ruta personalizada para el registro (antes de las rutas protegidas)
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register.custom');

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

    // Página de confirmación de reserva (POST desde formulario)
    Route::post('/reservas/confirmacion', function() {
        return view('reservas.confirmacion');
    })->name('reservas.confirmacion');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])
      ->name('user.profile.show');
    
    //Rutas para CRUD MODULO RESERVAS
    // Historial de reservas
    Route::get('/historial-reservas', [ReservaController::class, 'index'])
        ->name('reservas.historial');

    // Crear reserva
    Route::get('/reservas/create', [ReservaController::class, 'createEmpty'])
        ->name('reservas.create');

    Route::get('/reservas/create/{id_cancha}', [ReservaController::class, 'create'])
        ->name('reservas.create.cancha');

    // Guardar reserva
    Route::post('/reservas', [ReservaController::class, 'store'])
        ->name('reservas.store');

    // Editar reserva
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])
        ->name('reservas.edit');

    // Actualizar reserva
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])
        ->name('reservas.update');

    // Eliminar reserva
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])
        ->name('reservas.destroy');



});


