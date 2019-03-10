@extends('layout')

@section('title')
  Docs
@endsection

@section('externalCSS')
  <link href="{{URL::asset('css/docs.css')}}" rel="stylesheet">
@endsection

@section('main')

  <div class="container col-9 mt-5">
    <h1 class="heading-2">Collaborative Editing</h1>
    <div id="doc-textbox" class="mt-3" contenteditable="true"></div>
  </div>

  <script src="{{URL::asset('js/docs-lab.js')}}"></script>

@endsection