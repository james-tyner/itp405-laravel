<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller {
  public function index() {
    $query= DB::table('genres');

    $genres = $query->get(); // select all from genres database

    // need URL encoded names to use in href
    foreach($genres as $genre) {
      $genre->URL = urlencode($genre->Name);
    };

    return view('genres.genres',[
      'genres'=>$genres
    ]);
  }

  public function edit($id){
    $genreInfo = DB::table('genres')
      ->where('GenreId', '=', $id)
      ->first();

    return view('genres.edit',[
      'info'=>$genreInfo
    ]);
  }

  public function store(Request $request){
    $input = $request->all();

    $validation = Validator::make($input,[
      'name'=>'required|min:3|unique:genres,Name'
    ]);

    if ($validation->fails()){
      return redirect("/genres/" . $request->id . "/edit")
        ->withErrors($validation)
        ->withInput();
    }

    DB::table("genres")
      ->where('GenreId', '=', $request->id)
      ->update(["Name"=>$request->name]);

    return redirect('/genres');
  }
}
