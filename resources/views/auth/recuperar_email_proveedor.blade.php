@extends('layouts.app')
@section('content')
<div class="container" style="max-width:400px; margin-top:40px;">
    <h3 class="mb-4 text-center">Recuperar Contraseña (Proveedor)</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('recuperar.proveedor.email.post') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-custom w-100">Verificar correo</button>
    </form>
    <div class="mt-3 text-center">
        <a href="{{ route('proveedor.login') }}">Volver a iniciar sesión</a>
    </div>
</div>
@endsection
