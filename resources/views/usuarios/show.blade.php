@extends('layouts.app')

@section('content')
    <h1>Detalle del Usuario</h1>
    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>
@endsection
