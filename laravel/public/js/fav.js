$(function () {
    /* いいねボタンがクリックされた時の処理 */
    $('.fav_btn').on('click', function (e) {
        e.preventDefault();

        console.log('.fav_btn was clicked')
        article_id = $(this).data('articleid') // data-articleidの値を取得

        $('.fav_btn').each(function () { // data-articleidが一致する .fav_btn に適用
            if ($(this).data('articleid') == article_id) {
                /* アニメーション https://yuyauver98.me/twitter-like-animation/#_fontawesomecss */
                if ($(this).hasClass('far')) { // 中抜きハート
                    $(this).removeClass('far fav_off');
                    $(this).addClass('fas fav_on'); // 塗り潰しハート
                } else {
                    $(this).removeClass('fas fav_on')
                    $(this).addClass('far fav_off');
                }
            }
        })

        $.ajaxSetup({
            type: 'POST',
            datatype: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'favpost',
            data: { article_id: article_id }, //　{キー:記事ID}
        }).done(function (data) {
            console.log('ajax done');
        }).fail(function (data) {
            console.log('ajax failed');
        })
    })
})
