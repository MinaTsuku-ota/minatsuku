<?php
// switch (true) {
//     case !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']):
//     case $_SERVER['PHP_AUTH_USER'] !== 'admin':
//     case $_SERVER['PHP_AUTH_PW']   !== 'admin':
//         header('WWW-Authenticate: Basic realm="Enter username and password."');
//         header('Content-Type: text/plain; charset=utf-8');
//         die('このページを見るにはログインが必要です');
// }
// header('Content-Type: text/html; charset=utf-8');
/* 参考記事: https://qiita.com/mpyw/items/dc2cb3632370389d700e */
?>
@extends('minatsukulayout')

@section('title')
<title>みなツク - 開発者用ページ</title>
@endsection

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
<style>
    body {
        background-image: none;
        background-color: #fff2f2;
    }

    #opinion_wrap {
        margin-left: 10px;
        margin-right: 10px;
    }

    #h2_opinion {
        border-bottom: 2px solid black;
    }

    .opinion_body {
        padding-bottom: 10px;
    }

    /* 最後の要素にはhr無し */
    .opinion_body:not(:last-child) {
        /* hr */
        border-bottom: 1px solid gray;
    }
</style>
@endsection

@section('content')
<div id="opinion_wrap">
    <h2 id="h2_opinion">ご意見・ご要望一覧</h2>
    @foreach($opinions as $opinion)
    <p>【ニックネーム】{{ App\User::find($opinion->user_id)->name }}　【投稿日時】{{ $opinion->created_at }}</p>
    <div class="opinion_body">
        {{ App\Opinion::find($opinion->id)->body }}
    </div>
    @endforeach
</div>
@endsection
