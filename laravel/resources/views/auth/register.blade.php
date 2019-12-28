<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/create.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/modal.js"></script>
    @include('recaptcha_js')
</head>

<body>

    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="{{ route('articles.index') }}"><img src="/image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
        </div>

        <div class="header-right">
            <a href="{{ route('login') }}"><div class="btn login ">ログイン</div></a>
            <a href="{{ route('register') }}"><div class="btn sinki ">新規登録</div></a>
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

        {{-- エラーの表示を追加 --}}
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            <script>
                alert('{{ $error }}');
            </script>
            @endforeach
        </div>
        @endif

        <section>
            <div id="back">
                {{-- 戻るボタン --}}
                <a href="{{ route('articles.index') }}"><i class="backbutton fas fa-arrow-circle-left fa-3x"></i></a>
            </div>
            <div id="sinki_syoudai">
                <h1>はじめの一歩</h1>
            </div>

            <form class="clearfix" method="POST" action="{{ route('register') }}">
                @csrf
                <dl>
                    <dt>
                        <label for="name">
                            <div class="daimei">ニックネーム</div>
                        </label>
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" class="nyuuryoku" required value="{{ old('name') }}"
                            autofocus>
                    </dd>
                    <dt>
                        <label for="password">
                            <div class="daimei">パスワード</div>
                        </label>
                    </dt>
                    <dd>
                        <input type="password" name="password" id="password" class="nyuuryoku" required>
                    </dd>
                    <dd class="kome">※パスワードは8文字以上</dd>
                    <dt class="daimei"><label for="password_confirmation">パスワード(確認)</label></dt>
                    <dd>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="nyuuryoku" required>
                    </dd>
                    <dt>
                        <div class="daimei">科名</div>
                    </dt>
                    <dd>
                        {{Form::select('subject', [
							'1' => '自動車整備科',
							'2' => '電気システム科',
							'3' => 'メディアアート科',
							'4' => '情報システム科',
							'5' => 'オフィスビジネス科',
							'6' => '総合実務科'])}}
                    </dd>
                </dl>

                <div class="touroku">
                    <p class="button"><input type="submit" value="登録する" id="tourokusuru"></p>
                </div>

                <div class="tyuukikakko">
                    <span href="#" id="js-modal-open" data-target="modal01">
                        <img src="/image/tyuuki0.png" onmouseover="this.src='/image/tyuuki1.png'" onmouseout="this.src='/image/tyuuki0.png'" class="tyuuki" alt="注記">
                    </span>
                </div>
                <input type="hidden" name="recaptcha" id="recaptcha">
            </form>
        </section>
    </main>

    <div id="modal01" class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <div id="daimei">
                <h1>利用規約</h1>
                <p>当サイトを閲覧・ご利用においては、<br> 下記の内容を十分にお読みください。
                </p>
            </div>
            <div id="policy">
            <iframe src="{{ route('policy_iframe') }}"></iframe>
            </div>
            <button href="#" id="js-modal-close">閉じる</button>
        </div>
    </div>

    @include('footer')
</body>

</html>
