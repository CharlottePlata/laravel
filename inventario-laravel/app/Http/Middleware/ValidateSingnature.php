<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\ValidateSignature as Middleware;
use Illuminate\Http\Request;

/**
 * Valida la firma de las solicitudes url para proteger los enlases sencibles
 */

class ValidateSignature extends Middleware
{
    /**
     * nombre de los campos que no se deben limpiar de espacios
     *
     * @var array<int, string>
     */
    protected $except = [
        // 'fbcclid'
        // 'utm_campaing'
        // 'utm_content'
        // 'utm_medium'
        // 'utm_source'
        // 'utm_term'
    ];
}