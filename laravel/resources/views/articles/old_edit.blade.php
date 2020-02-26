@extends('layout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('addjs')
{{-- @include('recaptcha_js') --}}
@endsection

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
        @include('articles.form', [
            // 'published_at' => $article->published_at->format('Y-m-d'),
            'submitButton' => 'Edit Article'
            ])
    {{-- <input type="hidden" name="recaptcha" id="recaptcha"> --}}
    {!! Form::close() !!}
@endsection
