<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Proveedor</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
  <div class="container">
    <h2>Registro de Proveedor</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
    @endif

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
