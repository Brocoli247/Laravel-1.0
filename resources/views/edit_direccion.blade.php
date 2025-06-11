@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center mb-4">Editar Dirección</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('direcciones.update', $direccion->ID_Direccion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="Estado" class="form-control" value="{{ old('Estado', $direccion->Estado) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Municipio</label>
            <input type="text" name="Municipio" class="form-control" value="{{ old('Municipio', $direccion->Municipio) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Colonia</label>
            <input type="text" name="Colonia" class="form-control" value="{{ old('Colonia', $direccion->Colonia) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Calle</label>
            <input type="text" name="Calle" class="form-control" value="{{ old('Calle', $direccion->Calle) }}" required>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label class="form-label">Número Exterior</label>
                <input type="text" name="Numero_Ext" class="form-control" value="{{ old('Numero_Ext', $direccion->Numero_Ext) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Número Interior (Opcional)</label>
                <input type="text" name="Numero_Int" class="form-control" value="{{ old('Numero_Int', $direccion->Numero_Int) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Código Postal</label>
            <input type="text" name="Codigo_Postal" class="form-control" value="{{ old('Codigo_Postal', $direccion->Codigo_Postal) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Dirección</button>
        <a href="{{ route('direcciones') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
