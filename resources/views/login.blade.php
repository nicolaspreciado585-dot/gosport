@extends('layouts.app')

@section('title', 'Login - GOSPORTS')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-dark text-white text-center">
        <h2>Iniciar Sesión</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="#">
          @csrf
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-dark w-100">Iniciar Sesión</button>
        </form>
        <div class="mt-3 text-center">
          <a href="{{ url('/registro') }}">¿No tienes cuenta? Regístrate</a><br>
          <a href="{{ url('/contactenos') }}">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

