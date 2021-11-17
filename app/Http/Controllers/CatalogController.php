<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Mostrar index.
     * @return Response
     */
    public function getIndex(){
        return view('catalog.index');
    }
    /**
     * Enseñar película
     * @param  int  $id
     * @return Response
     */
    public function getShow($id){
        return view('catalog.show', array('id'=>$id));
    }
    /**
     * Crear película.
     * @return Response
     */
    public function getCreate(){
        return view('catalog.create');
    }
    /**
     * Editar película
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id){
        return view('catalog.edit', array('id'=>$id));
    }
}
