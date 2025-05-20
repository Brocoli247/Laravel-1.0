<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión - Proveedor</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
      color: #d63384; /* rosa fuerte para hacer match con la imagen */
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
  <div class="container">
    <h2>Iniciar Sesión</h2>

    @if($errors->any())
      <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
    @endif

    <form method="POST" action="{{ url('/proveedor/login') }}">
      {{ csrf_field() }}
      <div class="mb-3">
        <label class="form-label">Correo Electrónico</label>
        <input type="email" name="Correo_Electronico" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>

    <div class="text-center mt-3">
      <p>¿No tienes cuenta? <a href="{{ url('/proveedor/register') }}">Regístrate aquí</a></p>
    </div>
  </div>
</body>
</html>
