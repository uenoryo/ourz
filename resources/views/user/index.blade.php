@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <div class="panel panel-default">
        <div class="panel-heading">{{ Auth::user()->name }}のページ</div>
        <div class="panel-body">
          <md-button href="{{ url('/team/create') }}" class="md-raised md-primary">新しいチームを作成する</md-button>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">{{ Auth::user()->name }}のチーム</div>
        <div class="panel-body">
          <table>
            <tr>
              <th>チームID</th>
              <th>チーム名</th>
            </tr>
            @forelse($teams as $team)
            <tr>
              <td><a href="{{ route('team', $team->name) }}">{{ $team->name }}</a></td>
              <td><a href="{{ route('team', $team->name) }}">{{ $team->display }}</a></td>
            </tr>
            @empty
              <tr><td>チームはありません</td></tr>
            @endforelse
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
