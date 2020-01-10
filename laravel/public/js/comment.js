$(function () {
    var duration = 300;

    var position = $('tbody').offset();
    console.log(position);

    //全てのコメント要素に関数を反映
    $('.comment_button').each(function () {

        //クリック時
        $(this).click(function () {

            //コメント内容の要素をJQOにする
            var $comment = $(this).parent().next('.comment_none');

            //開閉処理
            $comment.toggleClass('open');
            if ($comment.hasClass('open')) {
                $comment.fadeIn(duration);
            } else {
                $comment.fadeOut(duration);
            };
        });
    });


    $('.comment_submit').on('click', function (ev) {
        ev.preventDefault();

        var thisParent = $(this).parent();

        console.log(thisParent);

        var thisParentParent = thisParent.parents('ul');
        var comment_data = thisParent.find('.comment_text').val();
        var comments = "<li><span class='profile'></span> : " + comment_data + "</li>";
        var article_id = this.getAttribute('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            //特殊文字使用{{ action(articlesController@post_ajax) }}
            url: '&#123;&#123;action&#40;articlesController&#169;post_ajax&#41;&#125;&#125;',
            type: 'POST',
            datatype: 'json',
            data: {
                comment_data: comment_data,
                article_id: article_id
            }
        }).done(function (data) {
            console.log('done');
            console.log(data.comment_data);
        }).fail(function (data) {
            console.log('fail');
            console.log(data);
        })
        console.log(comment_data);

    })
})