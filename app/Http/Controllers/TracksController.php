<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //tells it to use the DB in the global namespace, not look for it in this directory

class TracksController extends Controller {
  public function tracks(Request $request) {
    $noResults = false;

    if ($request->query('genre')){
      $genreMatches = DB::table('genres')->select('Name')->where('Name', '=', $request->query('genre'))->get();

      if (count($genreMatches) == 0){
        $noResults = true;
      } else {
        $noResults = false;
      }
    }

    $query= DB::table('tracks')
      ->select('tracks.Name as trackName', 'albums.Title as albumName', 'artists.Name as artistName', 'tracks.UnitPrice')
      ->join('albums','tracks.AlbumId','=','albums.AlbumId')
      ->join('genres','tracks.GenreId','=','genres.GenreId')
      ->join('artists','albums.ArtistId','=','artists.ArtistId');

    if ($request->query('genre') && !$noResults){
      $query->where('genres.Name', '=', $request->query('genre'));
    }

    $tracks = $query->get();

    return view('tracks',[
      'tracks'=>$tracks,
      'search'=>$request->query('genre'),
      'noResults'=>$noResults
    ]);
  }
}
