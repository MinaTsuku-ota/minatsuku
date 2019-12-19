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
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="#"><img src="/image/home_daimei.png" class="policy_daimei" alt="注記"></a>
        </div>
    </header>
    <main>
        <div class="header clearfix dummy">
            <div class="header-left clearfix">
                <a href="#"><img src="../image/home_daimei.png" class="policy_daimei" alt="注記"></a>
            </div>
        </div>
        <section>
            <div id="back">
                <a href="{{ route('articles.index') }}"><i class="backbutton fas fa-arrow-circle-left fa-3x"></i></a>
            </div>
            <div id="daimei">
                <h1>利用規約</h1>
                <p>当サイトを閲覧・ご利用においては、<br>
                    下記の内容を十分にお読みください。</p>
            </div>
            <div id="policy">
                <iframe src="{{ URL::to('/') }}/policy_iframe" sandbox></iframe>
            </div>
        </section>
    </main>
    @include('footer')
</body>

</html>
