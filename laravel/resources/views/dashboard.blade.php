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
                    @if(isset($article->image1))
                    {{-- asset()はlaravel/publicディレクトリへのパスを返す --}}
                    {{-- "$image"はimagesテーブルの1レコード分のデータ --}}
                    {{-- "$image->image"はimagesテーブルのimageカラムの内容(画像ファイル名が格納されている) --}}
                    <img src="{{ asset('storage/' . $article->image1) }}" style="width: 10%; height: auto;"/>
                    @endif
                    @if(isset($article->image2))
                    <img src="{{ asset('storage/' . $article->image2) }}" style="width: 10%; height: auto;"/>
                    @endif
                    @if(isset($article->image3))
                    <img src="{{ asset('storage/' . $article->image3) }}" style="width: 10%; height: auto;"/>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
