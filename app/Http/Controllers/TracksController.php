<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller {
  public function index(Request $request) {
    $noResults = false;

    if ($request->query('genre')){
      $genreMatches = DB::table('genres')->select('Name')->where('Name', '=', $request->query('genre'))->get();

      if (count($genreMatches) == 0){
        $noResults = true;
      } else {
        $noResults = false;
      }
    }

    $query = DB::table('tracks')
      ->select('tracks.Name as trackName', 'albums.Title as albumName', 'artists.Name as artistName', 'tracks.UnitPrice')
      ->join('albums','tracks.AlbumId','=','albums.AlbumId')
      ->join('genres','tracks.GenreId','=','genres.GenreId')
      ->join('artists','albums.ArtistId','=','artists.ArtistId');

    if ($request->query('genre') && !$noResults){
      $query->where('genres.Name', '=', $request->query('genre'));
    }

    $tracks = $query->get();

    return view('tracks.tracks',[
      'tracks'=>$tracks,
      'search'=>$request->query('genre'),
      'noResults'=>$noResults
    ]);
  }

  public function create(){
    $albumsList = DB::table('albums')->get();

    $typesList = DB::table('media_types')->get();

    $genresList = DB::table('genres')->get();

    return view('tracks.create',[
      'albums'=>$albumsList,
      'types'=>$typesList,
      'genres'=>$genresList
    ]);
  }

  public function store(Request $request){
    $input = $request->all();

    // Server-side validation in addition to the client-side validation through HTML5 attributes
    $validation = Validator::make($input,[
      'name'=>'required',
      'album'=>'required',
      'type'=>'required',
      'genre'=>'required',
      'composer'=>'required',
      'milliseconds'=>'required|numeric',
      'bytes'=>'required|numeric',
      'price'=>'required|numeric'
    ]);

    //if validation fails, redirect back to form with an error message
    if ($validation->fails()){
      return redirect("/tracks/new")
        ->withErrors($validation)
        ->withInput();
    }

    DB::table("tracks")->insert([
      "Name"=>$request->name,
      "AlbumId"=>$request->album,
      "MediaTypeId"=>$request->type,
      "GenreId"=>$request->genre,
      "Composer"=>$request->composer,
      "Milliseconds"=>$request->milliseconds,
      "Bytes"=>$request->bytes,
      "UnitPrice"=>$request->price
    ]);

    return redirect("/tracks");
  }
}
