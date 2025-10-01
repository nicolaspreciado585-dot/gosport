@extends('layouts.public')
@section('title', 'Inicio - GoSports')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

<!-- Hero principal -->
<section class="hero d-flex align-items-center justify-content-center text-center text-white" style="position: relative; height: 90vh; background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div class="hero-content" style="position: relative; z-index: 2;">
        <h1 class="display-4 fw-bold">Reserva tu cancha en segundos</h1>
        <p class="lead">Fútbol · Baloncesto · Tenis</p>
        <a href="{{ url('/login') }}" class="btn btn-acento btn-lg mt-3">Empezar ahora</a>
    </div>
</section>

<!-- Sección de canchas -->
<section class="container my-5">
    <h2 class="text-center mb-5 fw-bold">Explora nuestras canchas</h2>
    <div class="row g-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <img src="{{ asset('images/cancha-futbol.jpg') }}" class="card-img-top rounded" alt="Cancha de fútbol">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Fútbol 5</h5>
                    <p class="card-text text-muted">Cancha sintética iluminada · Disponible todos los días</p>
                    <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <img src="{{ asset('images/cancha-basket.jpg') }}" class="card-img-top rounded" alt="Cancha de baloncesto">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Baloncesto</h5>
                    <p class="card-text text-muted">Cancha techada · Ideal para torneos</p>
                    <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <img src="{{ asset('images/cancha-tenis.jpg') }}" class="card-img-top rounded" alt="Cancha de tenis">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Tenis</h5>
                    <p class="card-text text-muted">Superficie rápida · Disponibilidad por horas</p>
                    <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de beneficios opcional -->
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
@endsection
