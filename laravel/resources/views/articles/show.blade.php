{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('content')
    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    {{-- 追加 --}}
    @unless ($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless

    <br/>

    <div>
        {{-- ログイン中かをチェック --}}
        @auth
            {{-- さらに、articlesテーブルのuser_idとusersテーブルのidが一致しているかをチェック --}}
            {{-- $article->user_id部分は$article->user->idでも同様の結果を得られるはず --}}
            @if( ( $article->user_id ) === ( Auth::user()->id ) )
                <td><a href="{{ route('articles.update', $article->id) }}">編集</a></td>
                <td><a href="{{ route('articles.destroy', $article->id) }}">削除</a></td>
            @endif
        @endauth

        <a href="{{ action('ArticlesController@index') }}"
            class="btn btn-secondary float-right">一覧へ戻る</a>
    </div>
@endsection
