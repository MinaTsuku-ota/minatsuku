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


    $('.comment_submit').on('click', function(ev) {
        ev.preventDefault();

        var thisParent = $(this).parent();

        console.log(thisParent);

        var thisParentParent = thisParent.parents('ul');
        var comment_data = thisParent.find('.comment_text').val();
        var comments = "<li><span class='profile'></span> : " + comment_data + "</li>";

        // $(comments).appendTo(thisParentParent);

<<<<<<< HEAD
        // $.ajaxSetup({
        //     type: "POST",
        //     timeout: 10000,
        // });

        // var postData = { "comment_data": comment_data };

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'sample.php');
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');

        $.ajax({
                url: 'sample.php',
                type: "POST",
                datatype: 'json',
                contentType: "application/json; charset=utf-8",
                data: {
                    "comment_data": comment_data
                }
=======
            $.ajaxSetup({
                type: 'POST'
            })

            $.ajax({
                url: '/sample.php',
                type: 'POST',
                crossDomain: true,
                contentType: 'text/plain',
                accepts: '*/*',
                xhrFields: {
                    withCredentials: true
                },
                processData: false,
                datatype: 'text',
                data: $('.comment_text').val(),
>>>>>>> f561d309d13228e1cb5ac9710c062e738f3c6fb4
            }).done(function(data) {
                console.log('done');
                console.log(data.comment_data);
            }).fail(function(data) {
                console.log('fail');
                console.log(data);
            })
            // $.post(
            //     "sample.php",
            //     postData,
            //     function(data) {
            //         console.log(data);
            //         alert(data);
            //     });

        // $.ajax({
        //     url: 'sample.php',
        //     type: 'GET',
        //     datatype: 'text',
        //     data: comment_data,
        // }).done(function(data) {
        //     $("<li><span class='profile'></span> : " + comment_data + "</li>").appendTo(thisParentParent);
        //     console.log(data);
        // })

        console.log(comment_data);

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