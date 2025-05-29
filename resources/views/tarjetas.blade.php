<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Tarjeta de Crédito/Débito | Plataforma de Belleza</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Registra tu tarjeta de crédito o débito de forma segura para comprar productos de belleza y maquillaje en nuestra plataforma.">
    <meta name="keywords" content="registrar tarjeta, tarjeta crédito, tarjeta débito, pago seguro, plataforma belleza, maquillaje, cosméticos">
    <meta name="author" content="Tu Empresa o Nombre">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Spanish">

    <!-- Open Graph para compartir en redes -->
    <meta property="og:title" content="Registrar Tarjeta de Crédito/Débito | Plataforma de Belleza">
    <meta property="og:description" content="Registra tu tarjeta de crédito o débito para realizar compras seguras en nuestra plataforma especializada en productos de belleza.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/logo.png') }}"> <!-- Cambia por logo real -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous" defer></script>

    <style>
        body {
            background: url('https://st.depositphotos.com/10614052/52357/i/450/depositphotos_523571844-stock-photo-composition-makeup-cosmetics-christmas-decor.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #d63384; /* Rosa Bootstrap */
        }
        
        .container {
            max-width: 500px;
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.95); /* Fondo semitransparente */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .card-box {
            padding: 20px;
            background: #d63384;
            color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
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
    <main class="container" role="main" aria-label="Formulario para registrar tarjeta de crédito o débito">
        <h2 class="text-center mb-4">Registrar Tarjeta</h2>

        <div class="card-box mb-4" aria-hidden="true">
            <h4><i class="fas fa-credit-card" aria-hidden="true"></i> Tarjeta de Crédito / Débito</h4>
        </div>

        <form aria-describedby="form-desc" novalidate>
            <p id="form-desc" class="visually-hidden">Formulario para registrar tarjeta de crédito o débito para pagos en la plataforma</p>

            <div class="mb-3">
                <label for="numeroTarjeta" class="form-label">Número de Tarjeta</label>
                <input id="numeroTarjeta" type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="[0-9\s-]{13,19}" inputmode="numeric" autocomplete="cc-number" required aria-required="true" aria-describedby="numeroHelp">
                <div id="numeroHelp" class="form-text">Introduce el número completo sin espacios ni guiones.</div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="fechaVencimiento" class="form-label">Fecha de Vencimiento (MM/AA)</label>
                    <input id="fechaVencimiento" type="text" class="form-control" placeholder="MM/AA" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" autocomplete="cc-exp" required aria-required="true" aria-describedby="fechaHelp">
                    <div id="fechaHelp" class="form-text">Formato mes/año, por ejemplo 09/25.</div>
                </div>
                <div class="col-md-6">
                    <label for="cvc" class="form-label">CVC/CVV</label>
                    <input id="cvc" type="text" class="form-control" placeholder="XXX" pattern="[0-9]{3,4}" autocomplete="cc-csc" required aria-required="true" aria-describedby="cvcHelp">
                    <div id="cvcHelp" class="form-text">Código de seguridad de 3 o 4 dígitos.</div>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="usarCuenta">
                <label class="form-check-label" for="usarCuenta">Usar el nombre de mi cuenta</label>
            </div>

            <div class="mb-3">
                <label for="nombreTarjeta" class="form-label">Nombre en la Tarjeta</label>
                <input type="text" class="form-control" id="nombreTarjeta" placeholder="Nombre completo" autocomplete="cc-name" required aria-required="true">
            </div>

            <button type="submit" class="btn btn-custom w-100">Registrar Tarjeta</button>
        </form>
    </main>

    <script>
        document.getElementById("usarCuenta").addEventListener("change", function() {
            var nombreTarjeta = document.getElementById("nombreTarjeta");
            if (this.checked) {
                nombreTarjeta.value = "Nombre de mi cuenta"; // Simulación
                nombreTarjeta.disabled = true;
            } else {
                nombreTarjeta.value = "";
                nombreTarjeta.disabled = false;
            }
        });
    </script>
</body>
</html>
