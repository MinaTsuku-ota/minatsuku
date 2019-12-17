$(function() {
    var duration = 300;

    var position = $('tbody').offset();
    console.log(position);

    //全てのコメント要素に関数を反映
    $('.comment_button').each(function() {

        //クリック時
        $(this).click(function() {

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

    $('.comment_submit').each(function() {

        $('[type="submit"]').on('click', function(ev) {
            ev.preventDefault();

            var thisParent = $(this).parent();

            console.log(thisParent);

            var thisParentParent = thisParent.parents('ul');
            var comment_data = thisParent.find('.comment_text').val();
            var comments = "<li><span class='profile'></span> : " + comment_data + "</li>";

            $(comments).appendTo(thisParentParent);

            $.ajax({
                url: 'sample.php',
                type: 'GET',
                datatype: 'text',
                data: comment_data
            }).done(function() {
                console.log('success');
            })

            console.log(comment_data);

        })
    })

    // $('.comment_text').each(function() {

    //     $(this).on('click', function() {

    //         var thisParentParent = $(this).parents('ul');
    //         $(thisParentParent).append("<li class='output'><span class='profile'></span> : " + "</li>");

    //     });

    //     var $input = $(this),
    //         $output = $input.parent().find('.output');

    //     $input.on('input', function(event) {
    //         var value = $input.val();
    //         $output.append(value);
    //         console.log($output);
    //     });
    // });

})