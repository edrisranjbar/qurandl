document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('.splide#best-recitations-slider', {
        type: 'loop',
        perPage: 'auto',
        direction: 'rtl',
        gap: '42px',
        arrows: false,
        pagination: false,
        perMove: 1,
        snap: true,
        omitEnd: true,
        breakpoints: {
            
        }

    });
    splide.mount();
});