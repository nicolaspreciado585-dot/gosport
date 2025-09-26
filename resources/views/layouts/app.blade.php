<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSport</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
</body>
</html>
