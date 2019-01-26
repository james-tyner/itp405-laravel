<?php

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

// Default to the genres view (like in the old assignment)
Route::get('/', 'GenresController@index');

// For the /tracks URI, use the tracks controller to get to that view
Route::get('/tracks', 'TracksController@tracks');
