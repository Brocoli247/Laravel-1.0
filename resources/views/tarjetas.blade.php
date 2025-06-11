@extends('layouts.app')
@section('content')
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
    <main class="container" style="max-width:700px;" role="main" aria-label="Formulario para registrar tarjeta de crédito o débito">
        

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de registro de tarjeta -->
        <h2 class="display-5 fw-bold mb-4 text-center" style="color:#e83e8c;">Registrar Tarjeta</h2>
        <form action="{{ route('tarjetas.store') }}" method="POST" aria-describedby="form-desc" novalidate>
            @csrf
            <p id="form-desc" class="visually-hidden">Formulario para registrar tarjeta de crédito o débito para pagos en la plataforma</p>
            <div class="mb-3">
                <label for="numeroTarjeta" class="form-label fw-bold" style="color:#2366a8;">Número de Tarjeta</label>
                <input id="numeroTarjeta" name="Numero_Tarjeta" type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="[0-9\s-]{13,19}" inputmode="numeric" autocomplete="cc-number" required aria-required="true" aria-describedby="numeroHelp">
                <div id="numeroHelp" class="form-text">Introduce el número completo sin espacios ni guiones.</div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="fechaVencimiento" class="form-label fw-bold" style="color:#2366a8;">Fecha de Vencimiento</label>
                    @php
    $exp = old('Fecha_Expiracion', '');
    $expParts = $exp ? explode('-', $exp) : [null, null];
    $expMonth = isset($expParts[1]) ? $expParts[1] : '';
    $expYear = isset($expParts[0]) ? substr($expParts[0], -2) : '';
    $fullYear = isset($expParts[0]) ? $expParts[0] : '';
    $currentYear = intval(date('y'));
@endphp
<div class="row">
    <div class="col-6">
        <label for="mes_vencimiento" class="form-label">Mes</label>
        <select id="mes_vencimiento" class="form-control" required>
            <option value="">MM</option>
            @for($m = 1; $m <= 12; $m++)
                <option value="{{ sprintf('%02d', $m) }}" {{ $expMonth == sprintf('%02d', $m) ? 'selected' : '' }}>{{ sprintf('%02d', $m) }}</option>
            @endfor
        </select>
    </div>
    <div class="col-6">
        <label for="anio_vencimiento" class="form-label">Año</label>
        <select id="anio_vencimiento" class="form-control" required>
            <option value="">AA</option>
            @for($y = $currentYear; $y <= $currentYear + 15; $y++)
                <option value="{{ sprintf('%02d', $y) }}" {{ $expYear == sprintf('%02d', $y) ? 'selected' : '' }}>{{ sprintf('%02d', $y) }}</option>
            @endfor
        </select>
    </div>
</div>
<input type="hidden" name="Fecha_Expiracion" id="Fecha_Expiracion" value="{{ $exp }}">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateFechaExp() {
            var mes = document.getElementById('mes_vencimiento').value;
            var anio = document.getElementById('anio_vencimiento').value;
            if(mes && anio) {
                var fullYear = (anio.length === 2 ? '20' + anio : anio);
                document.getElementById('Fecha_Expiracion').value = fullYear + '-' + mes;
            }
        }
        document.getElementById('mes_vencimiento').addEventListener('change', updateFechaExp);
        document.getElementById('anio_vencimiento').addEventListener('change', updateFechaExp);
    });
</script>
                </div>
                <div class="col-md-6">
                    <label for="cvc" class="form-label fw-bold" style="color:#2366a8;">CVC/CVV</label>
                    <div id="cvcHelp" class="form-text mb-1">Código de 3 o 4 dígitos</div>
                    <input id="cvc" name="CVV" type="text" class="form-control" placeholder="XXX" pattern="[0-9]{3,4}" autocomplete="cc-csc" required aria-required="true" aria-describedby="cvcHelp">
                </div>
            </div>
            <div class="mb-3">
                <label for="tipoTarjeta" class="form-label fw-bold" style="color:#2366a8;">Tipo de Tarjeta</label>
                <select id="tipoTarjeta" name="Tipo_Tarjeta" class="form-control" required>
                    <option value="">Selecciona...</option>
                    <option value="Crédito">Crédito</option>
                    <option value="Débito">Débito</option>
                </select>
            </div>
            <button type="submit" class="btn btn-custom w-100">Registrar Tarjeta</button>
        </form>
        <h4 class="fw-bold text-center mb-4 mt-5" style="color:#e83e8c;">Mis Tarjetas Registradas</h4>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Expiración</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tarjetas as $tarjeta)
                        <tr>
                            <td>**** **** **** {{ substr($tarjeta->Numero_Tarjeta, -4) }}</td>
                            <td>{{ sprintf('%02d', \Carbon\Carbon::parse($tarjeta->Fecha_Expiracion)->month) }}/{{ substr(\Carbon\Carbon::parse($tarjeta->Fecha_Expiracion)->year, -2) }}</td>
                            <td>{{ $tarjeta->Tipo_Tarjeta }}</td>
                            <td>
                                <div class="row g-1">
    <div class="col-6">
        <a href="{{ route('tarjetas.edit', $tarjeta->ID_Tarjeta) }}" class="btn btn-warning btn-sm w-100"><i class="fas fa-edit"></i> Editar</a>
    </div>
    <div class="col-6">
        <form action="{{ route('tarjetas.destroy', $tarjeta->ID_Tarjeta) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm w-100"><i class="fas fa-trash"></i> Eliminar</button>
        </form>
    </div>
</div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No tienes tarjetas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

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
@endsection
