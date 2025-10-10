@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.update', $reserva->id_reserva) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_cancha" class="form-label">Cancha</label>
            <select name="id_cancha" id="id_cancha" class="form-control">
                @foreach($canchas as $cancha)
                    <option value="{{ $cancha->id_cancha }}" 
                        {{ $reserva->id_cancha == $cancha->id_cancha ? 'selected' : '' }}>
                        {{ $cancha->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" 
                value="{{ $reserva->fecha_reserva->format('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" 
                value="{{ $reserva->hora_inicio->format('H:i') }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $reserva->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $reserva->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Reserva</button>
        <a href="{{ route('reservas.historial') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
