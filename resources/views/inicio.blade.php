@extends('layouts.app')

@section('title', 'Inicio - GOSPORTS')

@section('content')
<div class="text-center mb-5">
  <h1>Bienvenido a GOSPORTS</h1>
  <p class="lead">Las mejores canchas, eventos y promociones en un solo lugar.</p>
</div>

<!-- Galería de canchas -->
<div class="row g-4">
  <div class="col-md-4">
    <div class="card shadow">
      <img src="{{ asset('imagenes/imagen_cancha1.webp') }}" class="card-img-top" alt="Cancha 1">
      <div class="card-body">
        <h5 class="card-title">Canchas Sintéticas Bogotá Jardín Club</h5>
        <p class="card-text">Cl. 61 Sur #80b-1, Bogotá <br> Horarios: L-V 6:00–18:00</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow">
      <a href="https://goo.gl/maps/">
        <img src="{{ asset('imagenes/imagen_cancha2.webp') }}" class="card-img-top" alt="Cancha 2">
      </a>
      <div class="card-body">
        <h5 class="card-title">Cancha Gran Plaza Bosa</h5>
        <p class="card-text">Cl. 64 Sur #77g-68, Bosa, Bogotá <br> Horarios: L-V 6:00–18:00</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow">
      <img src="{{ asset('imagenes/imagen_cancha3.webp') }}" class="card-img-top" alt="Cancha 3">
      <div class="card
