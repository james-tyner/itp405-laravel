@extends('layout')

@section('title')
  Docs
@endsection

@section('nav')
  {{--overwriting to leave this section empty --}}
@endsection

@section('externalCSS')
  <link href="../css/docs.css" rel="stylesheet">
@endsection

@section('main')

  <div class="container col-9 mt-5">
    <h1 class="heading-2">Collaborative Editing</h1>
    <div id="status" class="text-primary mt-0"></div>
    <div id="doc-textbox" class="border-top mt-3 pt-3" contenteditable="true"></div>
  </div>

  <script src="../js/docs-lab.js"></script>

@endsection
