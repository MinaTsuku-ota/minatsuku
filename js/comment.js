$(function(){
    var duration = 300;

    //全てのコメント要素に関数を反映
    $('.comment-button').each(function(){

        //クリック時
        $(this).click(function(){

            //コメント内容の要素をJQOにする
            var $comment = $(this).parent().next('.comment-none');

            //開閉処理
            $comment.toggleClass('open');
            if($comment.hasClass('open')){
                $comment.fadeIn(duration);
            }else{
                $comment.fadeOut(duration);
            };

        });
    });
});