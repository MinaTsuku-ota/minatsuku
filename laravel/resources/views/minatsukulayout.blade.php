<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>みなツク -MINATUKU-</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- BootstrapのCSS読み込み --}}
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="/js/app.js"></script>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/new_common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    @yield('addcss')

    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.js"></script>
</head>
<body>
<div id="wrap">
    <!-- header -->
    @include('header')

    <!-- header dummy-->
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

        {{-- フラッシュメッセージの表示 --}}
        {{-- セッションに"message"をキーに持つ情報があれば、表示するように修正 --}}
        {{-- class="alert alert-success"というのは Bootstrap の CSSで、この class を指定すると、正常時のアラートとして div を緑に装飾して表示してくれます --}}
        {{-- @if (Session::has('flash_message'))でも良い --}}
        {{-- @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif --}}

        <!-- content -->
        @yield('content')
    </main>

    <!-- footer -->
    @include('footer')
</div>
</body>
</html>
