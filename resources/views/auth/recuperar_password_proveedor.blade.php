@extends('layouts.app')
@section('content')
<div class="container" style="max-width:400px; margin-top:40px;">
    <h3 class="mb-4 text-center">Nueva Contraseña (Proveedor)</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('recuperar.proveedor.password.post', $email) }}">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input type="password" id="password" name="password" class="form-control" required minlength="6">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required minlength="6">
        </div>
        <button type="submit" class="btn btn-custom w-100">Actualizar contraseña</button>
    </form>
    <div class="mt-3 text-center">
        <a href="{{ route('proveedor.login') }}">Volver a iniciar sesión</a>
    </div>
</div>
@endsection
