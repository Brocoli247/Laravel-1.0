<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tienda de Cosméticos')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { padding-top: 70px; }
        .navbar-brand { font-weight: bold; color: #d63384 !important; }
        .nav-link.active, .nav-link:hover { color: #d63384 !important; }
        .navbar { box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Cosméticos Amy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/carrito') }}">
    Carrito @if(isset($carritoCount) && $carritoCount > 0)<span class="badge bg-primary align-middle">{{ $carritoCount }}</span>@endif
</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/direcciones') }}">Direcciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tarjetas') }}">Tarjetas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/historial') }}">Historial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ session('cliente')->Nombre ?? 'Usuario' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/datos-personales') }}">Perfil</a></li>
                        <li>
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
