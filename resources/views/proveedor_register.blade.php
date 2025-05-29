<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Proveedor | Plataforma de Belleza</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Regístrate como proveedor en nuestra plataforma de belleza para ofrecer tus productos de cuidado personal y maquillaje.">
  <meta name="keywords" content="registro proveedor, crear cuenta proveedor, plataforma belleza, cosméticos, productos de maquillaje, cuidado personal">
  <meta name="author" content="Tu Empresa o Nombre">
  <meta name="robots" content="index, follow">
  <meta name="language" content="Spanish">

  <!-- Open Graph (para compartir en redes sociales) -->
  <meta property="og:title" content="Registro de Proveedor | Plataforma de Belleza">
  <meta property="og:description" content="Crea una cuenta como proveedor y comienza a gestionar tus productos en nuestro sistema.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('images/logo.png') }}"> <!-- Reemplaza con tu logo -->

  <!-- Estilos Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <!-- Estilos personalizados -->
  <style>
    body {
      background-image: url('https://static.vecteezy.com/system/resources/previews/002/558/092/non_2x/cosmetic-background-template-vector.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      max-width: 500px;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(4px);
    }
    h2 {
      text-align: center;
      color: #007bff;
      margin-bottom: 25px;
    }
    label {
      font-weight: 500;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <main class="container" role="main">
    <h2>Registro de Proveedor</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
    @endif

    <form method="POST" action="{{ url('/proveedor/register') }}" aria-label="Formulario de registro para proveedores">
      {{ csrf_field() }}
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del proveedor</label>
        <input id="nombre" type="text" name="Nombre_Proveedor" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input id="correo" type="email" name="Correo_Electronico" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="confirmar" class="form-label">Confirmar Contraseña</label>
        <input id="confirmar" type="password" name="password_confirmation" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>

    <div class="text-center mt-3">
      <p>¿Ya tienes una cuenta? <a href="{{ url('/proveedor/login') }}">Inicia sesión aquí</a></p>
    </div>
  </main>
</body>
</html>
