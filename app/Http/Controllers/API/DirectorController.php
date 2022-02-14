<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        //
    }

    public function importDirectores(){
        $peliculas = Movie::all();
        foreach ($peliculas as $pelicula){
            $directorStr = $pelicula->director;

            // Sacar el nombre y apellidos
            $espacios = strpos($directorStr, ' ');
            $nombre = substr($directorStr, 0, $espacios+1);
            $apellidos = substr($directorStr, $espacios);

            if(!$director = Director::existeDirector($nombre, $apellidos)){
                $director = Director::create([
                    'nombre' => $nombre,
                    'apellidos' =>$apellidos
                ]);
            }
            //$pelicula->id_director = $director->id_director;
            $pelicula->elDirector()->associate($director);
            $pelicula->save();
        }

    }
}
