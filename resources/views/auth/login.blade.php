<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión</h2>

        <!-- 🔹 Mostrar el mensaje de error de contraseña incorrecta -->
        @if (session('error_message'))
            <div class="alert alert-danger">
                {!! session('error_message') !!}
            </div>
        @endif

        <!-- 🔹 Mostrar otros errores en caso de credenciales incorrectas -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="Correo_Electronico" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>