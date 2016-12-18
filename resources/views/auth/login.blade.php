@extends('layouts.app')

@section('content')
  <div class="noren noren-outermost">
    <div class="g-1">
      <div class="panel panel-default">
        <div class="panel-heading">ログイン</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <md-input-container class="{{ $errors->has('email') ? 'md-input-invalid' : '' }}">
              <label>メールアドレス</label>
              <md-input type="email" name="email" value="{{ old('email') }}" required autocomplete></md-input>
              @if ($errors->has('email'))
                <span class="md-error">{{ $errors->first('email') }}</span>
              @endif
            </md-input-container>
            <md-input-container class="{{ $errors->has('password') ? 'md-input-invalid' : '' }}">
              <label>パスワード</label>
              <md-input type="password" name="password" required autocomplete></md-input>
              @if ($errors->has('password'))
                <span class="md-error">{{ $errors->first('password') }}</span>
              @endif
            </md-input-container>
            <md-button type="submit" class="md-raised md-primary">ログイン</md-button>
            <md-button href="{{ url('/password/reset') }}" class="md-accent">パスワードを忘れましたか？</md-button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
