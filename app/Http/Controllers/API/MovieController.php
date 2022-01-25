<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function search(Request $response, $search){
        $host = 'www.omdbapi.com';
        $response = Http::get('http://' . $host . '/', [
            'apikey' => env('API_KEY'),
            's' => $search,
            'page' => 1,
            'r' => 'json'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MovieResource::collection(Movie::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Movie = json_decode($request->getContent(), true);

        $Movie = Movie::create($Movie);

        return new MovieResource($Movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $Movie)
    {
        return new MovieResource($Movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $Movie)
    {
        $MovieData = json_decode($request->getContent(), true);
        $Movie->update($MovieData);

        return new MovieResource($Movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $Movie)
    {
        $Movie->delete();
    }
}
