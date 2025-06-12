@extends('layouts.app')
@section('content')

<style>

  

   body {
        background-image: url('{{ asset('img/productos.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding-top: 80px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .contenido-editar {
        max-width: 1200px;
        margin: auto;
        padding: 30px;
        background: rgba(240, 215, 238, 0.46); /* Fondo con transparencia */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
        color: #800080; 
        font-weight: bold;
    }

    .btn-secondary {
        background-color: #007bff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #c21868;
    }

</style>



<div class="container mt-5">
     <div class="contenido-editar">
    <h2 class="mb-4 text-center">Editar Producto</h2>
    <form method="POST" action="{{ url('/proveedor/productos/' . $producto->ID_Producto) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control mb-2" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">URL de la Imagen</label>
                <input type="url" name="imagen_url" class="form-control mb-2" value="{{ old('imagen_url', $producto->imagen_url) }}" placeholder="https://ejemplo.com/imagen.jpg">
            </div>
            <div class="col-md-6">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control mb-2" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control mb-2" value="{{ old('precio', $producto->precio) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Cantidad Disponible</label>
                <input type="number" name="cantidad" class="form-control mb-2" value="{{ old('cantidad', $producto->cantidad) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Categoría</label>
                <select name="ID_Categoria" class="form-control mb-2" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->ID_Categoria }}" {{ $producto->ID_Categoria == $categoria->ID_Categoria ? 'selected' : '' }}>{{ $categoria->Nombre_Categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">ID Proveedor</label>
                <input type="number" name="ID_Proveedor" class="form-control mb-2" value="{{ old('ID_Proveedor', $producto->ID_Proveedor) }}" readonly>
            </div>
            <div class="col-md-2 text-center align-self-end">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="{{ route('proveedor.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>
</div>
@endsection
