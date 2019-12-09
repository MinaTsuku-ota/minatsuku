<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>みなツク -MINATUKU-</title>
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/login.css">
  <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>

<header class="header clearfix">
    <div class="header-left clearfix">
        <a href="{{ route('articles.index') }}"><img src="/image/home_daimei.png" class="sinki_daimei" alt="みなツク"></a>
    </div>
</header>

<main>
    <div class="header clearfix dummy">
        <div class="header-left clearfix">
            <a href="#"><img src="/image/home_daimei.png" class="sinki_daimei" alt="みなツク"></a>
        </div>
    </div>

    <section>
        <div id="back">
            <a href="{{ route('articles.index') }}"><i class="backbutton fas fa-arrow-circle-left fa-3x"></i></a>
        </div>
        <div id="login_syoudai">
            <h1 class="login_daimei">ログイン</h1>
        </div>

        <form class="clearfix" method="POST" action="{{ route('login') }}">
            @csrf
            <dl>
                <dt>
                    <label for="name"><div class="daimei">ニックネーム</div></label>
                </dt>
                <dd><input type="text" name="name" id="name" class="nyuuryoku" required value="{{ old('name') }}" autocomplete="name" autofocus></dd>
                <dt>
                    <label for="password"><div class="daimei">パスワード</div></label>
                </dt>
                <dd><input type="password" name="password" id="password" class="nyuuryoku" required></dd>
            </dl>
            <div class="login">
                <p class="button"><input type="submit" value="ログイン" id="loginsuru"></p>
            </div>
        </form>
    </section>
</main>

<footer>
    <ul>
        <li><a href="#"><i class="fas fa-home">ホーム</i></a></li>
        <li><a href="#"><i class="far fa-envelope">ご意見・ご要望</i></a></li>
        <li><a href="#"><i class="fas fa-exclamation-triangle">注記</i></a></li>
        <li><a href="#"><i class="fab fa-creative-commons-by">クレジット</i></a></li>
    </ul>
</footer>

</body>
</html>
