@extends('layout')

@section('title')
  Create Track
@endsection

@section('main')
  
  <div class="col mt-5 mb-5 mx-auto" style=
  "max-width:60vw;">
    <div class="row">
      <form action="/tracks" method="post">
        @csrf
        <div class="form-row">
          <h2>Create a new track</h2>
        </div>
        <div class="form-group">
          <label for="name">Track name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" required>
          <small class="form-text text-danger">{{$errors->first('name')}}</small>
        </div>
        <div class="form-group">
          <label for="album">Album</label>
          <select required class="form-control" name="album" id="album">
            <option value="">Choose…</option>
            @foreach($albums as $album)
              <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('album') ? "selected" : ""}}>{{$album->Title}}</option>
            @endforeach
          </select>
          <small class="form-text text-danger">{{$errors->first('album')}}</small>
        </div>
        <div class="form-group">
          <label for="type">Format</label>
          <select required class="form-control" name="type" id="type">
            <option value="">Choose…</option>
            @foreach($types as $type)
              <option value="{{$type->MediaTypeId}}" {{$type->MediaTypeId == old('type') ? "selected" : ""}}>{{$type->Name}}</option>
            @endforeach
          </select>
          <small class="form-text text-danger">{{$errors->first('type')}}</small>
        </div>
        <div class="form-group">
          <label for="genre">Genre</label>
          <select required class="form-control" name="genre" id="genre">
            <option value="">Choose…</option>
            @foreach($genres as $genre)
              <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genre') ? "selected" : ""}}>{{$genre->Name}}</option>
            @endforeach
          </select>
          <small class="form-text text-danger">{{$errors->first('genre')}}</small>
        </div>
        <div class="form-group">
          <label for="composer">Composer</label>
          <input name="composer" id="composer" type="text" class="form-control" value="{{old('composer')}}" required>
          <small class="form-text text-danger">{{$errors->first('composer')}}</small>
        </div>
        <div class="form-row">
          <div class="form-group col-4">
            <label for="milliseconds">Length</label>
            <div class="input-group">
              <input name="milliseconds" id="milliseconds" type="number" class="form-control" value="{{old('milliseconds')}}" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  ms
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-4">
            <label for="bytes">File size</label>
            <div class="input-group">
              <input name="bytes" id="bytes" type="number" class="form-control" value="{{old('bytes')}}" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  bytes
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-4">
            <label for="price">Price</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">$</div>
              </div>
              <input name="price" id="price" type="number" step="0.01" class="form-control" value="{{old('price')}}" required>
            </div>
          </div>
          <small class="form-text text-danger mr-2">{{$errors->first('milliseconds')}}</small>
          <small class="form-text text-danger mr-2">{{$errors->first('bytes')}}</small>
          <small class="form-text text-danger mr-2">{{$errors->first('price')}}</small>
        </div>
        <div class="form-row mt-2">
          <button type="submit" class="btn btn-primary">Save track</button>
        </div>
      </form>
    </div>
  </div>

@endsection
