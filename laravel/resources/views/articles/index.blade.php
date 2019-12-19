@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('addjs')
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/comment.js"></script>
@include('recaptcha_js')
@endsection

@section('content')
<div id="contens">
    <div class="navBox">
        <input type="radio" name="tabs" id="tab01" class="radioboxNone" checked="checked">
        <label for="tab01" class="label01 janru">HOME</label>
        <input type="radio" name="tabs" id="tab02" class="radioboxNone">
        <label for="tab02" class="label02 janru">WEB</label>
        <input type="radio" name="tabs" id="tab03" class="radioboxNone">
        <label for="tab03" class="label03 janru">写真</label>
        <input type="radio" name="tabs" id="tab04" class="radioboxNone">
        <label for="tab04" class="label04 janru">動画</label>

        <section class="homeContent clearfix">
            <div id="toukouPanel">
                <p>投稿</p>
                {{-- 記事一覧 --}}
                @foreach($articles as $article)
                <table class="toukou">
                    <tr>
                        <td colspan="10">タイトル<br /><a
                                href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></td>
                    </tr>
                    <tr>
                        <td colspan="6" height="180px">詳細説明<br />{{ $article->body }}</td>
                        <td colspan="4" height="180px"><img
                                src="{{ asset('storage/uploaded_images/'.$article->image1) }}" alt="no_image"></td>
                    </tr>
                    <tr>
                        <td colspan="1">いいね</td>
                        <td colspan="1" class="comment_button">コメント</br>
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
                    </tr>
                    <tr class="comment-none">
                        <td colspan="10">
                            <ul>
                                <li>
                                    <form action="#">
                                        @csrf
                                        <input type="text">
                                        <input type="hidden" name="recaptcha" id="recaptcha">
                                    </form>
                                <li>コメント内容の予定</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                @endforeach
                {{ $articles->onEachSide(2)->links()}}
            </div>
            <div id="commentPanel">
                <p>NEW コメント</p>
                {{-- コメント --}}
                @for($i=1;$i<=1;$i++) <table class="comment">
                    <tr>
                        <td colspan="10">オリジナルテトリス</td>
                    </tr>
                    </table>
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
    </div>
</div>
@endsection
