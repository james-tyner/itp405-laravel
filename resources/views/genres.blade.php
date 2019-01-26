@extends('layout')

@section('title', 'Genres')

@section('main')

<div class="jumbotron">
  <h1 class="display-2">Genres</h1>
  <hr class="my-4">
  <p>James Tyner | ITP 405 | using Laravel</p>
  <ul class="list-group">
    @foreach($genres as $genre)
      <a class="list-group-item" href="tracks?genre={{$genre->URL}}">{{$genre->Name}}</a>
    @endforeach
  </ul>
</div>

@endsection
