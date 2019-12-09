$(function(){
    //ログインボタンをクリック
    $('#login_button').click(function(){
        //login_hiddenをJQO化
        var $login = $('#login_hidden');
        //位置情報を取得
        var offset = $('#login_button').offset();
        $login.css('left',offset.left - 80);

        $login.toggleClass('show');
        if($login.hasClass('show')){
            $login.stop(true).animate({
                top:offset.top + 25,
                left:offset.left - 80
            });
        }else{
            $login.stop(true).animate({
                top:'-152px'
            })
        };
    });
});