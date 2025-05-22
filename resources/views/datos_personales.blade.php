<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://png.pngtree.com/thumb_back/fw800/background/20210827/pngtree-cosmetics-makeup-brush-pink-background-image_768168.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        h2 {
            color: #d63384;
        }

        .container {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
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

        label {
            font-weight: 500;
            color: #333;
        }

        input.form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
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
