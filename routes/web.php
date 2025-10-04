<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuario\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),  // ← Corregido aquí
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('usuarios', UsuarioController::class);  // ← Movido dentro del grupo
});
