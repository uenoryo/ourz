@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">最近更新されたドキュメント</div>
        <div class="panel-body">
          <create-document team-id="{{ $team->id }}"></create-document>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">{{ $team->display }}</div>
        <div class="panel-body">
          <team-members team-id="{{ $team->id }}"></team-members>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
