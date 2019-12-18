@extends('minatsukulayout')

@section('addcss')
<link rel="stylesheet" href="/css/new_common.css">
@endsection

@section('addjs')
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
    $(function () {
        $('#button').click(
            function () {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('ajaxtest.get') }}',
                    dataType: 'html',
                }).done(function (results) {
                    $('#text').html(results);
                }).fail(function (err) {
                    alert('ファイルの取得に失敗しました。');
                });
            }
        );
    });
</script>
@endsection

@section('content')
<p><input type="button" id="button" value="「sample.html」取得" /></p>
<p><div id="text"></div></p>
@endsection
