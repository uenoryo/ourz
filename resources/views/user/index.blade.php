@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <div class="panel panel-default">
        <div class="panel-heading">{{ Auth::user()->name }}のページ</div>
        <div class="panel-body">
          <a class="btn btn-primary" href="{{ url('/team/create') }}">
            Create new Team
          </a>
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
              <td>{{ $team->name }}</td>
              <td>{{ $team->display }}</td>
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
