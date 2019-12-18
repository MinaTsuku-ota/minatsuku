@extends('layout')

@section('addcss')
<style>
    #droppable {
        border: gray solid 1em;
        display: block;
        padding: 2px 1em;
        position: relative;
        height: 100px;
    }

    #droppable input[type="file"] {
        background-Color: #fff2f2;
        height: 100%;
        left: 0px;
        top: 0px;
        position: absolute;
        width: 100%;
        /* opacity: 0; */
    }

</style>
@endsection

@section('content')
<form method="POST" action="{{ route('ddtest') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        タイトル：
        <input type="text" name="title" class="form-control w-25" placeholder="タイトルを入力" required>
    </div>
    <div class="form-group">
        ジャンル：
        <select size="1" class="form-control w-25" name="genre_id">
            {{-- <option value="0">Please&nbsp;select&nbsp;a&nbsp;genre.</option> --}}
            <option value="1">WEB</option>
            <option value="2">写真</option>
            <option value="3">動画</option>
        </select>
    </div>
    <div class="form-group">
        本文：
        <textarea placeholder="作品の説明を記入してください。" class="form-control w-50" name="body" required></textarea>
    </div>
    <div id="droppable" class="form-group">
        <input type="file" id="input_file" name="image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
    <input type="hidden" name="recaptcha" id="recaptcha">
</form>
@endsection

@section('addscript')
<script>
    $(function () {
        // ドロップ時の処理
        $('input:file').on('drop', function (e) {
            // e.stopPropagation(); // 後続へのイベント伝播を止める
            e.preventDefault(); // イベントのデフォルト処理をキャンセルする

            // $('#input_file')のchangeイベントが発火
            $('#input_file')[0].files = e.originalEvent.dataTransfer.files;

            //$(this).closest('form').trigger('submit'); // submitを実行
        });
    });

    $('#input_file').on("change", function (e) {
        // バリデーション等
    });

    // form以外でファイルがドロップされた場合、ファイルが開いてしまうのを防ぐ
    $(document).on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });
    $(document).on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });
    $(document).on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

</script>
@endsection
