<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>みなツク</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/new_common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    @yield('addcss')

    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">

    @yield('addjs')

</head>

<body>

<div id="wrap">
    <!-- header -->
    @include('header')

    <main>
        <!-- header dummy-->
        @include('header_dummy')

        {{-- フラッシュメッセージの表示 --}}
        {{-- セッションに"message"をキーに持つ情報があれば表示 --}}
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

@if (session('message'))
<script>alert({{ session('message') }});</script>
@endif

{{-- 編集権限が無い場合にアラート --}}
{{-- 何かしら文字が入っていないとfalseになるので注意。valueを使わないとしてもkeyだけではだめ --}}
@if(session('no_edit_permission'))
    <script>alert('編集権限がないよ!');</script>
@endif

</body>
</html>
