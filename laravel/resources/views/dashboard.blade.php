{{-- @extends('layouts.app') --}}
{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
<style>
    body {
        background-image: none;
        background-color: #fff2f2;
    }

</style>
@endsection

@section('addjs')
@include('recaptcha_js')
@endsection

@section('content')
<h1>Dashboard</h1>

<hr />

<div>
    <h2>
        ようこそ、
        <img src="{{ asset('storage/avaters/'.Auth::user()->avater) }}" alt="avater" style="height:50px; width:auto;">
        {{ Auth::user()->name }}さん！
    </h2>
    <h3>あなたの学科は：{{ App\Subject::find(Auth::user()->subject_id)->subject }}</h3>
</div>

<hr />

{{-- コントローラ(DashboardController@index)から送られてくる$articlesを扱う --}}
@foreach($articles as $article)
<div>
    <table class="toukou">
        <tr>
            <td colspan="10">タイトル</br>{!! Form::open(['method' => 'DELETE', 'url' => ['articles',
                $article->id]]) !!}
                {!! Form::submit('削除') !!}
                {!! Form::close() !!}
                <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                {{-- <a href="{{ action('DashboardController@edit', [$article->id]) }}">編集</a></td> --}}
            <a href="{{ route('articles.edit', [$article->id]) }}">編集</a></td>
        </tr>
        <tr>
            <td colspan="6" height="180px">詳細説明<br />{{ $article->body }}</td>
            <td colspan="4" height="180px"><img src="{{ asset('storage/uploaded_images/'.$article->image1) }}"
                    alt="no_image"></td>
        </tr>
        <tr>
            <td colspan="1">いいね</td>
            <td colspan="1" class="comment_button">コメント</td>
            <td colspan="3">名前</br>{{ App\user::find($article->user_id)->name }}</td>
            <td colspan="5">
                科の名前</br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}
            </td>
        </tr>

        <tr class="comment-none">
            <td colspan="10">
                <ul>
                    <li>コメント内容の予定</li>
                </ul>
            </td>
        </tr>
    </table>
</div>
@endforeach

<hr />

<div>
    <p>遊び</p>
    <div>
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/tbvxFW4UJdU" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<form method="POST" action="{{ route('dashboard.post') }}">
    @csrf
    <div class="field">
        <div class="control">
            <input type="text" name="text" class="input" placeholder="message" required style="width:500px;">
        </div>
    </div>
    <div class="filed">
        <div class="control">
            <button type="submit" class="button is-link">送信</button>
        </div>
    </div>
    <input type="hidden" name="recaptcha" id="recaptcha">
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;
            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });

</script>

@endsection
