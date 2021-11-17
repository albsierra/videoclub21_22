<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Página principal del catálogo de películas
     * @return Response (una respuesta)
     */
    public function getIndex()
    {
        return view('catalog.index');
    }

    /**
     * Página para mostrar una película con un id en concreto
     * @return Response (una respuesta), a la que le enviamos un id
     */
    public function getShow($id)
    {
        return view('catalog.show', array('id'=>$id));
    }

    /**
     * Página para crear una película
     * @return Response (una respuesta)
     */
    public function getCreate()
    {
        return view('catalog.create');
    }

    /**
     * Página para editar una película con un id en concreto
     * @return Response (una respuesta), a la que le enviamos un id
     */
    public function getEdit($id)
    {
        return view('catalog.show', array('id'=>$id));
    }

}
