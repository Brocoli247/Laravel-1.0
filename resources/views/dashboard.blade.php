<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido - Sesión Iniciada | Tienda de Cosméticos</title>
    <meta name="description" content="Bienvenido a nuestra tienda de cosméticos. Visualiza los productos disponibles y accede a tu cuenta de forma segura.">
    <meta name="keywords" content="inicio de sesión, tienda de cosméticos, productos de belleza, cliente, sesión activa">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (para compartir en redes sociales) -->
    <meta property="og:title" content="Bienvenido - Sesión Iniciada | Tienda de Cosméticos">
    <meta property="og:description" content="Accede a tu cuenta, visualiza productos y administra tu experiencia de compra.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://i.pinimg.com/736x/fc/dc/6d/fcdc6d8ca3d286c9ee69ca37a36bf248.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bienvenido - Tienda de Cosméticos">
    <meta name="twitter:description" content="Has iniciado sesión correctamente. Visualiza los productos y continúa tu compra.">
    <meta name="twitter:image" content="https://i.pinimg.com/736x/fc/dc/6d/fcdc6d8ca3d286c9ee69ca37a36bf248.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe6ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        h2 {
            color: #28a745;
            font-weight: bold;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .table th {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <h2>¡Inicio de sesión exitoso!</h2>
            <p class="mt-3">
                Bienvenido, <strong>{{ session('cliente')->Nombre ?? 'Invitado' }}</strong>.
                Has iniciado sesión correctamente.
            </p>

            <form method="POST" action="{{ url('/logout') }}" class="mt-4">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>

        <hr>

        <h3 class="mb-3 text-center">Todos los Productos Disponibles</h3>

        @if($productos->isEmpty())
            <div class="alert alert-warning text-center">No hay productos registrados.</div>
        @else
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>${{ $producto->precio }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->categoria->Nombre_Categoria ?? 'Sin categoría' }}</td>
                            <td>{{ $producto->proveedor->Nombre_Proveedor ?? 'Sin proveedor' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
