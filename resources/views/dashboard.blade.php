<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe6f0; /* Mismo fondo rosa suave */
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <h2>¡Inicio de sesión exitoso!</h2>
            <p class="mt-3">Bienvenido, <strong>{{ Auth::user()->Nombre }}</strong>. Has iniciado sesión correctamente.</p>

            <form method="POST" action="{{ url('/logout') }}" class="mt-4">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>