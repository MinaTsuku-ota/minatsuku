$(function(){

    //.imageTextとinputの変数宣言
    var imageArea = $('.imageText'),
        imageInput = $('.imageInput'),
        imageOutput = $('.input_span');

    //修正をかけたいグローバル変数（要素番号用）
    var span_num = 0;

    //各imageAreaに関数を反映
    imageArea.each(function(){
        
        // ----------D&Dぞーん----------

        imageArea.on('dragover',function(ev){
            ev.preventDefault();
            ev.stopPropagation();

            //dataTransferがJQOによって使えないので.originalEventとして使えるようにする
            var drag_ev = ev;
            if(ev.originalEvent){
                drag_ev = ev.originalEvent;
            }

            drag_ev.dataTransfer.dropEffect = 'copy';

            $(this).addClass('dropCSS');
        });

        imageArea.on('dragleave',function(ev){
            ev.preventDefault();
            ev.stopPropagation();

            $(this).removeClass('dropCSS');
        })

        imageArea.on('dragenter',function(ev){
            ev.preventDefault();
            ev.stopPropagation();
        });

        imageArea.on('drop',function(ev){
            ev.preventDefault();
            ev.stopPropagation();

            var data = $(ev).get()[0].files;

            //dataTransferがJQOによって使えないので.originalEventとして使えるようにする
            var files = ev.originalEvent.dataTransfer.files;

            data = files;

            //要素番号をグローバル変数に格納
            var name_num = $(this).parent().find('input').attr('name');

            if(name_num == 'file0'){
                span_num = 0;
            }else if(name_num == 'file1'){
                span_num = 1;
            }else if(name_num == 'file2'){
                span_num = 2
            };

            checkFiles(data);
            console.log(data);
        });

        // ----------Clickぞーん----------

        imageArea.hover(
            function(){
                $(this).addClass('mouseCSS');
        },
            function(){
                $(this).removeClass('mouseCSS');
        });

        imageArea.on('click',function(e){
            //初期動作の"#"を止める
            e.preventDefault();

            //要素番号をグローバル変数に格納
            var name_num = $(this).parent().find('input').attr('name');

            if(name_num == 'file0'){
                span_num = 0;
            }else if(name_num == 'file1'){
                span_num = 1;
            }else if(name_num == 'file2'){
                span_num = 2
            };

            $(this).parent().find('input').click();
        });
    });

    //inputに画像が読み込まれたら
    imageInput.on('change',function(ev){
        checkFiles(ev.target.files);
        console.log(ev.target.files);
    });

    //画像の拡張子とファイルサイズを調べる
    function checkFiles(files){
        var file = files[0];

        if(!file || file.type.indexOf('image/') < 0){
            alert('画像形式が異なります!');
        };
        
        outputImage(file);
    };

    //読み込んだ画像を出力
    function outputImage(blob){
        //空のimageインスタンスと、fileからURLを取得するためにバイナリオブジェクトの生成
        var image = new Image(),
            blobURL = URL.createObjectURL(blob);

        image.src = blobURL;

        $(image).on('load',function(){
            //必ず解放してあげないといけない
            URL.revokeObjectURL(blobURL);
            
            //要素番号が取得できなかったのでグローバル変数を用いてdivタグにぶちこんでみた
            imageOutput.eq(span_num).find('.imageText').html(image);
        });
    };


});

// メモ:
// preventDefault() は、その要素のイベントをキャンセル
// stopPropagation()は、親要素への伝播をキャンセル