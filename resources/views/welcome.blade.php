<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
             
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('{{ asset('img/Fondo-de-maquillaje.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: rgba(221, 160, 221, 0.8); /* Lila claro */
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
            color: #d63384;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #d63384;
            border: none;
        }

        .btn-primary:hover {
            background-color: #c21868;
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
        <h2 class="text-center mb-5">Registro e Inicio de Sesión</h2>

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
                    <h3 class="text-center mb-4">Registro de Usuario</h3>
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
            </div>
        
            <!-- 🔹 Inicio de sesión -->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center mb-4">Iniciar Sesión</h3>
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
    </div>
</body>
</html>
