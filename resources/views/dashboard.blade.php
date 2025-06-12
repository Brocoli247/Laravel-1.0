@extends('layouts.app')
@section('title', 'Bienvenido - Sesión Iniciada | Tienda de Cosméticos')
@section('content')
<style>
        body {
            background-image: url('img/fondo-de-maquillaje.jpg');
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
             min-height: 100vh;
            padding-top: 80px;
            
        }
        
        .mensaje-sesion {
        background-color: rgba(255, 230, 240, 0.54); /* rosita claro */
         color: rgb(180, 50, 100); /* rosado más fuerte */
        border: none;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        

        .tabla-rosita thead th {
         color: rgb(149, 14, 68); 
        }

         .tabla-rosita tbody td {
          background-color: rgba(255, 230, 240, 0.69); 
         color: rgb(3, 75, 38); 
        }
        h3 {
        color:rgb(5, 104, 25); 
        }
 


    </style>


<div class="card text-center mt-3 mb-4 mensaje-sesion">
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
    <table class="table table-bordered align-middle text-center tabla-rosita">
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

