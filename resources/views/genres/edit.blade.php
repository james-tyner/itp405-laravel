@extends('layout')

@section('title')
  Edit Genre
@endsection

@section('main')

  <div class="col mt-5 mb-5 mx-auto" style=
  "max-width:60vw;">
    <div class="row">
      <form action="/genres" method="post">
        @csrf
        <div class="form-row">
          <h2>Edit genre</h2>
        </div>
        <div class="form-group">
          <input type="hidden" id="id" name="id" value="{{$info->GenreId}}">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name') ? old('name') : $info->Name}}" required>
          <small class="form-text text-danger">{{$errors->first('name')}}</small>
        </div>
        <div class="form-row btn-group" role="group">
          <button type="submit" class="btn btn-primary">Save</button>
          <a class="btn btn-outline-secondary" href="/genres" role="button">Cancel</a>
        </div>
      </form>
    </div>
  </div>

@endsection
