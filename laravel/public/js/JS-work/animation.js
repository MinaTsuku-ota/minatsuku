// //色変更・サイズ変更・移動
// $(function() {

//     console.log(anime.easing);

//     $('.square').each(function() {

//         $(this).on('click', function() {
//             anime({
//                 targets: (this),
//                 translateX: 250,
//                 duration: 3000,
//                 backgroundColor: '#f00',
//                 borderRadius: ['0%', '50%'],
//                 scale: 2,
//                 rotate: '1turn'
//             });
//         });
//     })
// });
//SVG Attributes
$(function() {

    anime({
        targets: ('#circle'),
        points: '64 128 8.574 96 8.574 32 64 0 119.426 32 119.426 96',
        baseFrequency: 0,
        scale: 1,
        loop: true,
        direction: 'alternate',
        easing: 'easeInOutExpo'
    });
});