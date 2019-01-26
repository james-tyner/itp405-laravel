<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //tells it to use the DB in the global namespace, not look for it in this directory

class GenresController extends Controller {
  public function index() {
    $query= DB::table('genres');

    $genres = $query->get(); // select all from genres database

    // need URL encoded names to use in href
    foreach($genres as $genre) {
      $genre->URL = urlencode($genre->Name);
    };

    return view('genres',[
      'genres'=>$genres,
    ]);
  }
}
