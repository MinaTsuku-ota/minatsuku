//animeを許可
$(function() {

    console.log(anime.easing);

    $('.square').each(function() {

        $(this).on('click', function() {
            anime({
                targets: (this),
                translateX: [300, 300, 0, 0],
                translateY: [0, 300, 300, 0],
                duration: 1000 * ($(this).index()) + 3000,
                backgroundColor: '#f00',
                borderRadius: ['0%', '30%', '0%', '30%', '0%', '50%'],
                scale: 2,
                rotate: '10turn',
                direction: 'alternate',
                complete: function() {
                    $('#message').text("Animation Completed!");
                }
            });
        });
    })
});
$(function() {

    var svgAttributes = anime({
        targets: ['#svgAttributes polygon', 'feTurbulence', 'feDisplacementMap'],
        points: '64 128 8.574 96 8.574 32 64 0 119.426 32 119.426 96',
        baseFrequency: 0,
        scale: 1,
        direction: 'alternate',
        easing: 'easeInOutExpo'
    })
});

// $(function() {

//     var myObject = {
//         prop1: 0,
//         prop2: '0%'
//     }

//     var js_object = anime({
//         targets: myObject,
//         prop1: 50,
//         prop2: '100%',
//         easing: 'linear',
//         round: 1,
//         update: function() {
//             var el = $('#js_object');
//             el.html(JSON.stringify(myObject));
//         }
//     })

// })