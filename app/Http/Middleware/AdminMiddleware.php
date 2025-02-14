<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response

    {
        // Verificar si el usuario está autenticado y si su rol es 'admin'
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permiso para acceder.');
        }

        return $next($request); // Continuar con la solicitud si es un administrador
    }
}

