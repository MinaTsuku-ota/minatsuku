<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/policy.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="{{ route('articles.index') }}">
                <img src="/image/home_daimei.png" class="home_daimei" alt="みなツク">
            </a>
        </div>
        <div class="header-right">
            {{--ログインしていない時のメニュー --}}
            @guest
            <a href="{{ route('login') }}">
                <div class="btn login ">ログイン</div>
            </a>
            <a href="{{ route('register') }}">
                <div class="btn sinki ">新規登録</div>
            </a>
            {{-- ログインしている時のメニュー --}}
            @else
            <a href="{{ route('dashboard.index') }}">
                <div class="btn mypage ">マイページ</div>
            </a>
            {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
            <div class="btn sinki ">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </div>
    </header>
    <main>
        <div class="header clearfix dummy">
            <div class="header-left clearfix">
                <a href="#"><img src="../image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
            </div>

            <div class="header-right">
                <div class="btn login "><a href="#">ログイン</a></div>
                <div class="btn sinki "><a href="#">新規登録</a></div>
            </div>
        </div>
        <section>
            <div id="back">
                <a href="{{ route('articles.index') }}">
                    <i class="backbutton fas fa-arrow-circle-left fa-3x"></i>
                </a>
            </div>
            <div id="daimei">
                <h1>利用規約</h1>
                <p>当サイトを閲覧・ご利用においては、<br>
                    下記の内容を十分にお読みください。</p>
            </div>
            <div id="policy">
                <iframe src="{{ route('policy_iframe') }}"></iframe>
            </div>
        </section>
    </main>
    @include('footer')
</div>
</body>

</html>
