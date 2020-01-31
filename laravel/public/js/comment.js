$(function() {
    var duration = 300;
    var close_duration = 200;

    // var url = location.href;
    // if (url == 'http://localhost/articles') {
    //     alert('Goood');
    // }
    // console.log(url);


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
                $comment.find('.form_js').append('<form action="#" method="post">@csrf<input type="text" class="comment_text"><input type="hidden" name="recaptcha" id="recaptcha"><input type="submit" class="comment_submit"></form>');

            } else {

                $.when(

                    $comment.fadeOut(duration)

                ).done(function() {

                    //入力フォームの削除
                    $comment.find('.form_js').empty();

                });
            };



        });

    });


    $('.comment_submit').on('click', function(ev) {
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
            url: '&',
            type: 'POST',
            datatype: 'json',
            data: {
                comment_data: comment_data,
                article_id: article_id
            }
        }).done(function(data) {
            console.log('done');
            console.log(data.comment_data);
        }).fail(function(data) {
            console.log('fail');
            console.log(data);
        })
    })
})

$(function() {
    $('svg').hover(function() {
        $('svg').stop();
        anime({
            targets: ['#svgAttributes polygon', 'feTurbulence', 'feDisplacementMap'],
            points: '64 128 8.574 96 8.574 32 64 0 119.426 32 119.426 96',
            baseFrequency: .05,
            scale: 1,
            easing: 'easeInOutExpo'
        })
    }, function() {
        $('svg').stop();
        $('filter feTurbulence').attr('style', '');
        anime({
            targets: ['#svgAttributes polygon', 'feTurbulence', 'feDisplacementMap'],
            points: '64 68.64 8.574 100 63.446 67.68 64 4 64.554 67.68 119.426 100',
            baseFrequency: .05,
            type: 'turbulence',
            style: '',
            scale: 1,
            easing: 'easeInOutExpo'
        })

    })
})