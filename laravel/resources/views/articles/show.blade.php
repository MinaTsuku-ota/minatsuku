@extends('layout')

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
        {{-- ログインしているときだけ表示 --}}
        @auth
            <a href="{{ action('ArticlesController@edit', [$article->id]) }}"
                class="btn btn-primary">編集</a>

            {{-- 削除ボタン --}}
            {{-- {!! Form::open(['method' => 'DELETE', 'url' => ['articles', $article->id], 'class' => 'd-inline']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!} --}}
            {{-- ヘルパ関数を使う --}}
            {!! delete_form(['articles', $article->id]) !!}
        @endauth

        <a href="{{ action('ArticlesController@index') }}"
            class="btn btn-secondary float-right">一覧へ戻る</a>
    </div>
@endsection
