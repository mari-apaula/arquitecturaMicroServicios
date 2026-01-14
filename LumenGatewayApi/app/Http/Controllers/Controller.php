<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser; // <--- 1. IMPORTAR EL ARCHIVO
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponser; // <--- 2. USAR EL TRAIT AQUÍ ADENTRO
}