<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

/**
 * Confía en los proxies para que laravel los resconosca como seguras
 */

class TrustProxies extends Middleware
{
    /**
     * nombre de los campos que no se deben limpiar de espacios
     *
     * @var array<int, string>
     */
    protected $proxies;

    protected $headers = Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}