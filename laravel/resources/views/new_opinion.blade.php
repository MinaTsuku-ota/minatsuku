<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/request.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    {{-- @include('recaptcha_js') --}}
</head>

<body>
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="#"><img src="/image/touroku_daimei.png" class="sinki_daimei" alt="新規登録"></a>
        </div>
    </header>

    <main>
        <div class="header clearfix dummy">
            <div class="header-left clearfix">
                <a href="#"><img src="/image/touroku_daimei.png" class="sinki_daimei" alt="新規登録"></a>
            </div>
        </div>
        <section>
            <div id="back">
                <a href="#"><i class="backbutton fas fa-arrow-circle-left fa-3x"></i></a>
            </div>
        </section>
    </main>

@include('footer')
</body>
</html>
