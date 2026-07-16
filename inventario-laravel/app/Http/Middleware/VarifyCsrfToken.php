<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\VerifyCsrfToken as Middleware;


/**
 * Verifica el token CSRF para proteger contrea los ataque de fasificacion de solicitudes
 */

class VerifyCsrfToken extends Middleware
{
    /**
     * nombre de los campos que no se deben limpiar de espacios
     *
     * @var array<int, string>
     */
    protected $except = [
        // 
    ];
}