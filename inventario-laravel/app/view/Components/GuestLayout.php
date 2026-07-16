<?php
namespace App\Http\Components;

use Illuminate\View\Components;
use Illuminate\View\View;

/**
 * Componente representa el layout principal de la aplicacion 
 * se encarga de cargar las vistas de bases usuadas por la pagina
 * autenticado
 */

class GuestLayout extends Component
{
    public function render():View
    {
        return view('layouts.guest');
    }
}