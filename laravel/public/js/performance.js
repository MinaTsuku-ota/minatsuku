$(function () {
    //全体エリアの定義
    var $space = $('#space');
    var space_position = $space.offset();

    //プロフィールエリアの定義
    var $profile = $('#profile_js');
    var profile_position = $profile.position();

    //表示エリアの定義
    var $area = $('#area_js');
    var area_position = $area.offset();

    //表示位置の計算
    var top = area_position.top;
    var left = area_position.left;

    //境界線の定義
    var scroll_border = top - $(window).height();

    //画像オブジェクトの生成
    var jellyfish = new Image(70, 100);
    jellyfish.src = '/image/manager.png';

    //投稿数の取得
    var post_num = $('#post_js').text();
    post_num = parseInt(post_num, 10);

    //いいね数の取得
    var good_num = $('#good_js').text();
    good_num = parseInt(good_num, 10);
    var good_num_param = good_num / 10;

    //ジャンプアニメーションで使う切り替え用flag
    var flag = false;

    //投稿数に応じた画像の表示
    for (var i = 0; i < post_num; i++) {
        $area.append('<div class="jelly"></div>').find('.jelly').html(jellyfish);
    };

    //いいね数に応じてprofileの色を変える
    $profile.css({
        'background-color': CC(Math.floor(good_num_param))
    });

    //ドラッグ可能にするjQuery.UI
    $('.jelly').draggable({
        scroll: false,
    });

    //個別設定
    $('.jelly').each(function () {
        //表示位置の設定
        var index = $(this).index();
        $(this).offset({
            top: 110 + Math.random() * 20,
            left: left + index * 60
        });

        //いいね数に応じてサイズを変える
        // $(this).find('img').css({
        //     'height': 30 * good_num_param + Math.random(),
        //     'width': 20 * good_num_param + Math.random()
        // });

        //表示速度をバラバラにする
        $(this).fadeIn(1000 * Math.random() * 5);

        //初期ジャンプアニメーションの発火
        up($(this), 0.5);

    });

    //クリック時破裂
    $('.jelly').on('click', function () {

        $(this).stop(true).animate({
            top: '+=0px'
        }, 0).animate({
            top: '-=500px',
            left: '+=' + (Math.floor(Math.random() * 500) - 100) + 'px'
        }, 1500);

        $(this).effect('explode', '', 1000);
    })

    //画面トップでスクロール時にアニメーション発火
    $(window).scroll(function () {
        if (space_position.top > $(window).scrollTop() && flag === false) {
            flag = true;
            $('.jelly').each(function () {
                up($(this), Math.random() * 5);
            });
        } else if (space_position.top < $(window).scrollTop() && flag === true) {
            flag = false;
        };
    })

    //色関数
    function CC(num) {
        var color;
        switch (num) {
            case 0:
                color = '#FFFFFF';
                break;
            case 1:
                color = '#FFE4E1';
                break;
            case 2:
                color = '#FFFACD';
                break;
            case 3:
                color = '#FFE4C4';
                break;
            case 4:
                color = '#66CDAA';
                break;
            case 5:
                color = '#87CEEB';
                break;
            case 6:
                color = '#1E90FF';
                break;
            case 7:
                color = '#6A5ACD';
                break;
            default:
                color = '#000000';
                break;
        };
        return color;
    };

    //アニメーションの繰り返し処理
    function up(is, num) {
        for (var i = 0; i < 5; i++) {
            is.animate({
                top: '+=0px'
            }, 1000 + num * 700).animate({
                top: '-=15px'
            }, 250).animate({
                top: '+=15px'
            }, 500);
        };
    };
});

//.position()は親要素から見た座標
//.offset()はdocumentから見た座標
