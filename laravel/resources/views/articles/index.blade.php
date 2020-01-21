@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
<link rel="shortcut icon" href="/image/favicon.png" type="image/png">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="/css/fav.css">
@endsection

@section('addjs')
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/comment.js"></script>
<script src="js/tagSwitch.js"></script>
<script src="js/tagSwitchGet.js"></script>
<script src="js/fav.js"></script>
@include('recaptcha_js')

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div id="contens">
    <section class="navBox">
        <form id="radio">
            <input type="radio" name="tabs" id="tab01" class="menu01 article-tab" value="1">
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
                {{-- 記事一覧 --}}
                @foreach($articles as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">タイトル<br>
                        <a href="{{ url('articles', $article->id) }}" id="{{ $article->id }}">{{ $article->title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">詳細説明<br>{{ $article->body }}</td>
                        <td colspan="4" height="250px">
                            <img src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image">
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
                        <td colspan="1" class="comment_button">コメント<br>
                            {{ App\comment::where('article_id', $article->id)->pluck('comment') }}
                        </td>
                        <td colspan="3">名前<br>{{ App\user::find($article->user_id)->name }}</td>
                        <td colspan="5">
                            科の名前<br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
                        </td>
                    </tr>
                    <tr class="comment-none">
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
                {{ $articles->onEachSide(2)->links()}}
            </div>

            <!-- comments -->
            <div class="commentPanel">
                    <p>NEW コメント</p>
                    {{-- コメント --}}
                    @foreach($comments as $comment) 
                    <table class="comment">
                        <tr>
                        <td colspan="10">タイトル<a href="#{{ App\article::find($comment->article_id)->id }}">{{ App\article::find($comment->article_id)->title }}</a><br>コメント<br>{{ $comment->comment }}<br>名前{{ App\user::find($comment->user_id)->name }}</td>
                        </tr>
                    </table>
                    @endforeach
            </div>

            {{-- WEB --}}
            <div class="toukouPanel article-panel">
                <p>投稿</p>
                {{-- 記事一覧 --}}
                @foreach($articles1 as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">タイトル<br><a
                                href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">詳細説明<br>{{ $article->body }}</td>
                        <td colspan="4" height="250px"><img
                                src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image"></td>
                    </tr>
                    <tr>
                        <td colspan="1">いいね</td>
                        <td colspan="1" class="comment_button">コメント<br>
                        </td>
                    <td colspan="3">名前<br>{{ App\user::find($article->user_id)->name }}</td>
                        <td colspan="5">
                            科の名前<br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
                        </td>
                    </tr>
                    <tr class="comment-none">
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
                        <td colspan="10">タイトル<br><a
                                href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">詳細説明<br>{{ $article->body }}</td>
                        <td colspan="4" height="250px"><img
                                src="/storage/{{ $article->image1 }}" alt="no_image"></td>
                    </tr>
                    <tr>
                        <td colspan="1">いいね</td>
                        <td colspan="1" class="comment_button">コメント<br>
                        </td>
                        <td colspan="3">名前<br>{{ App\user::find($article->user_id)->name }}</td>
                        <td colspan="5">
                            科の名前<br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
                        </td>
                    </tr>
                    <tr class="comment-none">
                        <td colspan="10">
                            <ul>
                                <li>
                                    <form action="#">
                                        @csrf
                                        <input type="text" class="comment_text">
                                        <input type="hidden" name="recaptcha" id="recaptcha">
                                        <input type="submit" class="comment_submit" id="submit{{ $article->id }}">
                                    </form>
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
                        <td colspan="10">タイトル<br><a
                                href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></td>
                    </tr>
                    <tr>
                        <td colspan="6" height="250px">詳細説明<br>{{ $article->body }}</td>
                        <td colspan="4" height="250px"><img
                                src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image"></td>
                    </tr>
                    <tr>
                        <td colspan="1">いいね</td>
                        <td colspan="1" class="comment_button">コメント<br>
                        </td>
                        <td colspan="3">名前<br>{{ App\user::find($article->user_id)->name }}</td>
                        <td colspan="5">
                            科の名前<br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
                        </td>
                    </tr>
                    <tr class="comment-none">
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