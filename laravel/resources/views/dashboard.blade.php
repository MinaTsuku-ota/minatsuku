{{-- @extends('layouts.app') --}}
{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('addjs')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.captcha_sitekey') }}"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('{{ config('app.captcha_sitekey') }}', { action: 'localhost' }).then(function (token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
@endsection

@section('content')
<h1>Dashboard</h1>
<hr />

{{-- @if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif --}}

@if(isset($status))
@if($status == true)
<div class="notification is-success" style="width:300px; margin:auto 100px auto 100px;">
    <button class="delete"></button>
    送信に成功しました。<br />
    あなたのSCORE：<strong>{{ $score }}</strong><br />
    (robot)0.0 ~ 1.0(human)
</div>
@endif
@if($status == false)
<div class="notification is-warning" style="width:300px; margin:auto 100px auto 100px;">
    <button class="delete"></button>
    送信に失敗しました。<br />
    あなたのSCORE：<strong>{{ $score }}</strong>
    (robot)0.0 --- 1.0(human)
</div>
@endif
@endif

<p>You are logged in!</p>
<h2>ようこそ、{{ Auth::user()->name }}さん！</h2>
<h3>あなたの学科は：{{ App\Subject::find(Auth::user()->subject_id)->subject }}</h3>

<hr />

{{-- コントローラ(DashboardController@index)から送られてくる$articlesを扱う --}}
@foreach($articles as $article)
<div>
    @if(isset($article->image1))
    {{-- asset()はlaravel/publicディレクトリへのパスを返す --}}
    {{-- "$image"はimagesテーブルの1レコード分のデータ --}}
    {{-- "$image->image"はimagesテーブルのimageカラムの内容(画像ファイル名が格納されている) --}}
    <img src="{{ asset('storage/'.$article->image1) }}" style="width: 10%; height: auto;" />
    @endif
    @if(isset($article->image2))
    <img src="{{ asset('storage/'.$article->image2) }}" style="width: 10%; height: auto;" />
    @endif
    @if(isset($article->image3))
    <img src="{{ asset('storage/'.$article->image3) }}" style="width: 10%; height: auto;" />
    @endif
</div>
@endforeach

<hr />

<p>遊び</p>
<div>
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/tbvxFW4UJdU" frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<form method="POST" action="{{ route('dashboard.post') }}">
    @csrf
    <div class="field">
        <div class="control">
            <input type="text" name="text" class="input" placeholder="message" required style="width:500px;">
        </div>
    </div>
    <div class="filed">
        <div class="control">
            <button type="submit" class="button is-link">送信</button>
        </div>
    </div>
    <input type="hidden" name="recaptcha" id="recaptcha">
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>

@endsection
