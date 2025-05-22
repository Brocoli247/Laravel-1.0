<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Direcciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color:rgb(251, 216, 251);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #d63384; /* Rosa Bootstrap */
        }
        
        .container {
            max-width: 700px;
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
        .address-card {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Agregar Nueva Dirección</h2>

        <form>
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <input type="text" class="form-control" placeholder="Ejemplo: CDMX" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Municipio</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Iztapalapa" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Colonia</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Centro" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Calle</label>
                <input type="text" class="form-control" placeholder="Ejemplo: Avenida Reforma" required>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label">Número Exterior</label>
                    <input type="text" class="form-control" placeholder="Ejemplo: 123" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Número Interior (Opcional)</label>
                    <input type="text" class="form-control" placeholder="Ejemplo: A-2">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Código Postal</label>
                <input type="text" class="form-control" placeholder="Ejemplo: 09876" required>
            </div>

            <button type="submit" class="btn btn-custom">Añadir Dirección</button>
        </form>

        <hr>

        <h3 class="text-center mt-4">Mis Direcciones</h3>

        <!-- 🔹 Ejemplo de dirección guardada -->
        <div class="address-card">
            <p><strong>Estado:</strong> CDMX</p>
            <p><strong>Municipio:</strong> Iztapalapa</p>
            <p><strong>Colonia:</strong> Centro</p>
            <p><strong>Calle:</strong> Avenida Reforma</p>
            <p><strong>Número Exterior:</strong> 123</p>
            <p><strong>Número Interior:</strong> A-2</p>
            <p><strong>Código Postal:</strong> 09876</p>
        </div>

        <div class="address-card">
            <p><strong>Estado:</strong> Estado de México</p>
            <p><strong>Municipio:</strong> Naucalpan</p>
            <p><strong>Colonia:</strong> La Florida</p>
            <p><strong>Calle:</strong> Calle 23</p>
            <p><strong>Número Exterior:</strong> 45</p>
            <p><strong>Código Postal:</strong> 54321</p>
        </div>

    </div>
</body>
</html>