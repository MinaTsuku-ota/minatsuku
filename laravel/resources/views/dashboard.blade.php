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
    <script src="/js/fav.js"></script>
    <script src="/js/performance.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <main id="main_js">
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
                <section id="profile_js">
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

            <div id="area_js">

            </div>

        </div>

        <div id="matome">
            <div id="toukou">
                <div id="soutoukou_dai">総投稿</div>
                <div id="soutoukou"><span id="post_js">{{ $articles->count() }}</span>件</div>
            </div>
            <div id="sougou">
                <div id="good">
                    <div id="sougood_dai">総グッド</div>
                    <div id="sougood"><span id="good_js">{{ $fav_count }}</span>件</div> {{-- $fav_count ... DashboardController@index --}}
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
                                @if($article->image1 === null)
                                    <img src="{{ asset('storage/avaters/'.Auth::user()->avater) }}" alt="プロフィール画像" class="no_image">
                                @else
                                    <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image">
                                @endif
                                <img src="{{ asset('storage/uploaded_images/'.$article->image2) }}" onerror="this.style.display='none'">
                                <img src="{{ asset('storage/uploaded_images/'.$article->image3) }}" onerror="this.style.display='none'">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">@guest
                                <i class="far fa-heart" data-articleid="{{ $article->id }}"></i>
                            @else {{-- ログインしている場合 --}}
                                <i class="
                                @if(App\Fav::where('article_id', $article->id)->where('user_id', Auth::User()->id)->exists())
                                {{ 'fas' }} {{-- いいね済 --}}
                                @else
                                {{ 'far' }} {{-- いいね前 --}}
                                @endif
                                fa-heart fav_btn" data-articleid="{{ $article->id }}"></i> {{-- 記事IDの送信用 --}}
                            @endguest</td>
                            <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td>
                            <td colspan="3">
                                @switch($article->genre_id)
                                    @case(1)
                                        {{--webの画像--}}
                                        <i class="fas fa-globe fa-2x"></i>
                                        @break
                                    @case(2)
                                        {{--写真の画像--}}
                                        <i class="fas fa-camera fa-2x"></i>
                                        @break
                                    @case(3)
                                        {{--動画の画像--}}
                                        <i class="fas fa-video fa-2x"></i>
                                @endswitch
                            </td>
                            <td colspan="5">
                                {{ strtr(substr($article->created_at, 5, 5), '-', '/') }}
                            </td>
                        </tr>
                        <tr class="comment_none">
                            <td colspan="10">
                                <ul>
                                    <li>
                                        <form action="#">
                                            @csrf
                                            <input type="text" class="comment_text">
                                            <input type="hidden" name="recaptcha" id="recaptcha">
                                        <input type="submit" class="comment_submit" id="{{ $article->id }}">
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