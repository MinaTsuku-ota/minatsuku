@extends('layout')

@section('content')
    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    <br/>

    <div>
        <a href="{{ action('ArticlesController@edit', [$article->id]) }}"
            class="btn btn-primary">編集</a>

        {{-- 削除ボタン --}}
        {{-- {!! Form::open(['method' => 'DELETE', 'url' => ['articles', $article->id], 'class' => 'd-inline']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!} --}}
        {{-- ヘルパ関数を使う --}}
        {!! delete_form(['articles', $article->id]) !!}

        <a href="{{ action('ArticlesController@index') }}"
            class="btn btn-secondary float-right">一覧へ戻る</a>
    </div>
@endsection
