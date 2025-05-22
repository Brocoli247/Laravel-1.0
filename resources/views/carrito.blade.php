<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
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
            max-width: 900px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .btn-secondary, .btn-danger {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Carrito de Compras</h2>

        <table class="table table-bordered text-center">
            <thead>
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
                    <td><img src="https://via.placeholder.com/80" class="product-img" alt="Producto"></td>
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

        <!-- 🔹 Resumen del Pago -->
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