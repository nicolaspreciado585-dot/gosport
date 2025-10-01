<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoSports - Reserva tu cancha</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    
    <style>
        /* Estilos básicos para el Hero */
        .hero {
            position: relative; 
            height: 90vh; 
            background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat;
        }
        .overlay {
            position: absolute; 
            inset: 0; 
            background: rgba(0,0,0,0.5);
        }
        .hero-content {
            position: relative; 
            z-index: 2;
        }
        /* Color de acento de ejemplo (ajusta según tu CSS) */
        .btn-acento, .text-acento {
            background-color: #FF2D20; /* Color de acento de Laravel por defecto, ajústalo! */
            color: white;
            border-color: #FF2D20;
        }
        .btn-acento:hover {
            background-color: #CC241A;
            color: white;
            border-color: #CC241A;
        }
    </style>
</head>
<body class="antialiased">
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" 
                 alt="Logo GoSport" 
                 style="height: 40px; width:auto; margin-right:8px;">
            <span class="text-white">GoSports</span>
        </a>
        <div class="ms-auto">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

    @endif

    <section class="hero d-flex align-items-center justify-content-center text-center text-white">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1 class="display-4 fw-bold">Reserva tu cancha en segundos</h1>
            <p class="lead">Fútbol · Baloncesto · Tenis</p>
            <a href="{{ route('login') }}" class="btn btn-acento btn-lg mt-3">Empezar ahora</a>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center mb-5 fw-bold">Explora nuestras canchas</h2>
        <div class="row g-5">
            {{-- Tarjeta 1: Fútbol --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <img src="{{ asset('images/cancha-futbol.jpg') }}" class="card-img-top rounded" alt="Cancha de fútbol">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Fútbol 5</h5>
                        <p class="card-text text-muted">Cancha sintética iluminada · Disponible todos los días</p>
                        {{-- Botón de reserva con chequeo de autenticación --}}
                        @auth
                            <a href="{{ url('/reserva/futbol') }}" class="btn btn-dark">Reservar</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-dark">Reservar</a>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- Tarjeta 2: Baloncesto --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <img src="{{ asset('images/cancha-basket.jpg') }}" class="card-img-top rounded" alt="Cancha de baloncesto">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Baloncesto</h5>
                        <p class="card-text text-muted">Cancha techada · Ideal para torneos</p>
                        @auth
                            <a href="{{ url('/reserva/baloncesto') }}" class="btn btn-dark">Reservar</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-dark">Reservar</a>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- Tarjeta 3: Tenis --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <img src="{{ asset('images/cancha-tenis.jpg') }}" class="card-img-top rounded" alt="Cancha de tenis">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Tenis</h5>
                        <p class="card-text text-muted">Superficie rápida · Disponibilidad por horas</p>
                        @auth
                            <a href="{{ url('/reserva/tenis') }}" class="btn btn-dark">Reservar</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-dark">Reservar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4 fw-bold">¿Por qué elegir GoSports?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <i class="bi bi-clock fs-1 text-acento"></i>
                    <h5 class="mt-3 fw-bold">Reserva rápida</h5>
                    <p class="text-muted">Reserva tu cancha en segundos desde cualquier dispositivo.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-geo-alt fs-1 text-acento"></i>
                    <h5 class="mt-3 fw-bold">Canchas cercanas</h5>
                    <p class="text-muted">Encuentra las mejores canchas cerca de ti, disponibles todos los días.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-star fs-1 text-acento"></i>
                    <h5 class="mt-3 fw-bold">Calidad garantizada</h5>
                    <p class="text-muted">Canchas limpias, iluminadas y equipadas para tu comodidad.</p>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
