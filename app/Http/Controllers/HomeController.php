<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Pagina principal.
     * @return Response
     */
    public function getHome()
    {
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}
