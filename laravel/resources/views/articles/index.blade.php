@extends('minatsukulayout')

@section('addcss')
    <link rel="stylesheet" href="/css/new_common.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/fav.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('addjs')
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/comment.js"></script>
    <script src="/js/loading.js"></script>
    <script src="js/tagSwitch.js"></script>
    <script src="js/tagSwitchGet.js"></script>
    <script src="js/fav.js"></script>
    @include('recaptcha_js')
@endsection

@section('content')
<div id="contens">
    <section class="navBox">
        <form id="radio">
            <input type="radio" name="tabs" id="tab01" class="menu01 article-tab" value="1" checked>
            <label for="tab01" class="label01 janru"><i class="fas fa-home fa-2x"></i></label>
            <input type="radio" name="tabs" id="tab02" class="menu02 article-tab" value="2">
            <label for="tab02" class="label02 janru"><i class="fas fa-globe fa-2x"></i></label>
            <input type="radio" name="tabs" id="tab03" class="menu03 article-tab" value="3">
            <label for="tab03" class="label03 janru"><i class="fas fa-camera fa-2x"></i></label>
            <input type="radio" name="tabs" id="tab04" class="menu04 article-tab" value="4">
            <label for="tab04" class="label04 janru"><i class="fas fa-video fa-2x"></i></label>
        </form>
        <section class="homeContent clearfix">

            {{-- HOME --}}
            <div class="toukouPanel article-panel">
                <p>投稿</p>
                @foreach($articles as $article) {{-- 記事一覧 --}}
                <table class="toukou">
                    <tr>
                        <td colspan="10"> {{-- 記事タイトル --}}
                            <a href="{{ url('articles', $article->id) }}" id="{{ $article->id }}">{{ $article->title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">{{ $article->body }}</td> {{-- 記事本文 --}}
                        <td colspan="4">
                            @if($article->image1 === null)
                                <img src="storage/avaters/default_avater.png" alt="プロフィール画像" class="no_image">
                            @else
                                <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image">
                            @endif
                            <img src="{{ asset('storage/uploaded_images/'.$article->image2) }}" onerror="this.style.display='none'">
                            <img src="{{ asset('storage/uploaded_images/'.$article->image3) }}" onerror="this.style.display='none'">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1"> {{-- いいねボタン far中抜き(いいね前) fas中埋め(いいね後) --}}
                            @guest
                                <i class="far fa-heart" data-articleid="{{ $article->id }}"></i>
                            @else {{-- ログインしている場合 --}}
                                <i class="
                                @if(App\Fav::where('article_id', $article->id)->where('user_id', Auth::User()->id)->exists())
                                {{ 'fas' }} {{-- いいね済 --}}
                                @else
                                {{ 'far' }} {{-- いいね前 --}}
                                @endif
                                fa-heart fav_btn" data-articleid="{{ $article->id }}"></i> {{-- 記事IDの送信用 --}}
                            @endguest
                        <td colspan="6">詳細説明<br />{{ $article->body }}</td>
                        <td colspan="4"><img
                                src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image"></td>
                    </tr>
                    <tr>
                        <td colspan="1"><i class="far fa-thumbs-up fa-lg"></i></td>
                        <td colspan="1" class="comment_button"><i class="far fa-comment fa-lg"></i></br>
                            {{ App\comment::where('article_id', $article->id)->pluck('comment') }}
                            <form action="{{ url('articles.index') }}" method="POST">
                                @csrf
                                <textarea rows="2" name="comment"></textarea>
                                <button type="submit" name="comment"></button>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                            </form>
                        </td>
                        <td colspan="3">名前</br>{{ App\user::find($article->user_id)->name }}</td>
                        <td colspan="5">
                            科の名前</br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
                        </td>
                        <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td> {{-- コメントボタン --}}
                        <td colspan="3">
                            {{ App\user::find($article->user_id)->name }}{{ '@' }}{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject }}
                        </td> {{-- ユーザ名@学科名 --}}
                        <td colspan="5">{{ strtr(substr($article->created_at, 5, 5), '-', '/') }}</td> {{-- 投稿日付 --}}
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
                </table>
                @endforeach
                {{ $articles->onEachSide(2)->links()}}
            </div>

            <!-- comments -->
            <div class="commentPanel">
                    <p>NEW コメント</p>
                    {{-- コメント --}}
                    @foreach($comments as $comment) 
                    <div class="comment">
                        <div class="userName">
                                <div id="profil">
                                    <img src="{{ asset('storage/avaters/'.App\user::find($comment->user_id)->avater) }}" alt="プロフィール画像" class="parson">
                                </div>
                                {{ App\user::find($comment->user_id)->name }}
                            </div>
                        <div class="newComment">
                            {{ $comment->comment }}
                        </div>
                        <div class="toukouName">
                            投稿記事：{{ App\article::find($comment->article_id)->title }}
                        </div>
                        <div class="commentFooter">
                            <time>{{ strtr(substr($comment->created_at, 5, 5), '-', '/') }}</time>
                        </div>
                    </div>
                    @endforeach
            </div>

            {{-- WEB --}}
            <div class="toukouPanel article-panel">
                <p>投稿</p>
                {{-- 記事一覧 --}}
                @foreach($articles1 as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">
                            <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">{{ $article->body }}</td>
                        <td colspan="4" height="250px">
                            @if($article->image1 === null)
                                <img src="storage/avaters/default_avater.png" alt="プロフィール画像" class="no_image">
                            @else
                                <img src="storage/avaters/avater" alt="プロフィール画像" class="no_image">
                            @endif
                            <img src="{{ asset('storage/uploaded_images/'.$article->image2) }}" onerror="this.style.display='none'">
                            <img src="{{ asset('storage/uploaded_images/'.$article->image3) }}" onerror="this.style.display='none'">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1"> {{-- いいねボタン far中抜き fas中埋め --}}
                            @guest
                                <i class="far fa-heart" data-articleid="{{ $article->id }}"></i>
                            @else {{-- ログインしている場合 --}}
                                <i class="
                                @if(App\Fav::where('article_id', $article->id)->where('user_id', Auth::User()->id)->exists())
                                {{ 'fas' }}
                                @else
                                {{ 'far' }}
                                @endif
                                fa-heart fav_btn" data-articleid="{{ $article->id }}"></i>
                            @endguest
                        </td>
                        <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td>
                        <td colspan="3">
                            {{ App\user::find($article->user_id)->name }}{{ '@' }}{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject }}
                        </td>
                        <td colspan="5">
                            {{ strtr(substr($article->created_at, 5, 5), '-', '/') }}
                        </td>
                    </tr>
                    <tr class="comment_none">
                        <td colspan="10">
                            <ul>
                                <li>
                                <form>
                                        @csrf
                                        <input type="text" class="comment_text" name="comment">
                                        <input type="hidden" name="recaptcha" id="recaptcha">
                                        <input type="submit" class="comment_submit" id="{{ $article->id }}">
                                    </form>
                                <li>コメント内容の予定</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                @endforeach
                {{ $articles1->onEachSide(2)->links()}}
            </div>

            {{-- 写真 --}}
            <div class="toukouPanel article-panel">
                <p>投稿</p>
                {{-- 記事一覧 --}}
                @foreach($articles2 as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">
                            <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">{{ $article->body }}</td>
                        <td colspan="4" height="250px">
                            @if($article->image1 === null)
                                <img src="storage/avaters/default_avater.png" alt="プロフィール画像" class="no_image">
                            @else
                                <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image">
                            @endif
                            <img src="{{ asset('storage/uploaded_images/'.$article->image2) }}" onerror="this.style.display='none'">
                            <img src="{{ asset('storage/uploaded_images/'.$article->image3) }}" onerror="this.style.display='none'">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1"> {{-- いいねボタン far中抜き fas中埋め --}}
                            @guest
                                <i class="far fa-heart" data-articleid="{{ $article->id }}"></i>
                            @else {{-- ログインしている場合 --}}
                                <i class="
                                @if(App\Fav::where('article_id', $article->id)->where('user_id', Auth::User()->id)->exists())
                                {{ 'fas' }}
                                @else
                                {{ 'far' }}
                                @endif
                                fa-heart fav_btn" data-articleid="{{ $article->id }}"></i>
                            @endguest
                        </td>
                        <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td>
                        <td colspan="3">
                            {{ App\user::find($article->user_id)->name }}{{ '@' }}{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject }}
                        </td>
                        <td colspan="5">
                            {{ strtr(substr($article->created_at, 5, 5), '-', '/') }}
                        </td>
                    </tr>
                    <tr class="comment_none">
                        <td colspan="10">
                            <ul>
                                <li class="form_js"></li>
                                <li>コメント内容の予定</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                @endforeach
                {{ $articles2->onEachSide(2)->links()}}
            </div>

            {{-- 動画 --}}
            <div class="toukouPanel article-panel">
                <p>投稿</p>
                {{-- 記事一覧 --}}
                @foreach($articles3 as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">
                            <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">詳細説明<br>{{ $article->body }}</td>
                        <td colspan="4" height="250px">
                            @if($article->image1 === null)
                                <img src="storage/avaters/default_avater.png" alt="プロフィール画像" class="no_image">
                            @else
                                <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="o_image">
                            @endif
                            <img src="{{ asset('storage/uploaded_images/'.$article->image2) }}" onerror="this.style.display='none'">
                            <img src="{{ asset('storage/uploaded_images/'.$article->image3) }}" onerror="this.style.display='none'">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1"> {{-- いいねボタン far中抜き fas中埋め --}}
                            @guest
                                <i class="far fa-heart" data-articleid="{{ $article->id }}"></i>
                            @else {{-- ログインしている場合 --}}
                                <i class="
                                @if(App\Fav::where('article_id', $article->id)->where('user_id', Auth::User()->id)->exists())
                                {{ 'fas' }}
                                @else
                                {{ 'far' }}
                                @endif
                                fa-heart fav_btn" data-articleid="{{ $article->id }}"></i>
                            @endguest
                        </td>
                        <td colspan="1" class="comment_button"><i class="far fa-comment"></i></td>
                        <td colspan="3">
                            {{ App\user::find($article->user_id)->name }}{{ '@' }}{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject }}
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
                                <li>コメント内容の予定</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                @endforeach
                {{ $articles3->onEachSide(2)->links()}}
            <div id="commentPanel">
                <p>NEW コメント</p>
                {{-- コメント --}}
                @for($i=1;$i<=1;$i++) <div class="comment">
                <div class="userName">
                                    <div id="profil">
                                        <img src="../image/parson.jpg" alt="プロフィール画像" id="parson">
                                    </div>
                                    <span class="circle"></span>
                                    <span class="useruuu">userName</span>
                                </div>



                                <div class="newComment">
                                    昨晩、彼氏と大喧嘩をしまして
                                    『もう顔も見たくない！』
                                    って私が家を飛び出したと同時に
                                    『俺も顔見たくない！』
                                </div>

                                <div class="toukouName">
                                    投稿名：オリジナルテトリス
                                </div>

                                <div class="commentFooter">
                                    <time>2020-01-12</time>
                                </div>
                    </div>
                    @endfor
            </div>

            <!-- 投稿ボタン -->
            <div id="toukou_button">
                <div id="toukou0">
                    <img src="/image/toukoubotan0.png " alt="投稿する">
                </div>
                <div id="toukou1">
                    <a href="{{ route('articles.create') }}"><img src="/image/toukoubotan1.png " alt="投稿する"
                            id="toukou1"></a>
                </div>
            </div>
        </section>
    </section>
</div>
@endsection