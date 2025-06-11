<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Mi Tienda de Cosméticos</title>
    <meta name="description" content="Accede a tu cuenta en nuestra tienda de cosméticos para ver tus pedidos, productos favoritos y más.">
    <meta name="keywords" content="iniciar sesión, login, cosméticos, tienda online, belleza">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph para redes sociales -->
    <meta property="og:title" content="Iniciar Sesión - Mi Tienda de Cosméticos">
    <meta property="og:description" content="Accede a tu cuenta para disfrutar de todos los beneficios de nuestra tienda.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://img.freepik.com/fotos-premium/bolsa-maquillaje-cuero-rosa-productos-belleza-cosmeticos-derramandose-sobre-fondo-color-pastel_1205-3547.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Iniciar Sesión - Mi Tienda de Cosméticos">
    <meta name="twitter:description" content="Accede a tu cuenta y descubre productos de belleza exclusivos.">
    <meta name="twitter:image" content="https://img.freepik.com/fotos-premium/bolsa-maquillaje-cuero-rosa-productos-belleza-cosmeticos-derramandose-sobre-fondo-color-pastel_1205-3547.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-premium/bolsa-maquillaje-cuero-rosa-productos-belleza-cosmeticos-derramandose-sobre-fondo-color-pastel_1205-3547.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 450px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(4px);
        }

        h2 {
            color: #d63384;
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .alert {
            border-radius: 10px;
        }

        .text-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error_message'))
                <div class="alert alert-danger">
                    {!! session('error_message') !!}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="Correo_Electronico" value="{{ old('Correo_Electronico') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
            </div>
            <div class="mt-2 text-center">
                <a href="{{ route('recuperar.cliente.email') }}">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center mt-3">
                <p>¿Eres proveedor? <a href="{{ url('/proveedor/login') }}">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>
</body>
</html>
