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
    <script src="/js/dropdown.js"></script>
</head>

<body>
<div id="wrapper">
    <header class="header clearfix">
        <div class="header-left clearfix">
            <a href="{{ route('articles.index') }}"><img src="../image/home_daimei.png" class="home_daimei"
                    alt="みなツク"></a>
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
                <div id="soutoukou">{{ $articles->count() }}件</div>
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

                @foreach($articles as $article)
                <table class="toukou">
                    <tbody>
                        <tr>
                            <td colspan="9">
                                <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                            </td>
                            <td class="menuButton">
                                <i class="fas fa-cog"></i>
                                <div class="menuInfo">
                                    <ul>
                                        <li><a href="{{ route('articles.edit', [$article->id]) }}">編集</a></li>
                                        <li>{!! Form::open(['method' => 'DELETE', 'url' => ['articles', $article->id]]) !!}
                                {!! Form::submit('削除') !!}
                                {!! Form::close() !!}</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" height="180px">{{ $article->body }}</td>
                            <td colspan="4" height="180px">
                                <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><i class="far fa-thumbs-up"></i></td>
                            <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td>
                            <td colspan="3">{{ App\User::find($article->user_id)->name }}</td>
                            <td colspan="5">
                                {{ App\Subject::find( App\User::find($article->user_id)->subject_id )->subject }}
                            </td>
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
                @endforeach

            </div>
        </div>
    </main>
    @include('footer')
</div>
</body>

</html>