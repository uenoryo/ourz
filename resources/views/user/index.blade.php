@extends('layouts.app')

@section('content')
<div class="noren noren-outermost">
  <div class="block g-1">
    <md-whiteframe md-elevation="2">
      <md-toolbar class="md-dense">
        <h2 class="md-title">{{ Auth::user()->name }}のページ</h2>
      </md-toolbar>
      <div>
        <md-button href="{{ url('/team/create') }}" class="md-raised md-primary">新しいチームを作成する</md-button>
      </div>
    </md-whiteframe>
  </div>
  <div class="block g-1">
    <md-whiteframe md-elevation="2">
      <md-toolbar class="md-dense">
        <h2 class="md-title">{{ Auth::user()->name }}のチーム</h2>
      </md-toolbar>
      <md-list>
        @forelse($teams as $team)
          <md-list-item>
            <a href="{{ route('team', $team->name) }}">{{ $team->display }}</a>
          </md-list-item>
        @empty
          <md-list-item>
            <p>チームはまだありません</p>
          </md-list-item>
        @endforelse
      </md-list>
    </md-whiteframe>
  </div>
</div>
@endsection
