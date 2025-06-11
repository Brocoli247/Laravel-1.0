@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center mb-4">Historial de Pedidos</h2>

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

    <table class="table table-bordered align-middle bg-white">
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
