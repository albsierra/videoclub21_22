<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
     * Pagina pricipal de la aplicacuón.
     * @param  int  $id
     * @return Response
     */
    public function getHome(){
        return view('home');
    }
}
