$(function() {
    $('.menuButton').on('click', function() {
        var menuInfo = $(this).find('.menuInfo');


        if ($(menuInfo).css('display') == 'none') {
            $(menuInfo).stop(true, true);
            $(menuInfo).show('slide', '', 250);
        } else {
            $(menuInfo).stop(true, true);
            $(menuInfo).hide('slide', '', 300);
        }
    });

});