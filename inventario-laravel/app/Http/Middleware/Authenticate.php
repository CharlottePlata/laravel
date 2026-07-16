<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

/**
 * restringe el acceso a usuarios que no tengan rol
 */

class AdminMiddleware
{
    /**
     * maneja la peticion entrnate y valida si el ususario tiene permiso de admin
     * @param \Closure(Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */

    Public function handle(Request $request, Clousure $next):Response
    {
        if(Auth::check() && Auth::user()->role === 'admin'){
            return $next($request);
        }

        abort(403,'No tienes permiso de administrador');
    }
}
