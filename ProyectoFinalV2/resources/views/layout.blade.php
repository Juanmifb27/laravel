<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3 mb-5">
        <a class="navbar-brand" href="#">Gestión de Productos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @if(Auth::check())
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3">Bienvenido: <strong>{{ auth()->user()->name }}</strong></p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Cerrar sesión</button>
                    </form>
                </div>
            @else
                <div>
                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Iniciar sesión</a>
                    <a class="btn btn-outline-dark" href="{{ route('register') }}">Registrarse</a>
                </div>
            @endif
        </div>
    </nav>
    
    @yield('content')
</body>
</html>
