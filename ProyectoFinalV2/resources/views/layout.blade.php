<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    @if(Auth::check())
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
@else
    <a href="{{ route('login') }}">Iniciar sesión</a>
    <a href="{{ route('register') }}">Registrarse</a>
@endif

    <h2 class="text-center mb-4">Gestión de Productos</h2>
    @yield('content')
</body>
</html>
