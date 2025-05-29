<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario - Mi Tienda de Cosméticos</title>
  <meta name="description" content="Crea una cuenta en nuestra tienda de cosméticos para disfrutar de productos exclusivos, ofertas y más.">
  <meta name="keywords" content="registro, crear cuenta, cosméticos, tienda online, belleza">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Open Graph para redes sociales -->
  <meta property="og:title" content="Registro de Usuario - Mi Tienda de Cosméticos">
  <meta property="og:description" content="Crea tu cuenta para comenzar a comprar productos de belleza y cuidado personal.">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://previews.123rf.com/images/5second/5second1705/5second170500325/78002266-diferentes-cosm%C3%A9ticos-de-maquillaje-sobre-un-fondo-de-color-rosa.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Registro de Usuario - Mi Tienda de Cosméticos">
  <meta name="twitter:description" content="Regístrate gratis y comienza a disfrutar de los mejores cosméticos.">
  <meta name="twitter:image" content="https://previews.123rf.com/images/5second/5second1705/5second170500325/78002266-diferentes-cosm%C3%A9ticos-de-maquillaje-sobre-un-fondo-de-color-rosa.jpg">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('https://previews.123rf.com/images/5second/5second1705/5second170500325/78002266-diferentes-cosm%C3%A9ticos-de-maquillaje-sobre-un-fondo-de-color-rosa.jpg');
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
      max-width: 500px;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(5px);
    }

    h2 {
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

    .alert {
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h2 class="text-center mb-4">Registro de Usuario</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

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
</body>
</html>
