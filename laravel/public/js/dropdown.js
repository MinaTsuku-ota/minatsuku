$(function() {
    $('.menuButton').on('click', function() {
        var menuInfo = $(this).find('.menuInfo');

        if ($(menuInfo).css('display') == 'none') {
            $(menuInfo).stop().show('slide', '', 1000);
        } else {
            $(menuInfo).stop().hide('slide', '', 1000);
        }
    });


    $('.menuButton').on('mouseleave', function() {
        $(this).find('.menuInfo').stop().hide('slide', '', 1000);
    });

    // $('.menuInfo').on('mouseleave', function() {
    //     $(this).hide('slide', '', 1000);
    // });
})