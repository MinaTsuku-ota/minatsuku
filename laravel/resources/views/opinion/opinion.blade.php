<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/request.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    @include('recaptcha_js')
</head>

<body>
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="{{ route('articles.index') }}">
                <img src="/image/home_daimei.png" class="home_daimei" alt="みなツク">
            </a>
        </div>
        <div class="header-right">
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
        </div>
    </header>

    <main>
        <div class="header clearfix dummy">
            <div class="header-left clearfix">
                <a href="#"><img src="/image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
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
            <div id="request_syoudai">
                <h1 class="request_daimei">ご意見・ご感想</h1>
            </div>
            <div>
                <div id="setumei">
                    頂戴いたしましたご意見については今後のサイト運営の参考にさせていただきます。
                </div>
            </div>
            <form method="POST" action="{{ route('opinion') }}">
                @csrf
                <div id="request"><textarea name="body" required></textarea></div>
                <div class="sousin">
                    <p class="button"><input type="submit" value="送信" id="sousinnsuru"></p>
                </div>
                <input type="hidden" name="recaptcha" id="recaptcha">
            </form>
        </section>
    </main>
    @include('footer')
</body>

</html>
