$(function() {

    //.imageTextとinputの変数宣言
    var imageArea = $('.imageText'),
        imageInput = $('.imageInput'),
        imageOutput = $('.input_span');

    //修正をかけたいグローバル変数（要素番号用）
    var span_num = 0;

    //input_spanをドロップエリアとして３つに分ける
    var $Area0 = $('#Area0'),
        $Area1 = $('#Area1'),
        $Area2 = $('#Area2');

    //fileListの格納場所
    var $file0 = $Area0.find('[type=file]'),
        $file1 = $Area1.find('[type=file]'),
        $file2 = $Area2.find('[type=file]');

    //各imageAreaに関数を反映
    imageArea.each(function() {

        // ----------D&Dぞーん----------

        imageArea.on('dragover', function(ev) {
            ev.preventDefault();
            ev.stopPropagation();

            //dataTransferがJQOによって使えないので.originalEventとして使えるようにする

            ev.originalEvent.dataTransfer.dropEffect = 'copy';

            $(this).addClass('dropCSS');
        });

        imageArea.on('dragleave', function(ev) {
            ev.preventDefault();
            ev.stopPropagation();

            $(this).removeClass('dropCSS');
        })

        imageArea.on('dragenter', function(ev) {
            ev.preventDefault();
            ev.stopPropagation();
        });

    });


    imageArea.on('click', function(e) {
        //初期動作の"#"を止める
        e.preventDefault();
        e.stopPropagation();

        console.log('Click');

        //要素番号をグローバル変数に格納
        var thisParent = $(this).parent();

        // var name_num = thisParent.find('input').attr('name');

        // if (name_num == 'file0') {
        //     span_num = 0;
        // } else if (name_num == 'file1') {
        //     span_num = 1;
        // } else if (name_num == 'file2') {
        //     span_num = 2
        // };
        span_num = thisParent.index();

        console.log(span_num);
        thisParent.find('[type="file"]').click();
    });

    //inputに画像が読み込まれたら
    imageInput.on('change', function(ev) {

        var InputData = $(this).get()[0];
        console.log(InputData);

        InputData.files = ev.files;
        $(this).get()[0].files = ev.files;
        console.log(InputData.files)

        checkFiles(ev.target.files);
    });

    //画像の拡張子とファイルサイズを調べる
    function checkFiles(files) {
        var file = files[0];

        if (!file || file.type.indexOf('image/') < 0) {
            alert('画像形式が異なります!');
        };

        outputImage(file);
    };

    //読み込んだ画像を出力
    function outputImage(blob) {
        //空のimageインスタンスと、fileからURLを取得するためにバイナリオブジェクトの生成
        var image = new Image(),
            blobURL = URL.createObjectURL(blob);

        image.src = blobURL;

        $(image).on('load', function() {
            //必ず解放してあげないといけない
            URL.revokeObjectURL(blobURL);

            //要素番号が取得できなかったのでグローバル変数を用いてdivタグにぶちこんでみた
            imageOutput.eq(span_num).find('.imageText').html(image);



        });

    };




    //----------バグのためDrop処理を単体にした----------
    $Area0.on('drop', function(ev) {
        ev.preventDefault();
        var index = $(this).index();

        var files = ev.originalEvent.dataTransfer.files;

        // $('#input_file')のchangeイベントが発火
        $Area0.get()[0].files = files;

        var image = new Image(),
            blobURL = URL.createObjectURL(files[0]);

        image.src = blobURL;

        $(image).on('load', function() {
            //必ず解放してあげないといけない
            URL.revokeObjectURL(blobURL);

            imageOutput.eq(index).find('.imageText').html(image);

        });

    });
    $Area0.hover(
        function() {
            $(this).addClass('mouseCSS');
            console.log('hover');
        },
        function() {
            $(this).removeClass('mouseCSS');
        });



    $Area1.on('drop', function(ev) {
        ev.preventDefault();
        var index = $(this).index();

        var files = ev.originalEvent.dataTransfer.files;

        // $('#input_file')のchangeイベントが発火
        $Area1.get()[0].files = files;

        var image = new Image(),
            blobURL = URL.createObjectURL(files[0]);

        image.src = blobURL;

        $(image).on('load', function() {
            //必ず解放してあげないといけない
            URL.revokeObjectURL(blobURL);

            imageOutput.eq(index).find('.imageText').html(image);

        });


    });
    $Area1.hover(
        function() {
            $(this).addClass('mouseCSS');
            console.log('hover');
        },
        function() {
            $(this).removeClass('mouseCSS');
        });



    $Area2.on('drop', function(ev) {
        ev.preventDefault();
        var index = $(this).index();

        var files = ev.originalEvent.dataTransfer.files;

        // $('#input_file')のchangeイベントが発火
        $Area2.get()[0].files = files;

        var image = new Image(),
            blobURL = URL.createObjectURL(files[0]);

        image.src = blobURL;

        $(image).on('load', function() {
            //必ず解放してあげないといけない
            URL.revokeObjectURL(blobURL);

            imageOutput.eq(index).find('.imageText').html(image);

        });

    });
    $Area2.hover(
        function() {
            $(this).addClass('mouseCSS');
            console.log('hover');
        },
        function() {
            $(this).removeClass('mouseCSS');
        });


    //----------ドロップ処理ここまで----------

    //submitクリック時に無理やり取得しているfileデータをphpに飛ばす
    $('.STbtnChild').on('click', function() {

        $.ajax({
            url: 'sample.php',
            type: 'GET',
            datatype: 'json',
            data: $file0,
            $file1,
            $file2
        }).done(function(data) {
            console.log('success');
        });

        console.log($file0, $file1, $file2);
    });

});

// メモ:
// preventDefault() は、その要素のイベントをキャンセル
// stopPropagation()は、親要素への伝播をキャンセル
