document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('.splide#best-recitations-slider', {
        type: 'loop',
        perPage: 'auto',
        direction: 'rtl',
        gap: '42px',
        pagination: false,
        arrows: false,
        perMove: 1,
        omitEnd: true,
        padding: { right: '20px' }
    });
    splide.mount();
});