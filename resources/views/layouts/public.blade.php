<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'GoSports')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
.navbar-dark .navbar-brand {
    color: #FF6F00 !important;
    font-weight: 700;
}

.navbar-dark .navbar-nav .nav-link {
    color: rgba(255,255,255,.85) !important;
    font-weight: 500;
}

.navbar-dark .navbar-nav .nav-link:hover {
    color: #FF6F00 !important;
}

.btn-custom-login {
    background-color: transparent;
    border: 1px solid #FF6F00;
    color: #FF6F00;
    border-radius: 20px;
}

.btn-custom-login:hover {
    background-color: #FF6F00;
    color: white;
}
</style>
</head>
<body>
    <!-- Navegación simple -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">GoSports</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contactenos') }}">Contáctanos</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-custom-login me-2" href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="{{ url('/register') }}">Registro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>