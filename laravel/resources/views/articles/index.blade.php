@extends('layout')
 
@section('content')
    <h1>Articles</h1>
 
    <hr/>
 
    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{ url('articles', $article->id) }}">
                    {{ $article->title }}
                </a>
            </h2>
        </article>
    @endforeach
@endsection
