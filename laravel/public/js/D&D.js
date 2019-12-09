$(function(){

    //.imageTextとinputの変数宣言
    var imageArea = $('.imageText'),
        imageInput = $('.imageInput'),
        imageOutput = $('.input_span');

    var span_num = 0;

    //D&Dエリアをクリックしたらinputクリック
    imageArea.each(function(){
        imageArea.on('click',function(e){
            e.preventDefault();

            var name_num = $(this).parent().find('input').attr('name');

            if(name_num == 'file0'){
                span_num = 0;
            }else if(name_num == 'file1'){
                span_num = 1;
            }else if(name_num == 'file2'){
                span_num = 2
            };

            console.log(span_num);
            $(this).parent().find('input').click();
        });
    });

    //inputに画像が読み込まれたら
    imageInput.on('change',function(ev){
        checkFiles(ev.target.files);
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

        var image = new Image(),
            blobURL = URL.createObjectURL(blob);

        image.src = blobURL;

        $(image).on('load',function(){

            URL.revokeObjectURL(blobURL);
            
            imageOutput.eq(span_num).find('.imageText').html(image);
        });

        console.log(blobURL);

    }

})