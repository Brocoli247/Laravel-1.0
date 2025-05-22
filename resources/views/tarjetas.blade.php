<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Tarjeta de Crédito/Débito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color:rgb(251, 216, 251);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #d63384; /* Rosa Bootstrap */
        }
        
        .container {
            max-width: 500px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .card-box {
            padding: 20px;
            background: #d63384;
            color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Registrar Tarjeta</h2>

        <div class="card-box mb-4">
            <h4><i class="fas fa-credit-card"></i> Tarjeta de Crédito / Débito</h4>
        </div>

        <form>
            <div class="mb-3">
                <label class="form-label">Número de Tarjeta</label>
                <input type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" required>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label">Fecha de Vencimiento (MM/YY)</label>
                    <input type="text" class="form-control" placeholder="MM/YY" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CVC/CVV</label>
                    <input type="text" class="form-control" placeholder="XXX" required>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="usarCuenta">
                <label class="form-check-label" for="usarCuenta">Usar el nombre de mi cuenta</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre en la Tarjeta</label>
                <input type="text" class="form-control" id="nombreTarjeta" placeholder="Nombre completo" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Registrar Tarjeta</button>
        </form>
    </div>

    <script>
        document.getElementById("usarCuenta").addEventListener("change", function() {
            var nombreTarjeta = document.getElementById("nombreTarjeta");
            nombreTarjeta.disabled = this.checked;
            if (this.checked) {
                nombreTarjeta.value = "Nombre de mi cuenta"; // Simulación
            } else {
                nombreTarjeta.value = "";
            }
        });
    </script>
</body>
</html>