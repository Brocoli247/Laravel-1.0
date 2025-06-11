@extends('layouts.app')
@section('content')
<div class="container mt-5">
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
@endsection
