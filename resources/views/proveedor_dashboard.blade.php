<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Proveedor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgba(108, 172, 240, 0.8); /* Azul claro */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #c21868;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border-radius: 5px;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido, Proveedor</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <hr>

        <h3 class="mb-3">Registrar Nueva Categoría</h3>
        <p class="text-muted" style="font-size: 12px; text-align: left;">
            <strong>Nota:</strong> Antes de registrar tu producto, verifica que exista la categoría del mismo.  
            Si la lista de categorías está vacía o tu categoría aún no existe, créala aquí para asociarla a tu producto.
        </p>
        <form method="POST" action="{{ route('proveedor.categorias.store') }}" class="mb-4">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Nombre de la Categoría</label>
                    <input type="text" name="Nombre_Categoria" class="form-control mb-2" required placeholder="Ejemplo: Maquillaje, Cuidado de la piel">
                </div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-success w-100">Crear Categoría</button>
                </div>
            </div>
        </form>

        <hr>

        <h3 class="mb-3">Registrar Nuevo Producto</h3>
        <form method="POST" action="{{ url('/proveedor/productos') }}" class="mb-4">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control mb-2" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control mb-2" required></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control mb-2" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cantidad Disponible</label>
                    <input type="number" name="cantidad" class="form-control mb-2" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Categoría</label>
                    <select name="ID_Categoria" class="form-control mb-2" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->ID_Categoria }}">{{ $categoria->Nombre_Categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">ID Proveedor</label>
                    <input type="number" name="ID_Proveedor" class="form-control mb-2" value="{{ Auth::guard('proveedor')->user()->ID_Proveedor }}" readonly>
                </div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-custom w-100">Registrar</button>
                </div>
            </div>
        </form>

        <hr>

        <h3 class="mb-3">Mis Productos</h3>

        @if($productos->isEmpty())
            <div class="alert alert-warning text-center">No hay productos registrados.</div>
        @else
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>ID Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>${{ $producto->precio }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->categoria->Nombre_Categoria ?? 'Sin categoría' }}</td>
                            <td>{{ $producto->ID_Proveedor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <hr>

        <div class="text-center mt-4">
            <form method="POST" action="{{ route('proveedor.logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>