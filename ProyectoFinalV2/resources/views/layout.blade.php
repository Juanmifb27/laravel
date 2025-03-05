<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="btn btn-dark"
                        >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-dark"
                    >
                        Log in
                    </a>
    
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-dark"
                            >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <h2 class="text-center mb-4">Gestión de Productos</h2>
    @yield('content')
</body>
</html>
