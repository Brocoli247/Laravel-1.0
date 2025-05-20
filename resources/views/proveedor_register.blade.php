<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Proveedor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(92, 147, 206);
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Proveedor</h2>

        <!-- Mensajes de éxito y error -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
        @endif

        <!-- Formulario de Registro -->
        <form method="POST" action="{{ url('/proveedor/register') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="form-label">Nombre del proveedor</label>
                <input type="text" name="Nombre_Proveedor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" name="Correo_Electronico" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>

        <div class="text-center mt-3">
            <p>¿Ya tienes una cuenta? <a href="{{ url('/proveedor/login') }}">Inicia sesión aquí</a></p>
        </div>
    </div>
</body>
</html>