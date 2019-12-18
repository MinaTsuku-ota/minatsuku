<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('addcss')

    <!-- BootstrapのCSS読み込み -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    @include('recaptcha_js')
</head>
<body>
    {{-- ナビゲーションバーの Partial を使用 --}}
    @include('navbar')

    {{-- 上下左右余白 --}}
    <div class="container py-4">
        {{-- フラッシュメッセージの表示 --}}
        {{-- セッションに ‘message’ をキーに持つ情報があれば、表示するように修正 --}}
        {{-- class="alert alert-success"というのは Bootstrap の CSSで、この class を指定すると、正常時のアラートとして div を緑に装飾して表示してくれます --}}
        {{-- @if (Session::has('flash_message'))でも良い --}}
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{-- コンテンツの表示 --}}
        @yield('content')
    </div>

    @yield('addscript')
</body>
</html>
