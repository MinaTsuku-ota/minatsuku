@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('contents')
      <section>
        <div id="back">
            <a href="#"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
        </div>
        <div id="login_syoudai">
          <h1 class="login_daimei">ログイン</h1>
        </div>
        <form class="clearfix" >
          <dl>
            <dt class="daimei"><label for="name">ニックネーム</label></dt>
            <dd><input type="text" name="name" id="name" class="nyuuryoku" required></dd>
            <dt class="daimei"><label for="password">パスワード</label></dt>
            <dd><input type="password" name="password" id="password" class="nyuuryoku" required></dd>
            
          </dl>
          <div class="login">
            <p class="button"><input type="submit" value="ログイン" id="loginsuru"></p>
          </div>
          
          
        </form>
      </section>
@endsection