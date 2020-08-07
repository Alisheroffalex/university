$('.mobile-slider-news').slick({
    mobileFirst: true,
    slidesToShow: 1.2,
    slidesToScroll: 1,
    speed: 500,
    autoplay: true,
    infinite: false,
    swipeToSlide: true,
    arrows: false,
    variableWidth: false,
    responsive: [
        {
            breakpoint: 2000,
            settings: "unslick"
        },
        {
            breakpoint: 1600,
            settings: "unslick"
        },
        {
            breakpoint: 1024,
            settings: "unslick"
        },
        {
            breakpoint: 992,
            settings: {
                speed: 500,
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.card-list').slick({
    mobileFirst: true,
    slidesToShow: 1.4,
    slidesToScroll: 1,
    speed: 500,
    autoplay: true,
    swipeToSlide: true,
    infinite: false,
    arrows: false,
    variableWidth: false,
    responsive: [
        {
            breakpoint: 2000,
            settings: "unslick"
        },
        {
            breakpoint: 1600,
            settings: "unslick"
        },
        {
            breakpoint: 1024,
            settings: "unslick"
        },
        {
            breakpoint: 992,
            settings: {
                speed: 500,
                autoplay: true,
                slidesToShow: 1.1,
                slidesToScroll: 1
            }
        }
    ]
});
