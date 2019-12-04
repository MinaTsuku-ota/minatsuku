{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('content')
    <h1>Write a New Article</h1>

    <hr/>

    {{-- エラーの表示 --}}
    @include('errors.form_errors')

    {{-- Formファザード --}}
    {{-- {!! Form::open(['url' => 'articles']) !!} --}}
    {!! Form::open(['route' => 'articles.store']) !!}
        @include('articles.form', [
            'published_at' => date('Y-m-d'),
            'submitButton' => 'Add Article'
            ])
    {!! Form::close() !!}
@endsection
