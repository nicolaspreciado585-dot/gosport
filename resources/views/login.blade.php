@extends('layouts.app')

@section('title', 'Login - GoSports')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="fw-bold">Iniciar sesión</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Iniciar sesión</button>
                        <p class="text-center mt-3">¿No tienes cuenta? <a href="{{ url('/registro') }}">Regístrate</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

