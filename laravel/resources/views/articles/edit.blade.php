@extends('layout')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>

    <hr/>

    {{-- エラーの表示 --}}
    @include('errors.form_errors')

    {{-- Formファザード --}}
    {{-- $article の値をフォームに紐付ける為に Form::model を使用 --}}
    {{-- METHOD に PATCH を指定し、url へは $article の idをパラメータとして引き渡します --}}
    {{-- {!! Form::model($article, ['method' => 'PATCH', 'url' => ['articles', $article->id]]) !!} --}}
    {!! Form::model($article, ['method' => 'PATCH', 'route' => ['articles.update', $article->id]]) !!}
            {{-- published_at の入力項目の初期値を date(‘Y-m-d’)から $article->publieshed_at の値に変更 --}}
            {{-- $article->published_at は Article クラスで日付ミューテーターを指定している為、参照すると Carbon クラスのインスタンスが返ってきます。format()メソッドで文字列に変換して初期値とします --}}
        @include('articles.form', [
            'published_at' => $article->published_at->format('Y-m-d'),
            'submitButton' => 'Edit Article'
            ])
    {!! Form::close() !!}
@endsection
