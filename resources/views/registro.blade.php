@extends('layouts.app')

@section('title', 'Registro - GoSports')

@section('content')
<link rel="stylesheet" href="{{ asset('css/registro.css') }}">

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="fw-bold">Crear una cuenta</h2>
                    <p class="mb-0">Únete a GoSports y reserva tu cancha en segundos</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('registro.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
                                @error('apellidos') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Teléfono</label>
                                <input type="number" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                                @error('telefono') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Número de identificación</label>
                                <input type="number" name="numero_identificacion" class="form-control" value="{{ old('numero_identificacion') }}" required>
                                @error('numero_identificacion') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tipo_documento" class="form-select" required>
                                <option value="">Seleccione una opción</option>
                                <option value="cedula" {{ old('tipo_documento')=='cedula'?'selected':'' }}>Cédula de ciudadanía</option>
                                <option value="tarjeta" {{ old('tipo_documento')=='tarjeta'?'selected':'' }}>Tarjeta de identidad</option>
                                <option value="pasaporte" {{ old('tipo_documento')=='pasaporte'?'selected':'' }}>Pasaporte</option>
                            </select>
                            @error('tipo_documento') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="genero" value="Hombre" class="form-check-input" {{ old('genero')=='Hombre'?'checked':'' }} required>
                                <label class="form-check-label">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="genero" value="Mujer" class="form-check-input" {{ old('genero')=='Mujer'?'checked':'' }} required>
                                <label class="form-check-label">Mujer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="genero" value="Otro" class="form-check-input" {{ old('genero')=='Otro'?'checked':'' }} required>
                                <label class="form-check-label">Otro</label>
                            </div>
                            @error('genero') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Crear cuenta</button>
                        <p class="text-center mt-3">¿Ya tienes cuenta? <a href="{{ url('/login') }}">Inicia sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

