$(function() {
    //全体エリアの定義
    var $space = $('#space');
    var space_position = $space.offset();

    //プロフィールエリアの定義
    var $profile = $('#profile_js');
    var profile_position = $profile.position();

    //画像オブジェクトの生成
    var jellyfish = new Image();
    jellyfish.src = '/image/test4.png';

    //表示位置の計算
    var top = space_position.top + Math.random() * 900;
    var left = space_position.left + Math.random() * 900;

    //投稿数の取得
    var web_num = $('#post_js').text();
    web_num = parseInt(web_num, 10);
    console.log(web_num);

    //いいね数の取得
    var good_num = $('#good_js').text();
    good_num = parseInt(good_num, 10);
    var good_num_size = good_num / 10;
    console.log(good_num);

    //投稿数に応じた画像の表示
    for (var i = 0; i < web_num; i++) {
        $space.append('<div class="jelly"></div>').find('.jelly').html(jellyfish);
    };

    //ドラッグ可能にするjQuery.UI
    $('.jelly').draggable({
        containment: 'parent',
        scroll: false,
    });

    $('.jelly').each(function() {

        //表示位置の設定
        $(this).offset({ top: space_position.top + Math.random() * 900, left: space_position.left + Math.random() * 900 });

        //いいね数に応じてサイズを変える
        $(this).find('img').css({
            'height': 30 * good_num_size + Math.random(),
            'width': 30 * good_num_size + Math.random()
        });

        $(this).fadeIn(1000 * Math.random() + 1000);

    });

    console.log(space_position);
    console.log(profile_position);
    console.log(top, left);
});

//.position()は親要素から見た座標
//.offset()はdocumentから見た座標