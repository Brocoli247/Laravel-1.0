@extends('layouts.app')
@section('content')

<style>
    body {
        background-image: url('{{ asset('img/historial.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding-top: 80px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .titulo-historial {
        text-align: center;
        color: rgb(232, 79, 133); /* Rosa fuerte */
        font-weight: bold;
    }

    .tabla-rosada thead {
        background-color: rgba(240, 120, 160, 0.54); /* Encabezado rosa fuerte */
        color: white;
    }

    .tabla-rosada tbody td {
        background-color: rgba(246, 201, 219, 0.89); /* Celdas fondo rosa claro */
        color: rgb(0, 128, 0); /* Verde limón */
    }

    .container {
        background: rgba(255, 255, 255, 0); 
        padding: 30px;
        border-radius: 15px;
        max-width: 1200px;
        margin: auto;
    }
</style>

<div class="container">
    <h2 class="titulo-historial mb-4">Historial de Pedidos</h2>

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

    <table class="table table-bordered align-middle bg-white tabla-rosada">
        <thead class="table-light">
            <tr>
                <th>Fecha</th>
<th>Total</th>
<th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ordenes as $orden)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($orden->Fecha)->format('d/m/Y') }}</td>
                    <td>${{ number_format($orden->detalles->sum('Subtotal'), 2) }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($orden->detalles as $detalle)
                                <li>{{ $detalle->producto->nombre ?? 'Producto eliminado' }} x{{ $detalle->Cantidad }}</li>
                            @endforeach
                        </ul>
                    </td>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No tienes pedidos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
