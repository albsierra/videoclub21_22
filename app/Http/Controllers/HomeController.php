<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Página principal de la página
     * @return Response (una respuesta)
     */
    public function getHome()
    {
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}
