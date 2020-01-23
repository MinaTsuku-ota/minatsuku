$(window).on('load', function() {
    const loaded = $('#loading');
    setTimeout(function() {
        loaded.addClass('loaded');
    }, 500);
});