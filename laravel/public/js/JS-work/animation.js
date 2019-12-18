$(function() {

    console.log(anime.easing);

    $('.square').each(function() {

        $(this).on('click', function() {
            anime({
                targets: (this),
                translateX: 250,
                duration: 3000,
                backgroundColor: '#f00',
                borderRadius: ['0%', '50%'],
                scale: 2,
                rotate: '1turn'
            });
        });
    })
});