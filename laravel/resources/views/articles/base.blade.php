@extends('minatsukulayout')

@section('content')
<div id="wrap">
    <main>
        <div id="contens">
            <div class="navBox">
                <input type="radio" name="tabs" id="tab01" class="menu01" checked="checked">
                <label for="tab01" class="label01">HOME</label>
                <input type="radio" name="tabs" id="tab02" class="menu02">
                <label for="tab02" class="label02">WEB</label>
                <input type="radio" name="tabs" id="tab03" class="menu03">
                <label for="tab03" class="label03">写真</label>
                <input type="radio" name="tabs" id="tab04" class="menu04">
                <label for="tab04" class="label04">動画</label>
        	    <section class="homeContent clearfix">
        		    <div class="toukouPanel">
                        <p>投稿</p>
                        {{-- 記事一覧 --}}
					    @for($i=1;$i<=1;$i++)
                            <table class="toukou">
                                <tr>
                                    <td colspan="10">オリジナルテトリス</td>
                                </tr>
                                <tr>
                                    <td colspan="6" height="180px">詳細説明</td>
                                    <td colspan="4" height="180px">画像</td>
                                </tr>
                                <tr>
                                    <td colspan="1">いいね</td>
                                    <td colspan="1" class="comment-button">コメント</td>
                                    <td colspan="3">名前</td>
                                    <td colspan="5">科の名前</td>
                                </tr>
                                <tr class="comment-none">
                                    <td colspan="10">
                                        <ul>
                                            <li>コメント内容1</li>
                                            <li>コメント内容2</li>
                                        </ul>
                                    </td>
                                </tr>
						    </table>
					    @endfor
        		    </div>
                    <div class="commentPanel">
                        <p>NEW コメント</p>
                        {{-- コメント --}}
                        @for($i=1;$i<=1;$i++)
                            <table class="comment">
                                <tr>
                                    <td colspan="10">オリジナルテトリス</td>
                                </tr>
                            </table>
                         @endfor
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>
@endsection
