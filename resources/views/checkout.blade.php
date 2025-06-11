@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center mb-4">Finalizar Compra</h2>

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

    <h4>Dirección de Envío</h4>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="mb-3">
    @if($direcciones->isEmpty())
        <div class="alert alert-warning text-center">
            No tienes ninguna dirección registrada.<br>
            <a href="{{ route('direcciones') }}" class="btn btn-primary mt-2">Agregar Dirección</a>
        </div>
    @else
        <select name="direccion_id" class="form-select" required>
            <option value="">Selecciona una dirección</option>
            @foreach($direcciones as $dir)
                <option value="{{ $dir->ID_Direccion }}">
                    {{ $dir->Calle }} {{ $dir->Numero_Ext }} {{ $dir->Colonia }}, {{ $dir->Municipio }}, {{ $dir->Estado }}, CP {{ $dir->Codigo_Postal }}
                </option>
            @endforeach
        </select>
    @endif
</div>

        <h4>Método de Pago</h4>
        <div class="mb-3">
    @if($tarjetas->isEmpty())
        <div class="alert alert-warning text-center">
            No tienes ninguna tarjeta registrada.<br>
            <a href="{{ route('tarjetas') }}" class="btn btn-primary mt-2">Agregar Tarjeta</a>
        </div>
    @else
        <select name="tarjeta_id" class="form-select" required>
            <option value="">Selecciona una tarjeta</option>
            @foreach($tarjetas as $tarjeta)
                <option value="{{ $tarjeta->ID_Tarjeta }}">
                    **** **** **** {{ substr($tarjeta->Numero_Tarjeta, -4) }} ({{ $tarjeta->Tipo_Tarjeta }})
                </option>
            @endforeach
        </select>
    @endif
</div>

        <h4>Resumen del Pedido</h4>
        <table class="table table-bordered text-center align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $subtotal = 0; @endphp
                @foreach($carrito as $item)
                    @php
                        $producto = $item->producto;
                        $precio = $producto->precio ?? 0;
                        $totalItem = $precio * $item->Cantidad;
                        $subtotal += $totalItem;
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $producto->nombre ?? 'Producto' }}</strong>
                            <br>
                            <span class="text-muted small">{{ $producto->descripcion ?? '' }}</span>
                        </td>
                        <td>${{ number_format($producto->precio ?? 0,2) }}</td>
                        <td>{{ $item->Cantidad }}</td>
                        <td>${{ number_format($totalItem,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @php
            $envio = ($subtotal >= 300) ? 0 : 150;
            $total = $subtotal + $envio;
        @endphp
        <div class="summary-card mb-3">
            <h4>Subtotal: ${{ number_format($subtotal,2) }}</h4>
            <h4>Envío: ${{ number_format($envio,2) }} @if($envio==0)(¡Gratis!)@else(Gratis si el pedido supera los $300)@endif</h4>
            <h3 class="fw-bold">Total: ${{ number_format($total,2) }}</h3>
        </div>
        <button type="submit" class="btn btn-pink w-100" style="background-color:#e83e8c; color:white; border:none;" @if($direcciones->isEmpty() || $tarjetas->isEmpty()) disabled @endif>Confirmar Compra</button>
@if($direcciones->isEmpty() || $tarjetas->isEmpty())
    <div class="alert alert-danger text-center mt-3">
        Debes registrar al menos una dirección y una tarjeta para poder realizar la compra.
    </div>
@endif
    </form>
</div>
@endsection
