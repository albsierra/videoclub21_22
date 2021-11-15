<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    return view('logout');
});
Route::get('/catalog', function () {
    return view('catalog');
});
Route::get('/catalog/show/{id}', function ($id) {
    return view('showFilm');
});
Route::get('/catalog/create', function () {
    return view('addFilm');
});
Route::get('/catalog/edit/{id}', function ($id) {
    return view('editFilm');
});
