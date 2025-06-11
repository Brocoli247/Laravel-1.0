@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center mb-4">Editar Tarjeta</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tarjetas.update', $tarjeta->ID_Tarjeta) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Número de Tarjeta</label>
            <input type="text" name="Numero_Tarjeta" class="form-control" value="{{ old('Numero_Tarjeta', $tarjeta->Numero_Tarjeta) }}" required maxlength="19" minlength="13">
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label class="form-label">Fecha de Vencimiento</label>
                @php
    $exp = old('Fecha_Expiracion', \Carbon\Carbon::parse($tarjeta->Fecha_Expiracion)->format('Y-m'));
    $expParts = explode('-', $exp);
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
<div class="row mt-3">
    <div class="col-12">
        <label for="cvc" class="form-label">CVC/CVV</label>
        <input id="cvc" name="CVV" type="text" class="form-control" placeholder="XXX" pattern="[0-9]{3,4}" autocomplete="cc-csc" required aria-required="true" aria-describedby="cvcHelp">
        <div id="cvcHelp" class="form-text">Código de seguridad de 3 o 4 dígitos.</div>
    </div>
</div>
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
        <div class="mb-3">
            <label class="form-label">Tipo de Tarjeta</label>
            <select name="Tipo_Tarjeta" class="form-control" required>
                <option value="Crédito" {{ old('Tipo_Tarjeta', $tarjeta->Tipo_Tarjeta) == 'Crédito' ? 'selected' : '' }}>Crédito</option>
                <option value="Débito" {{ old('Tipo_Tarjeta', $tarjeta->Tipo_Tarjeta) == 'Débito' ? 'selected' : '' }}>Débito</option>
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar Tarjeta</button>
        <a href="{{ route('tarjetas') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
