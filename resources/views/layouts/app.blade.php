<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    {{-- ELIMINAR EL DIV GRIS PRINCIPAL DE BREEZE (opcional) --}}
    
    <header class="main-navbar">
        <div class="logo-container">
            <a href="{{ route('home') }}">
                <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" alt="GOSPORTS Logo" class="logo-header">
            </a>
        </div>
        
        <nav class="main-nav">
            {{-- Aquí puedes añadir tus enlaces principales (Inicio, Eventos, Contactos) --}}
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('contact') }}">Contáctenos</a></li>
                {{-- Agrega los botones Login/Registro si el usuario no está autenticado --}}
                @guest
                    <li><a href="{{ route('login') }}" class="btn-nav">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn-nav btn-primary">Registro</a></li>
                @endguest
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>
    
    {{-- Aquí iría el footer --}}
</body>

    
</html>
