@extends('layouts.app')

@section('title', 'Inicio - GoSports')

@section('content')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

<!-- Hero principal -->
<section class="hero d-flex align-items-center justify-content-center text-center text-white">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Reserva tu cancha en segundos</h1>
    <p class="lead">Fútbol · Baloncesto · Tenis</p>
    <a href="{{ url('/login') }}" class="btn btn-acento btn-lg mt-3">Empezar ahora</a>
  </div>
</section>

<!-- Sección de canchas -->
<section class="container my-5">
  <h2 class="text-center mb-4 fw-bold">Explora nuestras canchas</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card cancha-card">
        <img src="{{ asset('images/cancha-futbol.jpg') }}" class="card-img-top" alt="Cancha de fútbol">
        <div class="card-body text-center">
          <h5 class="card-title">Fútbol 5</h5>
          <p class="card-text">Cancha sintética iluminada · Disponible todos los días</p>
          <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card cancha-card">
        <img src="{{ asset('images/cancha-basket.jpg') }}" class="card-img-top" alt="Cancha de baloncesto">
        <div class="card-body text-center">
          <h5 class="card-title">Baloncesto</h5>
          <p class="card-text">Cancha techada · Ideal para torneos</p>
          <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card cancha-card">
        <img src="{{ asset('images/cancha-tenis.jpg') }}" class="card-img-top" alt="Cancha de tenis">
        <div class="card-body text-center">
          <h5 class="card-title">Tenis</h5>
          <p class="card-text">Superficie rápida · Disponibilidad por horas</p>
          <a href="{{ url('/login') }}" class="btn btn-dark">Reservar</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
