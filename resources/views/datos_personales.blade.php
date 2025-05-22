<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background-color: #d63384;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #c21868;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Datos Personales</h2>

        <form>
            <div class="mb-3">
                <label class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Juan Carlos" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Pérez" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Rodríguez">
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-control" placeholder="Ejemplo: 55 1234 5678" required>
            </div>

            <button type="submit" class="btn btn-custom">Guardar Datos</button>
        </form>
    </div>
</body>
</html>