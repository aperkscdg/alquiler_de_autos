<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('titulo', 'Alquiler de autos')</title>
</head>
<body class="bg-warning">

    <!-- BARRA DE NAVEGACIÓN FIJA ARRIBA -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('alquileres.index') }}">Alquiler De Autos</a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ request()->routeIs('alquileres.*') ? 'active fw-bold text-black' : '' }}" href="{{ route('alquileres.index') }}">Alquileres</a>
                <a class="nav-link {{ request()->routeIs('autos.*') ? 'active fw-bold text-black' : '' }}" href="{{ route('autos.index') }}">Autos</a>
                <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active fw-bold text-black' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('contenido')
    </div>

</body>
</html>