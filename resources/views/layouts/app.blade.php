<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Ourz') }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="/css/vue-material.css">
  <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script>
    window.Laravel = <?= json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
<body>
  <div id="app" v-md-theme="'default'">

    <md-toolbar>
      <md-button class="md-icon-button">
        <md-icon>menu</md-icon>
      </md-button>
      <h2 class="md-title" style="flex: 1">{{ config('app.name', 'Ourz') }}</h2>
      @if (Auth::guest())
        <md-button href="{{ url('/login') }}">ログイン</md-button>
        <md-button href="{{ url('/register') }}">新規登録</md-button>
      @else
        <md-menu>
          <md-button md-menu-trigger>{{ Auth::user()->name }}</md-button>
          <md-menu-content>
            <a href="{{ url('/user') }}"><md-menu-item>マイページ</md-menu-item></a>
            <a
              href="{{ url('/logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <md-menu-item>ログアウト</md-menu-item>
            </a>
          </md-menu-content>
        </md-menu>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      @endif
    </md-toolbar>

    @if (Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
      <div class="alert alert-success">{{ Session::get('error') }}</div>
    @endif

    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
