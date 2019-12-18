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
<p>【ユーザ】{{ App\User::find($opinion->user_id)->name }} 【投稿日時】{{ App\Opinion::find($opinion->id)->created_at }}</p>
<p>【本文】</p>
<p>{{ App\Opinion::find($opinion->id)->body }}</p>
@endforeach

@endsection
