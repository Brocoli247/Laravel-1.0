@extends('layouts.app')
@section('title', 'Bienvenido - Sesión Iniciada | Tienda de Cosméticos')
@section('content')
<div class="card text-center mt-3 mb-4">
    <h2>¡Inicio de sesión exitoso!</h2>
    <p class="mt-3">
        Bienvenido, <strong>{{ session('cliente')->Nombre ?? 'Invitado' }}</strong>.
        Has iniciado sesión correctamente.
    </p>
</div>
<h3 class="mb-3 text-center">Todos los Productos Disponibles</h3>
@if($productos->isEmpty())
    <div class="alert alert-warning text-center">No hay productos registrados.</div>
@else
    <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
        <thead>
            <tr>
                <th>Imagen</th>
<th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Proveedor</th>
                <th>Cantidad</th>
                <th>Añadir al carrito</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td><img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/80' }}" alt="Imagen" style="width:60px; height:60px; border-radius:8px;"></td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->categoria->Nombre_Categoria ?? 'Sin categoría' }}</td>
                    <td>{{ $producto->proveedor->Nombre_Proveedor ?? 'Sin proveedor' }}</td>
                    <td>
                        <form method="POST" action="{{ url('/carrito') }}" class="d-flex justify-content-center align-items-center">
                            @csrf
                            <input type="hidden" name="ID_Producto" value="{{ $producto->ID_Producto ?? $producto->id }}">
                            <input type="number" name="Cantidad" value="1" min="1" max="{{ $producto->cantidad }}" class="form-control" style="width: 70px;" required>
                    </td>
                    <td>
                            <button type="submit" class="btn btn-success btn-sm" @if($producto->cantidad==0) disabled @endif>
                                Añadir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endif
@endsection

