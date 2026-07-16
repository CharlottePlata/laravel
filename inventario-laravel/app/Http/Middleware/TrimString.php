<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * EliminaLos espacios innecesarios de los textos
 */

class TrimStrings extends Middleware
{
    /**
     * nombre de los campos que no se deben limpiar de espacios
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}