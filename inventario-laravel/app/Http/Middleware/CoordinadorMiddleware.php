<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

//restringe el acceso a ususarios que no tenga el rol

class CoordinadorMiddleware
{
     //maneja para peticion entrante y calida si el ussuario tiene permiso de admin
     //@param \clousere(Iluminate\http\Request): (\Symfony\Component\HttpFoundation\Response) $next

     public function handle(Request $request, Clousure $next):Response

     {
        if(Auth::check() && Auth::user() ->role === 'coordinador' ||
           Auth::user() ->role === 'admin'){
            return $next($request);
        }

        abort(403,'No tienes permiso de coordinador');
     }
}
