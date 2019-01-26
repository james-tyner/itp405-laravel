@extends('layout')

@section('title')
  @if (!$noResults)
    {{$search}} Tracks
  @else
    Tracks
  @endif
@endsection

@section('main')

    <nav class="navbar sticky-top navbar-dark bg-dark">
      <div class="navbar-brand">
        @if (!$noResults)
          {{$search}}
        @endif Tracks
      </div>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Return to Genre List</a>
        </li>
      </ul>
      <div class="navbar-text">James Tyner | ITP 405</div>
    </nav>

    @if($noResults)
      <div class="alert alert-warning" role="alert">No matching tracks found. Showing all tracks.</div>
    @endif

    <table class="table">
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

@endsection
