<!DOCTYPE html>
<html lang="ja">
<head>
  <title>@yield('title', 'ourz')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1">
  <meta name="format-detection" content="telephome=no">
</head>
<body>
  <header id="user-header">
    <div class="noren noren-outermost noren-g-oneline noren-g-middle">
      <h1><a href="{{ route('home.index') }}">ourz</a></h1>
    </div>
  </header>
  <div id="main">
    @yield('content')
  </div>
  <footer>

  </footer>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>
