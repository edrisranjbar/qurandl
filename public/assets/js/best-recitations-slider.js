document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('.splide', {
        drag: 'free',
        perPage: 4,
        direction: 'rtl',
        gap: '16px',
        updateOnMove: true,
        mediaQuery: 'min',
        breakpoints: {
            672: {
                perPage: 6,
            },
            1024: {
                perPage: 4,
            },
        },
    });
    splide.mount();
});