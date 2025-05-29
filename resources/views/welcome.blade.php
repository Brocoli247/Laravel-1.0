<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión | Plataforma de Belleza</title>

    <!-- Meta SEO -->
    <meta name="description" content="Regístrate o inicia sesión en nuestra plataforma de belleza para acceder a productos exclusivos y gestionar tu cuenta fácilmente.">
    <meta name="keywords" content="registro, inicio de sesión, usuario, plataforma de belleza, productos de maquillaje, acceso seguro">
    <meta name="author" content="Tu Empresa o Nombre">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Spanish">

    <!-- Viewport para responsividad -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Open Graph para redes sociales -->
    <meta property="og:title" content="Registro e Inicio de Sesión | Plataforma de Belleza">
    <meta property="og:description" content="Accede a tu cuenta o regístrate para comprar productos de belleza y maquillaje en nuestra plataforma.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/logo.png') }}"> <!-- Cambia por logo o imagen relevante -->

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

        /* Para accesibilidad: texto oculto para describir secciones */
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
    </style>
</head>
<body>
    <main class="container" role="main" aria-label="Formulario de registro e inicio de sesión">
        <h1 class="text-center mb-5">Registro e Inicio de Sesión</h1>

        <!-- 🔹 Mensajes de error -->
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
            <!-- 🔹 Registro -->
            <section class="col-md-6" aria-labelledby="registro-title">
                <div class="card">
                    <h2 id="registro-title" class="text-center mb-4">Registro de Usuario</h2>
                    <form method="POST" action="{{ url('/register') }}" aria-describedby="registro-desc" novalidate>
                        {{ csrf_field() }}

                        <p id="registro-desc" class="visually-hidden">Formulario para registrar un nuevo usuario en la plataforma.</p>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="Nombre" required aria-required="true" autocomplete="name">
                        </div>

                        <div class="mb-3">
                            <label for="correoRegistro" class="form-label">Correo Electrónico</label>
                            <input id="correoRegistro" type="email" class="form-control" name="Correo_Electronico" required aria-required="true" autocomplete="email">
                        </div>

                        <div class="mb-3">
                            <label for="passwordRegistro" class="form-label">Contraseña</label>
                            <input id="passwordRegistro" type="password" class="form-control" name="password" required aria-required="true" autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Confirmar Contraseña</label>
                            <input id="passwordConfirm" type="password" class="form-control" name="password_confirmation" required aria-required="true" autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </section>
        
            <!-- 🔹 Inicio de sesión -->
            <section class="col-md-6" aria-labelledby="login-title">
                <div class="card">
                    <h2 id="login-title" class="text-center mb-4">Iniciar Sesión</h2>
                    <form method="POST" action="{{ url('/login') }}" aria-describedby="login-desc" novalidate>
                        {{ csrf_field() }}

                        <p id="login-desc" class="visually-hidden">Formulario para iniciar sesión en la plataforma.</p>

                        <div class="mb-3">
                            <label for="correoLogin" class="form-label">Correo Electrónico</label>
                            <input id="correoLogin" type="email" class="form-control" name="Correo_Electronico" required aria-required="true" autocomplete="email">
                        </div>

                        <div class="mb-3">
                            <label for="passwordLogin" class="form-label">Contraseña</label>
                            <input id="passwordLogin" type="password" class="form-control" name="password" required aria-required="true" autocomplete="current-password">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
                    </form>
                </div>
            </section>
        </div>

        <hr>
        <p class="text-muted text-center" style="font-size: 14px;">
            ¿Eres proveedor y quieres administrar tus productos?  
            <a href="{{ route('proveedor.home') }}" class="fw-bold text-decoration-none text-primary">Haz clic aquí para acceder al portal de proveedores</a>.
        </p>
    </main>
</body>
</html>
