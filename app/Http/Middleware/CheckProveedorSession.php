<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckProveedorSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('proveedor')) {
            return redirect()->route('proveedor.login')->with('error', 'Debes iniciar sesión como proveedor.');
        }

        return $next($request);
    }
}