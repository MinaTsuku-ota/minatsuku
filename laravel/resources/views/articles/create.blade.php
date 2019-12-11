<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>みなツク</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/toukou.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/D&D.js"></script>
</head>
<body>
    <div id="wrap">
        <header class="header clearfix">
            <div class="header-left clearfix">
                <a href="{{ route('articles.index')}}"><img src="/image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
            </div>
            <div class="header-right">
                <div class="btn login "><a href="route{{ route('login') }}">ログイン</a></div>
                <div class="btn sinki "><a href="route{{ route('register') }}">新規登録</a></div>
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
                        <div class="STimg"><img src="/image/toukou_daimei.png" alt="新規投稿"></div>

                        {{-- 投稿フォーム --}}
                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="toukou">
                                <tr>
                                    <td>ジャンル?</td>
                                    <td style="border-style:none;">
                                        <select size="1" class="genre" name="genre_id">
                                            <option value="1">WEB</option>
                                            <option value="2">写真</option>
                                            <option value="3">動画</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" height="30px">
                                        <input type="text1" name="title" size="50" maxlength="20" placeholder="題名入力" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" height="250px" id="input_td">
                                        {{-- <textarea placeholder="+" class="imageText" name="image1"></textarea>
                                        <textarea placeholder="+" class="imageText" name="image2"></textarea>
                                        <textarea placeholder="+" class="imageText" name="image3"></textarea> --}}
                                        <span class="input_span">
                                            <div class="imageText">Click or Drop here</div>
                                            <input type="file" class="imageInput" name="image1">
                                        </span>
                                        <span class="input_span">
                                            <div class="imageText">Click or Drop here</div>
                                            <input type="file" class="imageInput" name="image2">
                                        </span>
                                        <span class="input_span">
                                            <div class="imageText">Click or Drop here</div>
                                            <input type="file" class="imageInput" name="image3">
                                        </span>
                                        
                                        {{-- <p style="color:red;">一旦上か下使う</p>

                                        <div>
                                            <label for="image1">画像1:</label>
                                            <input name="image1" type="file">
                                        </div>
                                        <div>
                                            <label for="image2">画像2:</label>
                                            <input name="image2" type="file">
                                        </div>
                                        <div>
                                            <label for="image3">画像3:</label>
                                            <input name="image3" type="file">
                                        </div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" height="250px">
                                        <textarea placeholder="作品の説明を記入してください。" class="setumeiText" required name="body"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div class="STbtn">
                                {{-- <a href="#" class="STbtnChild">投稿</a> --}}
                                {{-- 一旦inputタグにする --}}
                                <input type="submit" class="STbtnChild" value="投稿">
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </main>
    @include('footer')
</body>
</html>
