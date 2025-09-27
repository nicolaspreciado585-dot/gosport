@extends('layouts.app')

@section('title', 'Error 404 - GOSPORTS')

@section('content')
<link rel="stylesheet" href="{{ asset('css/error404.css') }}">

<div class="text-center">
  <img src="{{ asset('imagenes/Imagengosports.jpeg') }}" alt="Error 404" style="max-width:200px;">
  <h1 class="mt-4">Error 404</h1>
  <p>El recurso solicitado no fue encontrado.</p>
  <a href="{{ url('/') }}" class="btn btn-dark mt-3">Volver al inicio</a>
</div>
@endsection
