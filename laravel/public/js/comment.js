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