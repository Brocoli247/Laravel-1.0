<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión para Proveedores | Plataforma de Belleza</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Regístrate o inicia sesión como proveedor en nuestra plataforma de belleza para ofrecer y gestionar tus productos de maquillaje y cuidado personal.">
    <meta name="keywords" content="registro proveedor, inicio sesión proveedor, plataforma belleza, productos cosméticos, maquillaje, cuidado personal">
    <meta name="author" content="Tu Empresa o Nombre">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Spanish">

    <!-- Open Graph para compartir redes sociales -->
    <meta property="og:title" content="Registro e Inicio de Sesión para Proveedores | Plataforma de Belleza">
    <meta property="og:description" content="Accede o regístrate para gestionar tus productos en nuestra plataforma de belleza especializada en maquillaje y cuidado personal.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/logo.png') }}"> <!-- Cambia por el logo de tu sitio -->

    <!-- Bootstrap -->
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
            margin-top: 50px;
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
    <main class="container" role="main" aria-label="Registro e inicio de sesión para proveedores">
        <h2 class="text-center mb-5">Registro e Inicio de Sesión para Proveedores</h2>

        <!-- Mensajes de error -->
        @if (session('error_message'))
            <div class="alert alert-danger" role="alert">
                {!! session('error_message') !!}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- Registro -->
            <section class="col-md-6" aria-labelledby="registro-proveedor-title">
                <div class="card">
                    <h3 id="registro-proveedor-title" class="text-center mb-4">Registro de Proveedor</h3>
                    <form method="POST" action="{{ url('/proveedor/register') }}" aria-describedby="registro-desc">
                        {{ csrf_field() }}

                        <p id="registro-desc" class="visually-hidden">Formulario para registrar un nuevo proveedor en la plataforma</p>

                        <div class="mb-3">
                            <label for="nombre-proveedor" class="form-label">Nombre de la Empresa</label>
                            <input id="nombre-proveedor" type="text" class="form-control" name="Nombre_Proveedor" required aria-required="true">
                        </div>

                        <div class="mb-3">
                            <label for="correo-proveedor" class="form-label">Correo Electrónico</label>
                            <input id="correo-proveedor" type="email" class="form-control" name="Correo_Electronico" required aria-required="true">
                        </div>

                        <div class="mb-3">
                            <label for="password-proveedor" class="form-label">Contraseña</label>
                            <input id="password-proveedor" type="password" class="form-control" name="password" required aria-required="true">
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm-proveedor" class="form-label">Confirmar Contraseña</label>
                            <input id="password-confirm-proveedor" type="password" class="form-control" name="password_confirmation" required aria-required="true">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </section>
        
            <!-- Inicio de sesión -->
            <section class="col-md-6" aria-labelledby="inicio-sesion-title">
                <div class="card">
                    <h3 id="inicio-sesion-title" class="text-center mb-4">Iniciar Sesión</h3>
                    <form method="POST" action="{{ url('/proveedor/login') }}" aria-describedby="login-desc">
                        {{ csrf_field() }}

                        <p id="login-desc" class="visually-hidden">Formulario para iniciar sesión como proveedor en la plataforma</p>

                        <div class="mb-3">
                            <label for="correo-login" class="form-label">Correo Electrónico</label>
                            <input id="correo-login" type="email" class="form-control" name="Correo_Electronico" required aria-required="true">
                        </div>

                        <div class="mb-3">
                            <label for="password-login" class="form-label">Contraseña</label>
                            <input id="password-login" type="password" class="form-control" name="password" required aria-required="true">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
                    </form>
                </div>
            </section>
        </div>

        <hr>
        <p class="text-muted text-center" style="font-size: 14px;">
            ¿Eres cliente y buscas comprar productos?  
            <a href="http://127.0.0.1:8000/" class="fw-bold text-decoration-none text-primary" title="Accede al portal de usuarios">Haz clic aquí para acceder al portal de usuarios</a>.
        </p>
    </main>
</body>
</html>
