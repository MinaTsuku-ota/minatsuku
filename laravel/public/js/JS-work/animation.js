var axis = anime({
    targets: '#axis .el',
    translateX: anime.stagger(10, { grid: [14, 5], from: 'center', axis: 'x' }),
    translateY: anime.stagger(10, { grid: [14, 5], from: 'center', axis: 'y' }),
    rotateZ: anime.stagger([0, 90], { grid: [14, 5], from: 'center', axis: 'x' }),
    delay: anime.stagger(200, { grid: [14, 5], from: 'center' }),
    easing: 'easeInOutQuad'
});