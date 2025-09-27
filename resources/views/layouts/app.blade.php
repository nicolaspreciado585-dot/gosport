<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSport</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'GOSPORTS')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tu CSS -->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <header>
        <!-- Aquí va tu menú de navegación -->
        @include('partials.navbar')
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>GoSport © 2025</p>
    </footer>
<body class="d-flex flex-column min-vh-100">

  <!-- Header con Bootstrap -->
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="{{ asset('imagenes/Imagengosports.jpeg') }}" 
           alt="Logo GOSPORTS" class="logo" style="height:50px; cursor:pointer;" 
           onclick="location.href='{{ url('/') }}'">

      <nav>
        <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm me-2">Inicio</a>
        <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
        <a href="{{ url('/registro') }}" class="btn btn-outline-light btn-sm me-2">Registro</a>
        <a href="{{ url('/contactenos') }}" class="btn btn-outline-light btn-sm">Contáctenos</a>
      </nav>
    </div>
  </header>

  <!-- Contenido dinámico -->
  <main class="container my-5 flex-grow-1">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 GOSPORTS | Contacto: GOSPORTS@gmail.com</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>