<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostrar información de un usuario.
     * @return Response
     */
    public function getHome()
    {
        return redirect()->action([CatalogController::class, 'getIndex']);
    }

}
