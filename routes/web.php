<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'inicio');
Route::view('/login', 'login');
Route::view('/registro', 'registro');
Route::view('/contactenos', 'contactenos');
Route::view('/error404', 'error404');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UsuarioController::class)->names('usuarios');
