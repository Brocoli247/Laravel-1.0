<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos Personales | Tienda de Cosméticos</title>
    
    <!-- 🔍 SEO Básico -->
    <meta name="description" content="Completa tu información personal en nuestro formulario. Mejora tu experiencia de compra con datos actualizados.">
    <meta name="keywords" content="datos personales, formulario, tienda de cosméticos, nombre, teléfono, registro">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- 🌐 Open Graph (Facebook y redes sociales) -->
    <meta property="og:title" content="Formulario de Datos Personales | Tienda de Cosméticos">
    <meta property="og:description" content="Ingresa tu información para continuar con tu compra personalizada.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="https://png.pngtree.com/thumb_back/fw800/background/20210827/pngtree-cosmetics-makeup-brush-pink-background-image_768168.jpg">

    <!-- 🐦 Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Formulario de Datos Personales | Tienda de Cosméticos">
    <meta name="twitter:description" content="Completa tu información personal y disfruta de una mejor experiencia de compra.">
    <meta name="twitter:image" content="https://png.pngtree.com/thumb_back/fw800/background/20210827/pngtree-cosmetics-makeup-brush-pink-background-image_768168.jpg">

    <!-- 📦 Estilos -->
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
