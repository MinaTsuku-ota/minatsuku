@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/sinki.css">
@endsection

@section('content')
      <section>
        <div id="sinki_syoudai">
          <img src="/image/sinki_syoudai.png" alt="はじめの一歩" class="syoudai">
        </div>
        <form class="clearfix" method="POST" action="{{ route('register') }}">
          @csrf
          <dl>
            <dt><label for="name">ニックネーム</label></dt>
            <dd><input type="text" name="name" id="name" class="nyuuryoku" value="{{ old('name') }}" required autocomplete="name" autofocus></dd>
            <dt><label for="password">パスワード</label></dt>
            <dd><input type="password" name="password" id="password" class="nyuuryoku" required></dd>

            <dt><label for="password-confirm">パスワード(確認)</label></dt>
            <dd><input type="password" name="password_confirmation" id="password-confirm" class="nyuuryoku" required></dd>

            <dt><label for="subject">科名</dt>
            <dd>
                {{Form::select('subject', [
                    '1' => '自動車整備科',
                    '2' => '電気システム科',
                    '3' => 'メディアアート科',
                    '4' => '情報システム科',
                    '5' => 'オフィスビジネス科',
                    '6' => '総合実務科'])}}
            </dd>
          </dl>
          <div class="touroku">
            <p class="button"><input type="submit" value="登録する"></p>
          </div>
          <a href="#"><img src="/image/tyuuki0.png" alt="注記" class="tyuuki0"></a>
        </form>
      </section>
@endsection
