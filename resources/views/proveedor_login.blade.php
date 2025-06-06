<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión - Proveedor</title>

  <!-- Meta SEO -->
  <meta name="description" content="Inicia sesión como proveedor para gestionar tus productos, categorías y datos en la plataforma de belleza y cuidado personal.">
  <meta name="keywords" content="inicio de sesión proveedor, login proveedor, plataforma belleza, productos de cuidado personal, maquillaje, cosméticos">
  <meta name="author" content="Tu Empresa o Nombre">
  <meta name="robots" content="index, follow">
  <meta name="language" content="Spanish">

  <!-- Open Graph -->
  <meta property="og:title" content="Inicio de Sesión - Proveedor | Plataforma de Belleza">
  <meta property="og:description" content="Accede a tu cuenta de proveedor para administrar tus productos en el sistema de belleza y cosméticos.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('images/logo.png') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <!-- Estilos personalizados -->
  <style>
    body {
      background-image: url('https://st.depositphotos.com/1558912/53589/i/950/depositphotos_535897932-stock-photo-make-up-products-at-pink.jpg');
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
      max-width: 400px;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(5px);
    }
    h2 {
      text-align: center;
      color: #d63384;
      margin-bottom: 25px;
    }
    label {
      font-weight: 500;
    }
    .btn-primary {
      background-color: #d63384;
      border: none;
    }
    .btn-primary:hover {
      background-color: #ad2167;
    }
    a {
      color: #d63384;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <main class="container" role="main">
    <h2>Iniciar Sesión</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ url('/proveedor/login') }}" aria-label="Formulario de inicio de sesión de proveedor">
      {{ csrf_field() }}
      <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input id="correo" type="email" name="Correo_Electronico" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>

    <div class="text-center mt-3">
      <p>¿No tienes cuenta? <a href="{{ route('proveedor.register') }}">Regístrate aquí</a></p>
      <p>¿Eres cliente? <a href="{{ route('login') }}">Inicia sesión como cliente</a></p>
    </div>
  </main>
</body>
</html>
