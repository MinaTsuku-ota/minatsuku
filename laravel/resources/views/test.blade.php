@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('addjs')
@include('recaptcha_js')
@endsection

@section('content')
{{-- enctypeはMIMEタイプの指定。画像を送るのに必要 --}}
{{-- <form method="POST" action="{{ route('test.store') }}" enctype="multipart/form-data">
    @csrf
    <input id="image" type="file" name="image">
    <button type="submit">アップロード</button>
</form> --}}


{{-- コントローラ(現在:PagesController@index)から送られてくる$imagesを扱う --}}
{{-- @foreach($images as $image)
        <div> --}}
            {{-- asset()はpublicディレクトリへのパスを返す --}}
            {{-- "$image"はimagesテーブルの1レコード分のデータ --}}
            {{-- "$image->image"はimagesテーブルのimageカラムの内容(画像ファイル名が格納されている) --}}
            {{-- <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 10%; height: auto;"/>
        </div>
    @endforeach --}}
<div class="column is-half">
    @if(isset($status))
        @if($status == true)
            <div class="notification is-success">
                <button class="delete"></button>
                送信に成功しました。<br/>
                あなたのSCORE：<strong>{{ $score }}</strong><br/>
                (robot)0.0 ~ 1.0(human)
            </div>
        @endif
        @if($status == false)
            <div class="notification is-warning">
                <button class="delete"></button>
                送信に失敗しました。<br/>
                あなたのSCORE：<strong>{{ $score }}</strong>
                (robot)0.0 --- 1.0(human)
            </div>
        @endif
    @endif

    <form method="POST" action="{{ route('test.post') }}">
        @csrf
        <div class="field">
            <div class="control">
                <input type="text" name="text" class="input" placeholder="Message" required></p>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Send Message</button>
            </div>
        </div>
        <input type="hidden" name="recaptcha" id="recaptcha">
    </form>
</div>
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
