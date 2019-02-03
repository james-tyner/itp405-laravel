@extends('layout')

@section('title', 'Genres')

@section('main')

<div class="jumbotron mb-0">
  <h1 class="display-4">Genres</h1>
  <ul class="list-group">
    @foreach($genres as $genre)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="tracks?genre={{$genre->URL}}">{{$genre->Name}}</a>
        <a href="genres/{{$genre->GenreId}}/edit" class="btn-sm btn-secondary" role="button">Edit</a>
      </li>
    @endforeach
  </ul>
</div>

@endsection
