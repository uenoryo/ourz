@extends('layouts.app')

@section('content')
<div class="noren noren-outermost">
  <div class="g-1">
    <md-whiteframe md-elevation="2">
      <md-toolbar class="md-dense">
        <h2 class="md-title">{{ Auth::user()->name }}のページ</h2>
      </md-toolbar>
      <div>
        <md-button href="{{ url('/team/create') }}" class="md-raised md-primary">新しいチームを作成する</md-button>
      </div>
    </md-whiteframe>
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
@endsection
