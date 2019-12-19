<?php
switch (true) {
    case !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']):
    case $_SERVER['PHP_AUTH_USER'] !== 'admin':
    case $_SERVER['PHP_AUTH_PW']   !== 'admin':
        header('WWW-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        die('このページを見るにはログインが必要です');
}
header('Content-Type: text/html; charset=utf-8');
/* 参考記事: https://qiita.com/mpyw/items/dc2cb3632370389d700e */
?>
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

@section('content')
<h2>ご意見一覧</h2>
@foreach($opinions as $opinion)
<hr/>
<p>【ニックネーム】{{ App\User::find($opinion->user_id)->name }}　【投稿日時】{{ $opinion->created_at }}</p>
<p>{{ App\Opinion::find($opinion->id)->body }}</p>
@endforeach

@endsection
