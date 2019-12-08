{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('content')
    <h1>Write a New Article</h1>

    <hr/>

    {{-- エラーの表示 --}}
    @include('errors.form_errors')

    {{-- Formファザードはlaravelcollective/htmlパッケージに含まれるものです --}}
    {{-- {!! Form::open(['url' => 'articles']) !!} URL指定の場合はこちら --}}
    {!! Form::open(['route' => 'articles.store', 'files' => true]) !!}
        @include('articles.form', [
            'published_at' => date('Y-m-d'),
            'submitButton' => 'Add Article'
            ])
    {!! Form::close() !!}
@endsection
