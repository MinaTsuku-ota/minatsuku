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

        var xhr = new XMLHttpRequest();

        // xhr.open('POST', 'articles/sample.php', false);
        // // POST 送信の場合は Content-Type は固定.
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // // 
        // xhr.send(comment_data);

        // xhr.abort(); // 再利用する際にも abort() しないと再利用できないらしい.


        function ajax(id) {
            $.ajaxSetup({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log('OK');
            $.ajax({
                url: "{{ route('articles.post_ajax') }}",
                type: 'POST',
                datatype: 'text',
                data: 'yeeeeee'
            }).done(function (data) {
                $("<li><span class='profile'></span> : " + comment_data + "</li>").appendTo(thisParentParent);
                console.log(data);
            }).fail(function (data) {
                console.log('fail');
                console.log(data);
            })
            console.log(comment_data);
        }
        ajax(comment_data);
    })
})