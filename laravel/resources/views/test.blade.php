@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="../css/new_common.css">
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

    @if(isset($status))
        @if($status == true)
            <p>送信に成功しました。</p>
        @endif
        @if($status == false)
            <p>送信に失敗しました。</p>
        @endif
    @endif

    <form method="POST" action="{{ route('test.store') }}">
        @csrf
        <p><input type="text" name="text"></p>
        <p><button type="submit">送信</button></p>
    </form>
@endsection
