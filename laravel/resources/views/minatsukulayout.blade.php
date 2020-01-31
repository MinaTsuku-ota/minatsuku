<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8"> @yield('title') <title>みなツク</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/normalize.css">
    {{-- 追加CSS --}}
    @yield('addcss')
    {{-- 追加javascript --}}
    @yield('addjs')
</head>
<body>

    @yield('loading')

    <div id="wrap">
        {{-- header --}}
        @include('header')
        <main>
            @include('header_dummy')
            <!-- content -->
            @yield('content')
        </main>
    </div>
    {{-- footer --}}
    @include('footer')
        {{-- アラート条件 1ログインしているが編集権限が無い 2記事を削除した 3記事を追加した --}}
    @if (session('message'))
    <script>
        alert("{{ session('message') }}");
    </script>
    @endif
</body>
</html>
