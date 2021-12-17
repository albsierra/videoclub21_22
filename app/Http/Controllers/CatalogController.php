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
        array(
            'header' => 'Listado de películas',
            'arrayPeliculas' => $peliculas)
        );
    }

    public function getShow($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.show',
        array(
            'header' => 'Pelicula',
            'pelicula' => $pelicula));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.edit',
        array(
            'pelicula' => $pelicula));
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie;
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->poster = $request->input('poster');
        $pelicula->save();
        return redirect(url('/catalog/show', array('id' => $pelicula->id)));
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->poster = $request->input('poster');
        $pelicula->save();
        return redirect(url('/catalog/show', array('id' => $pelicula->id)));
    }

    public function cambiar($id){
        $pelicula = Movie::find($id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();
        return redirect(url('/catalog/show', array('id' => $pelicula->id)));
    }
}
