<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    @include('recaptcha_js')
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
            <a href="{{ route('login') }}">
                <div class="btn login ">ログイン</div>
            </a>
            <a href="{{ route('register') }}">
                <div class="btn sinki ">新規登録</div>
            </a>
        </div>
    </header>

    <main>
        @include('header_dummy')
        <section>
            <div id="back">
                <a href="{{ route('articles.index') }}">
                    <i class="backbutton fas fa-arrow-circle-left fa-3x"></i>
                </a>
            </div>
            <div id="login_syoudai">
                <h1 class="login_daimei">ログイン</h1>
            </div>

            <!-- ログインフォーム -->
            <form class="clearfix" method="POST" action="{{ route('login') }}">
                @csrf
                <dl>
                    <dt>
                        <label for="name">
                            <div class="daimei">ニックネーム</div>
                        </label>
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" class="nyuuryoku" required value="{{ old('name') }}"
                            autocomplete="name" autofocus>
                    </dd>
                    {{-- バリデーション関連(https://readouble.com/laravel/6.x/ja/validation.html) --}}
                    @error('name')
                    <script>
                        alert('{{ $message }}');
                    </script>
                    @enderror
                    <dt>
                        <label for="password">
                            <div class="daimei">パスワード</div>
                        </label>
                    </dt>
                    <dd>
                        <input type="password" name="password" id="password" class="nyuuryoku"
                            autocomplete="current-password" required>
                    </dd>
                    @error('password')
                    <script>
                        alert('{{ $message }}');
                    </script>
                    @enderror
                </dl>
                <div class="login-bo">
                    <p class="button"><input type="submit" value="ログイン" id="loginsuru"></p>
                </div>
                <!-- <input type="hidden" name="recaptcha" id="recaptcha"> -->
            </form>
        </section>
    </main>

    @include('footer')
</div>
</body>

</html>
