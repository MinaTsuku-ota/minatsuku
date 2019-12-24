<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>みなツク -MINATUKU-</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/management.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/comment.js"></script>
</head>

<body>
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="{{ route('articles.index') }}"><img src="../image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
        </div>
        <div class="header-right">
            <a href="{{ route('dashboard.index') }}">
                <div class="btn mypage ">マイページ</div>
            </a>
            {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
            <div class="btn sinki ">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>
    <main>
        <div class="header clearfix dummy">
            <div class="header-left clearfix">
                <a href="#"><img src="../image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
            </div>

            <div class="header-right">
                <div class="btn login "><a href="#">ログイン</a></div>
                <div class="btn sinki "><a href="#">新規登録</a></div>
            </div>
        </div>
        <div id="space">
            <div id="center">
                <section>
                    <div id="profil">
                        <div id="progazou" class="clearfix">
                            <img src="{{ asset('storage/avaters/'.Auth::user()->avater) }}" alt="プロフィール画像" id="parson">
                        </div>
                        <div id="puro_text">
                            <div id="nikku">{{ Auth::user()->name }}</div>
                            <div id="gakka">{{ App\Subject::find(Auth::user()->subject_id)->subject }}</div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div id="matome">
            <div id="toukou">
                <div id="soutoukou_dai">総投稿</div>
                <div id="soutoukou">4件</div>
            </div>
            <div id="sougou">
                <div id="good">
                    <div id="sougood_dai">総グッド</div>
                    <div id="sougood">?件</div>
                </div>
            </div>
        </div>

        <div id="toukouitiran">
            <h1>投稿一覧</h1>
            <div id="toukouPanel">

            
                <table class="toukou">
                    <tbody>
                        <tr>
                            <td colspan="10">オリジナルテトリス</td>
                        </tr>
                        <tr>
                            <td colspan="6" height="180px">詳細説明</td>
                            <td colspan="4" height="180px">画像</td>
                        </tr>
                        <tr>
                            <td colspan="1">いいね</td>
                            <td colspan="1" class="comment_button">コメント</td>
                            <td colspan="3">名前</td>
                            <td colspan="5">科の名前</td>
                        </tr>
                        <tr class="comment_none">
                            <td colspan="10">
                                <ul>
                                    <li>
                                        <form action="#">
                                            <input type="text">
                                        </form>
                                    </li>
                                    <li>コメント内容の予定</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </main>
    @include('footer')
</body>

</html>
