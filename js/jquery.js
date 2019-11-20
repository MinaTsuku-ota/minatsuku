$(function(){
    $('.p-2').each(function(){
        var a = $(this);
        var contents = $('.homeMainContents');
    //ナビゲーションをクリックするとメインコンテンツのバッグから―を変更
        a.click(function(){
            contents.removeClass('contents web graphic movie');
            contents.addClass($(this).attr('id'));
        });
    });
});