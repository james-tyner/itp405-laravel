@extends('layout')

@section('title')
  @if (!$noResults)
    {{$search}} Tracks
  @else
    Tracks
  @endif
@endsection

@section('buttons')
  <a class="btn btn-primary" href="/tracks/new" role="button">Add Track</a>
@endsection

@section('main')

  <div class="jumbotron mb-0">
    <h1 class="display-4">Tracks</h1>
    @if (!$noResults && $search)
      <h4 class="display-5">Showing results for “{{$search}}”</h4>
    @endif

    @if($noResults)
      <div class="alert alert-warning" role="alert">No matching tracks found. Showing all tracks.</div>
    @endif

    <table class="table" style="background-color:white;">
      <tr>
        <th>Track</th>
        <th>Album</th>
        <th>Artist</th>
        <th>Price</th>
      </tr>
      @foreach ($tracks as $track)
        <tr>
          <td>{{$track->trackName}}</td>
          <td>{{$track->albumName}}</td>
          <td>{{$track->artistName}}</td>
          <td>${{$track->UnitPrice}}</td>
        </tr>
      @endforeach
    </table>
  </div>

@endsection
