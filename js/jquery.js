$(function(){
    $('.p-2').each(function(){
        var a = $(this);
        var contents = $('.homeMainContents');
    //ナビゲーションをクリックするとメインコンテンツのバッグから―を変更
        a.click(function(){
            contents.removeClass('contents web graphic movie');
            // contents.removeClass('web');
            // contents.removeClass('graphic');
            // contents.removeClass('movie');
            contents.addClass($(this).attr('id'));
        });
    });
});