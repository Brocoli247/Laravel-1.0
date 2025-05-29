<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras - Mi Tienda de Cosméticos</title>
    <meta name="description" content="Consulta tu carrito de compras y verifica los productos seleccionados antes de realizar el pago en nuestra tienda de cosméticos.">
    <meta name="keywords" content="carrito, compras, cosméticos, productos de belleza, tienda online">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph para Facebook y redes -->
    <meta property="og:title" content="Carrito de Compras - Mi Tienda de Cosméticos">
    <meta property="og:description" content="Revisa los productos que has seleccionado y finaliza tu compra.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://i.pinimg.com/736x/fc/dc/6d/fcdc6d8ca3d286c9ee69ca37a36bf248.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Carrito de Compras - Mi Tienda de Cosméticos">
    <meta name="twitter:description" content="Confirma tus productos antes de pagar en nuestra tienda de belleza.">
    <meta name="twitter:image" content="https://i.pinimg.com/736x/fc/dc/6d/fcdc6d8ca3d286c9ee69ca37a36bf248.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://i.pinimg.com/736x/fc/dc/6d/fcdc6d8ca3d286c9ee69ca37a36bf248.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #d63384;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .product-card {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background: #fff;
            margin-bottom: 15px;
        }

        .product-img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            margin-right: 15px;
        }

        .btn-custom {
            background-color: #d63384;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #c21868;
        }

        .summary-card {
            padding: 20px;
            background: #ffe6f0;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .btn-secondary, .btn-danger {
            padding: 5px 10px;
            font-size: 14px;
        }

        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Carrito de Compras</h2>

        <table class="table table-bordered text-center align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="https://via.placeholder.com/80" class="product-img" alt="Producto Ejemplo"></td>
                    <td>Producto Ejemplo</td>
                    <td>$200</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn btn-sm btn-secondary">+</button>
                    </td>
                    <td>$200</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <div class="summary-card">
            <h4>Subtotal: $200</h4>
            <h4>Envío: $150 (Gratis si el pedido supera los $300)</h4>
            <h3 class="fw-bold">Total: $350</h3>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-custom w-100">Proceder al Pago</button>
        </div>
    </div>
</body>
</html>
