{{-- @extends('layouts.app') --}}
{{-- @extends('layout') --}}
@extends('minatsukulayout')

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
            </div>
        </div>
    </div>
</div>
@endsection
