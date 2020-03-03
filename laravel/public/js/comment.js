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
                $('#comment_text ').remove();
                $('#comment_submit').remove();
                $('.count_area').remove();

                $('.comment_none').fadeOut(close_duration).removeClass('open');

                $('.comment_form').show();
                //コメントエリアの表示
                $comment.addClass('open');
                $comment.fadeIn(duration);

                //文字数表示欄を作成
                $comment.find('ul').prepend('<li class="count_area count_danger">文字数<span class="comment_count">0</span>/25</li>');

                //入力フォームの作成
                $comment.find('.form_js').append('<input type="text" id="comment_text"><input type="submit" id="comment_submit">');

            } else {

                $.when(

                    $('#comment_text').remove(),
                    $('#comment_submit').remove(),
                    $('.count_area').remove(),
                    $comment.find('td').hide()

                ).done(function() {

                    // $('.comment_form').hide('blind', close_duration);
                    //入力フォームの削除
                    $comment.hide('blind', close_duration);
                });

            };

        });

    });

    //文字数表示処理
    $(document).on('input', '#comment_text', function() {

        var count = $(this).val().length;

        if (count > 0 && 26 > count) {
            $('.count_area').removeClass('count_danger');
        } else {
            $('.count_area').addClass('count_danger');
        }

        $('.comment_count').text(count);
    });

    $('form').submit(function(ev) {
        ev.preventDefault();
        ev.stopPropagation();

        //親要素・コメントの内容とエスケープ処理後の内容・文字数・表示するためのＤＯＭ要素・記事ＩＤの定義
        var comment_area = $(this).parents('ul');
        var comment_data = $(this).find('#comment_text').val();
        var comment_data_length = comment_data.length;
        var comment_data_escape = escapeSelectorString(comment_data);
        // console.log(comment_data);
        // console.log(comment_data_escape);
        var comments = "<li class='comment_data_area'><span class='profile'><img src='storage/avaters/default_avater.png' alt='プロフィール画像' class='no_image'></span> : " + comment_data_escape + "</li>";
        var article_id = $(this).parents('.toukou').find('a').attr('id');

        // 簡易的に表示
        // comment_area.append(comments);

        //ajaxでデータの保存
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (comment_data_length > 40) {
            alert("40文字以下で入力してください");
        } else if (comment_data_length > 0) {
            $.ajax({
                url: '&',
                type: 'POST',
                datatype: 'json',
                data: {
                    comment_data: comment_data_escape,
                    article_id: article_id
                }
            }).done(function(data) {
                //簡易的に表示
                comment_area.append(comments);
            }).fail(function(data) {
                //ログインアラート
                alert('ログインしてください');
            })
        } else {
            alert("入力してください");
        }

    });

    //エスケープ処理関数
    function escapeSelectorString(val) {
        return val.replace(/[ "#$%&'()*+,.\/:;<=>@\[\\\]^`{|}~]/g, "\*");
    };

})