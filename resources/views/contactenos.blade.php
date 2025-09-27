@extends('layouts.app')

@section('title', 'Contáctenos - GOSPORTS')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contactenos.css') }}">

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow">
      <div class="card-header bg-dark text-white text-center">
        <h2>Contáctenos</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="#">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo de documento</label>
            <select name="tipoDocumento" class="form-select" required>
              <option value="">Selecciona una opción</option>
              <option value="Cedula_Ciudadania">Cédula de Ciudadanía</option>
              <option value="Tarjeta_identidad">Tarjeta de identidad</option>
              <option value="Pasaporte">Pasaporte</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Número de Identificación</label>
            <input type="number" name="numeroIdentificacion" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="4" placeholder="Escribe tus comentarios..."></textarea>
          </div>
          <button type="submit" class="btn btn-dark w-100">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
