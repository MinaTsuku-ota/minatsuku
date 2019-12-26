/*
 * バブリング参考(stopPropagation、preventDefault)
 * https://www.tam-tam.co.jp/tipsnote/javascript/post5050.html
 *
 * 拡張子チェック参考
 * https://stackoverflow.com/questions/651700/how-to-have-jquery-restrict-file-types-on-upload
 *
 * プレビュー表示参考
 * https://qiita.com/kon_yu/items/f98df7ac826e7c36cc6c
 *
 * 縦横サイズチェック参考
 * https://qiita.com/zenpou/items/4b1a0946b120fecd4494
 */

$(function () {
    /*** ファイルドロップ時の処理 ***/
    $('.imageText').on('drop', function (e) {
        console.log('dropped');
        e.stopPropagation();
        e.preventDefault();

        // ドロップしたエリアの(兄弟要素である)input:fileのid値を得る
        var input_id = $(this).siblings('input:file')[0].id;

        // input:fileにファイルデータを入力
        $('#' + input_id)[0].files = e.originalEvent.dataTransfer.files;
        // console.log($('#' + input_id)[0].files);
        $('#' + input_id).change(); // changeイベントの強制発火
    });

    /*** クリック時の処理 ***/
    $('.imageText').on('click', function (e) {
        console.log('clicked');
        e.stopPropagation();
        e.preventDefault();

        // clickイベント発火（デフォルト動作）、データが入力されたらchangeイベント発火
        $(this).siblings('input:file').click();
    });

    /*** inputにデータが入力された時の処理 ***/
    $('.imageInput').on('change', function (e) {
        console.log('changed');
        console.log($(this)[0].files[0]);
        // console.log($(this)[0].files);
        // console.log($(this).val());

        /** バリデーション等 **/
        /* 拡張子チェック */
        var ext = $(this).val().split('.').pop().toLowerCase();
        console.log(ext);
        // if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
        //     $(this).val(''); // inputのデータを消去
        //     alert('許可されていない拡張子です( ᐪᐤᐪ )');
        // }

        /* 画像ファイルチェック */
        if ($(this)[0].files[0].type.indexOf('image')) {
            $(this).val(''); // inputのデータを消去
            alert('画像ファイルじゃないよ( ᐪᐤᐪ )');
        } else {
            /* 画像プレビュー */
            image = new Image();
            image.src = URL.createObjectURL($(this)[0].files[0]);
            image.onload = function () {
                if(image.naturalHeight > image.naturalWidth){
                    console.log('height');
                }else{
                    console.log('width');
                    console.log($(this).parent());
                }
            }
        }
    });

    /* form以外でファイルがドロップされた場合、ブラウザで画像を開いてしまうのを防ぐ */
    $(document).on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });
    $(document).on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });
    // $(document).on('dropleave', function (e) {
    // });
    $(document).on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

});
