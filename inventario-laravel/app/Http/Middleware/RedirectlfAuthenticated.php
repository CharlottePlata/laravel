<?php

use Illunate\Auth\Middleware\RedirectlfAuthenticated as Middleware;
use Iluminare\Http\Request;
use Iluminate\Support\Facades\Auth;

/**
 * Es que redirije al ususario a dashboards si ya esta autenticado
 */

Class RedirectlfAuthenticated extends Middleware
{
     public function handle(Request $request, \Closure $next, string ...$guards):\Symfonny\Component\HttpFoundation\Response
     {
        $guards = empaty($guards) ? [null] : $guards;

        foreach($guards as $guard){
            if(Auth::guard($guard)->check()){
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
     }
}