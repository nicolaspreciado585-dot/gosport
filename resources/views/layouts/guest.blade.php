<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #212529; /* bg-dark de Bootstrap */
        }
        .form-control-dark {
            background-color: #343a40;
            border-color: #495057;
            color: #fff;
        }
        .form-control-dark:focus {
            background-color: #343a40;
            border-color: #FF2D20; /* Color de acento */
            box-shadow: 0 0 0 0.25rem rgba(255, 45, 32, 0.25);
            color: #fff;
        }
        .btn-acento {
            background-color: #FF2D20;
            color: white;
            border-color: #FF2D20;
        }
        .btn-acento:hover {
            background-color: #CC241A;
            color: white;
            border-color: #CC241A;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center pt-6 pt-sm-0">
        
        <div class="card bg-dark text-white border-secondary shadow-lg" style="max-width: 25rem; width: 100%;">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <a href="/">
                        <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" alt="Logo GoSport" class="rounded-circle" style="width: 120px; height: 120px;">
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
