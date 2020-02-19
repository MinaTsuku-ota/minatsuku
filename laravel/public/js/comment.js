$(function() {
    var duration = 300;
    var close_duration = 200;

    //全てのコメント要素に関数を反映
    $('.comment_button').each(function() {

        //クリック時
        $(this).click(function() {

            //コメント内容の要素をjQOにする
            var $comment = $(this).parent().next('.comment_none');

            //開閉処理
            $comment.toggleClass('open');
            if ($comment.hasClass('open')) {

                //全体のフォームとエリアを削除
                $comment.find('.form_js').empty();
                $('.comment_none').fadeOut(close_duration).removeClass('open');

                //コメントエリアの表示
                $comment.addClass('open');
                $comment.fadeIn(duration);

                //入力フォームの作成
                $comment.find('.form_js').append('<input type="text" class="comment_text"><input type="submit" class="comment_submit">');

            } else {

                $.when(

                    $comment.find('.form_js').empty()

                ).done(function() {

                    //入力フォームの削除
                    $comment.hide('blind', 500);

                });

            };

        });

    });


    $('.comment_submit').on('click', function(ev) {
        ev.preventDefault();

        //親要素・コメントの内容・表示するためのＤＯＭ要素・記事ＩＤの定義
        var comment_area = $(this).parents('ul');
        var comment_data = $(this).siblings('.comment_text').val();
        var comments = "<li><span class='profile'><img src='storage/avaters/default_avater.png' alt='プロフィール画像' class='no_image'></span> : " + comment_data + "</li>";
        var article_id = this.getAttribute('id');

        // 簡易的に表示
        comment_area.append(comments);

        //ajaxでデータの保存
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '&',
            type: 'POST',
            datatype: 'json',
            data: {
                comment_data: comment_data,
                article_id: article_id
            }
        }).done(function(data) {
            //簡易的に表示
            comment_area.append(comments);
        }).fail(function(data) {
            //ログインアラート
            alert('ログインしてください');
        })
    })
})