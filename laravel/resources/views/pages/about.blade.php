@extends('layout')
 
@section('content')
    {{-- ダブルカーリーを使うように修正 --}} 
    <h1>About Me: {{ $first_name }} {{ $last_name }}</h1>
@endsection