@extends('layout')

@section('title', 'Home')

@section('nav')
  {{--overwriting to leave this section empty --}}
@endsection

@section('main')

<div class="jumbotron mb-0" style="height:100vh;">
  <h1 class="display-2">Music</h1>
  <p>James Tyner | ITP 405 | using Laravel</p>
  <ul class="list-group">
      <a class="list-group-item" href="/genres">Genres</a>
      <a class="list-group-item" href="/tracks">Tracks</a>
  </ul>
</div>

@endsection
