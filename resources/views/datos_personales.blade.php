@extends('layouts.app')
@section('title', 'Datos Personales | Tienda de Cosméticos')
@section('content')
<div class="container" style="max-width:600px;background:rgba(255,255,255,0.95);padding:30px;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,0.15);margin-top:40px;margin-bottom:40px;">
    <h2 class="text-center mb-4">Datos Personales</h2>
    <form method="POST" action="{{ route('datos.personales.update') }}">
        @csrf
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
        <div class="mb-3">
            <label class="form-label">Nombre(s)</label>
            <input type="text" name="Nombre" class="form-control" placeholder="Ejemplo: Juan Carlos" value="{{ old('Nombre', session('cliente')->Nombre ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido Paterno</label>
            <input type="text" name="Apellido_Paterno" class="form-control" placeholder="Ejemplo: Pérez" value="{{ old('Apellido_Paterno', session('cliente')->Apellido_Paterno ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido Materno</label>
            <input type="text" name="Apellido_Materno" class="form-control" placeholder="Ejemplo: Rodríguez" value="{{ old('Apellido_Materno', session('cliente')->Apellido_Materno ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="tel" name="Telefono" class="form-control" placeholder="Ejemplo: 55 1234 5678" value="{{ old('Telefono', session('cliente')->Telefono ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-custom" style="background-color:#d63384;border:none;color:white;padding:10px 15px;border-radius:5px;font-size:16px;transition:0.3s;width:100%;">Guardar Datos</button>
    </form>
</div>
@endsection
<style>
body {
    background: url('https://png.pngtree.com/thumb_back/fw800/background/20210827/pngtree-cosmetics-makeup-brush-pink-background-image_768168.jpg') no-repeat center center fixed;
    background-size: cover;
}
</style>

