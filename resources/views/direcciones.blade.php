<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Direcciones | Gestión de Envíos</title>

    <!-- 🔍 SEO Básico -->
    <meta name="description" content="Gestiona tus direcciones de envío de forma fácil. Agrega, edita y consulta tus direcciones personales para una mejor experiencia de compra.">
    <meta name="keywords" content="direcciones, domicilio, envío, gestión de direcciones, agregar dirección, código postal, colonia, municipio">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- 🌐 Open Graph -->
    <meta property="og:title" content="Mis Direcciones | Gestión de Envíos">
    <meta property="og:description" content="Consulta y registra tus direcciones personales para facilitar tus compras.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="https://img.freepik.com/fotos-premium/fondo-rosa-juego-maquillaje-brillo-labios-rosa_220363-816.jpg">

    <!-- 🐦 Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mis Direcciones | Gestión de Envíos">
    <meta name="twitter:description" content="Organiza y guarda tus direcciones de forma sencilla. Ideal para tiendas online.">
    <meta name="twitter:image" content="https://img.freepik.com/fotos-premium/fondo-rosa-juego-maquillaje-brillo-labios-rosa_220363-816.jpg">

    <!-- 📦 Estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://img.freepik.com/fotos-premium/fondo-rosa-juego-maquillaje-brillo-labios-rosa_220363-816.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 700px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        h2, h3 {
            color: #d63384;
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

        label {
            font-weight: 500;
            color: #333;
        }

        input.form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        hr {
            border-top: 2px solid #f3c1d7;
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
