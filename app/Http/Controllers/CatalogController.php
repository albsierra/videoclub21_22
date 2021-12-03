<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas = Movie::all();
        return view('catalog.index',
        array('arrayPeliculas' => $peliculas));
    }

    public function getShow($id)
    {
        return view('catalog.show',
        array(
            'pelicula' => Movie::find($id)));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        return view('catalog.edit',
        array(
            'id' => $id,
            'pelicula' => Movie::find($id)));
    }

    public function postCreate(Request $request){
        $peliculas = new Movie();
        $peliculas->title= $request->input('title');
        $peliculas->year= $request->input('year');
        $peliculas->director= $request->input('director');
        $peliculas->poster= $request->input('poster');
        $peliculas->synopsis= $request->input('synopsis');
        $peliculas->save();
        return redirect(url('catalog/show',array('id'=>$peliculas->id)));
    }

    public function putEdit(Request $request, $id){
        $peliculas = Movie::findOrFail($id);
        $peliculas->title= $request->input('title');
        $peliculas->year= $request->input('year');
        $peliculas->director= $request->input('director');
        $peliculas->poster= $request->input('poster');
        $peliculas->synopsis= $request->input('synopsis');
        $peliculas->save();
        return redirect(url('catalog/edit',array('id'=>$peliculas->id)));
    }
}
