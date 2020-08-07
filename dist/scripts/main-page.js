$(".header-carousel").slick({
    dots: true,
    infinite: false,
    speed: 500,
    fade: true,
    // autoplay: true,
    cssEase: 'linear',
    arrows: true,
    dotsClass: 'slick-dots',
    prevArrow: '.h-carousel-prev',
    nextArrow: '.h-carousel-next'
});
$(".f-carousel").slick({
    dots: false,
    infinite: true,
    speed: 500,
    autoplay: true,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    variableWidth: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                variableWidth: false,
                slidesToScroll: 1
            }
        },
    ]
});
$('.search').click(function (event) {
    event.preventDefault();
    $('.search-div').addClass('active');
    $('.burger-wrapper').addClass('active');
    $('#overlay').addClass('active');
    $('#overlay').click(function () {
        $('.search-div').removeClass('active');
        $('#overlay').removeClass('active');
        $('.burger-wrapper').removeClass('active');
    });
});
$('.burger-toggle').click(function () {
    $('.burger-wrapper').addClass('active');
    $('.navbar').addClass('active');
    $('.menu-mobile').addClass('active');
});
$('.burger-close').click(function () {
    $('.burger-wrapper').removeClass('active');
    if ($(window).scrollTop() <= 30) {
        $('.navbar').removeClass('active');
    }
    $('.menu-mobile').removeClass('active');
    $('.burger-wrapper').removeClass('active');
    $('.search-div').removeClass('active');
    $('#overlay').removeClass('active');
});
$('.mobile-ul-menu li i').on('click', function () {
    $(this).parent().find('.dropdown-menu').first().toggleClass('dropdown-open');
    $('.dropdown-menu li').on('click', function () {
        $(this).find('.dropdown-menu').first().toggleClass('dropdown-open');
    });
});
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 30) {
        $(".navbar").addClass("active");
    }
    else {
        if (!$('.menu-mobile').hasClass('active')) {
            $(".navbar").removeClass("active");
        }
    }
});
$('.f-navigation .small-header').on('click', function () {
    $(this).parent().toggleClass('active');
});
