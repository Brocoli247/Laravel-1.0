<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerificarUsuario
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('cliente_id')) {
            $ruta = encrypt($request->fullUrl());
            return redirect()->route('welcome', ['r' => $ruta]);
        }

        return $next($request);
    }
}
