{{-- @extends('layouts.app') --}}
{{-- @extends('layout') --}}
@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="../css/new_common.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    {{--記事削除時のアラート--}}
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <h2>ようこそ、{{ Auth::user()->name }}さん！</h2>
                    <h3>あなたの学科は：{{ App\Subject::find(Auth::user()->subject_id)->subject }}</h3>
                </div>

                <hr/>

                {{-- コントローラ(DashboardController@index)から送られてくる$articlesを扱う --}}
                @foreach($articles as $article)
                <div>
                        <table class="toukou">
                                <tr>
                                    <td colspan="10">タイトル</br>{!! Form::open(['method' => 'DELETE', 'url' => ['articles', $article->id]]) !!}
                                        {!! Form::submit('削除') !!}
                                        {!! Form::close() !!}
                                        <a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
                                        {{-- <a href="{{ action('DashboardController@edit', [$article->id]) }}">編集</a></td> --}}
                                        <a href="{{ route('articles.edit', [$article->id]) }}">編集</a></td>
                                </tr>
                                <tr>
                                    <td colspan="6" height="180px">詳細説明<br/>{{ $article->body }}</td>
                                <td colspan="4" height="180px"><img src="{{ asset('storage/'.$article->image1) }}" alt="no_image"></td>
                                </tr>
                                <tr>
                                    <td colspan="1">いいね</td>
                                    <td colspan="1" class="comment_button">コメント</td>
                                    <td colspan="3">名前</br>{{ App\user::find($article->user_id)->name }}</td>
                                    <td colspan="5">科の名前</br>{{ App\subject::find(App\user::find($article->user_id)->subject_id)->subject  }}</td>
                                </tr>
        
                                <tr class="comment-none">
                                    <td colspan="10">
                                        <ul>
                                            <li>コメント内容の予定</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                    {{-- @if(isset($article->image1)) --}}
                    {{-- asset()はlaravel/publicディレクトリへのパスを返す --}}
                    {{-- "$image"はimagesテーブルの1レコード分のデータ --}}
                    {{-- "$image->image"はimagesテーブルのimageカラムの内容(画像ファイル名が格納されている) --}}

                    {{-- <img src="{{ asset('storage/'.$article->image1) }}" style="width: 10%; height: auto;"/>
                    @endif
                    @if(isset($article->image2))
                    <img src="{{ asset('storage/'.$article->image2) }}" style="width: 10%; height: auto;"/>
                    @endif
                    @if(isset($article->image3))
                    <img src="{{ asset('storage/'.$article->image3) }}" style="width: 10%; height: auto;"/>
                    @endif --}}
                </div>
                @endforeach

                <hr/>

                <div>
                <p>遊び</p>
                <div>
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/tbvxFW4UJdU" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <form>
                    @csrf
                    <p><input type="text"></p>
                    <p><button type="submit">送信</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
