@extends('minatsukulayout')

@section('content')
{{-- enctypeはMIMEタイプの指定。画像を送るのに必要 --}}
<form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
    @csrf
        <input id="image" type="file" name="image">
        <button type="submit">
           アップロード
        </button>
    </form>
    {{-- コントローラ(現在:PagesController@index)から送られてくる$imagesを扱う --}}
    @foreach($images as $image)
        <div>
            {{-- asset()はpublicディレクトリへのパスを返す --}}
            {{-- "$image"はimagesテーブルの1レコード分のデータ --}}
            {{-- "$image->image"はimagesテーブルのimageカラムの内容(画像ファイル名が格納されている) --}}
            <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 20%; height: auto;"/>
        </div>
    @endforeach
@endsection
