<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>みなツク</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/D&D.js"></script>

    @include('recaptcha_js')
</head>

<body>
    <div id="wrap">
        <header class="header clearfix">
            <div class="header-left clearfix">
                <a href="{{ route('articles.index')}}">
                    <img src="/image/home_daimei.png" class="home_daimei" alt="みなツク">
                </a>
            </div>
            <div class="header-right">
                <div class="btn login ">
                    <a href="{{ route('dashboard.index') }}">マイページ</a>
                </div>
                {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
                <div class="btn sinki ">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
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

            <div id="contens">
                <section class="homeContent clearfix">
                    <div class="toukouPanel">
                        <div id="post_syoudai">
                            <h1 class="post_daimei">新規投稿</h1>
                        </div>

                        <!-- 投稿フォーム -->
                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="ookisa">
                                <table class="toukou">
                                    <tr>
                                        <td>ジャンル?</td>
                                        <td style="border-style:none;">
                                            <select size="1" class="genre">
                                                <option value="1">WEB</option>
                                                <option value="2">写真</option>
                                                <option value="3">動画</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="30px">
                                            <input type="text1" name="title" size="50" maxlength="20" placeholder="題名入力"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="300px" id="input_td">
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" name="file0">
                                            </span>
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" name="file1">
                                            </span>
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" name="file2">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="350px">
                                            <textarea placeholder="作品の説明を記入してください。" class="setumeiText" name="body"
                                                required></textarea>
                                        </td>
                                    </tr>
                                </table>

                                <div class="STbtn">
                                    <button type="submit" class="STbtnChild">投稿</button>
                                </div>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
    @include('footer')
    </div>
</body>

</html>
