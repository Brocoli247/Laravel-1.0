<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registro e Inicio de Sesión</h2>

        <!-- 🔹 Mostrar el mensaje de error con el botón de registro -->
        @if (session('error_message'))
            <div class="alert alert-danger">
                {!! session('error_message') !!}
            </div>
        @endif

        <!-- 🔹 Mostrar los errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- 🔹 Columna de Registro -->
            <div class="col-md-6">
                <h3 class="text-center">Registro de Usuario</h3>
                <form method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="Correo_Electronico" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </form>
            </div>

            <!-- 🔹 Columna de Login -->
            <div class="col-md-6">
                <h3 class="text-center">Iniciar Sesión</h3>
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
        </div>
    </div>
</body>
</html>