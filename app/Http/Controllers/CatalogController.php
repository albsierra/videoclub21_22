<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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
        $pelicula = Movie::find($id);
        return view('catalog.show',
        array('pelicula' => $pelicula));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function postCreate(Request $datos)
    {
        $nuevaPeli = new Movie;
        $nuevaPeli->id = $datos->input('id');
        $nuevaPeli->title = $datos->input('title');
        $nuevaPeli->year = $datos->input('year');
        $nuevaPeli->director = $datos->input('director');
        $nuevaPeli->poster = $datos->input('poster');
        $nuevaPeli->synopsis = $datos->input('synopsis');
        $nuevaPeli->save();
        return redirect(action('/catalog/show',array('id' => $nuevaPeli->id)));
    }

    public function getEdit($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.edit',
        array('pelicula' => $pelicula));
    }

    public function putEdit(Request $datos, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->id = $id;
        $pelicula->title = $datos->input('title');
        $pelicula->year = $datos->input('year');
        $pelicula->director = $datos->input('director');
        $pelicula->poster = $datos->input('poster');
        $pelicula->synopsis = $datos->input('synopsis');
        $pelicula->save();
        return view('catalog.edit',
        array('pelicula' => $pelicula));
    }

}
