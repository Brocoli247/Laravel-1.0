<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-success">¡Inicio de sesión exitoso!</h2>
        <p class="text-center">Bienvenido, {{ Auth::user()->Nombre }}. Has iniciado sesión correctamente.</p>

        <div class="text-center mt-4">
            
            <form method="POST" action="{{ url('/logout') }}" class="d-inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>