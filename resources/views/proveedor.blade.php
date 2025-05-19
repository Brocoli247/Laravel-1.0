<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión para Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('{{ asset('img/Fondo-de-proveedor.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: rgba(160, 160, 255, 0.8); /* Azul claro */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }  

        .container {
            margin-top: 100px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.6); 
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Sombra más suave */
            margin-bottom: 30px;
        }

        h2, h3 {
            color: #007bff;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #198754;
        }

        .btn-success:hover {
            background-color: #146c43;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Registro e Inicio de Sesión para Proveedores</h2>

        <!-- 🔹 Mensajes de error -->
        @if (session('error_message'))
            <div class="alert alert-danger">
                {!! session('error_message') !!}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- 🔹 Registro -->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center mb-4">Registro de Proveedor</h3>
                    <form method="POST" action="{{ url('/proveedor/register') }}">
                        {{ csrf_field() }}

                        <div class="mb-3">
                            <label class="form-label">Nombre de la Empresa</label>
                            <input type="text" class="form-control" name="Nombre_Proveedor" required>
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
            </div>
        
            <!-- 🔹 Inicio de sesión -->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center mb-4">Iniciar Sesión</h3>
                    <form method="POST" action="{{ url('/proveedor/login') }}">
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

        <hr>
        <p class="text-muted text-center" style="font-size: 14px;">
            ¿Eres cliente y buscas comprar productos?  
            <a href="http://127.0.0.1:8000/" class="fw-bold text-decoration-none text-primary">Haz clic aquí para acceder al portal de usuarios</a>.
        </p>
    </div>
</body>
</html>