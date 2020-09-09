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
    $('html').addClass('scroll-lock');
    $('#overlay').click(function () {
        $('.search-div').removeClass('active');
        $('#overlay').removeClass('active');
        $('.burger-wrapper').removeClass('active');
        $('html').removeClass('scroll-lock');
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
$('.menu-mobile  .menu-item-has-children a').on('click', function (event) {
    event.preventDefault();
    $(this).parent().find('.dropdown-menu').first().toggleClass('dropdown-open');
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


function toggleClass(element, newClass) {
    if (element) element.classList.toggle(newClass)
    return;
}



function tabInit(tabWrapper, number) {
    let wrapper = document.querySelector(tabWrapper);
    let controllers = wrapper.querySelectorAll('.tabs-controller');
    let activeIndex = (number) ? number : 0;
    let tabs = wrapper.querySelectorAll('.tab');

    tabs.forEach(item => {
        if(item.classList.contains('active')) {
            item.classList.remove('active');
        }
    });

    controllers.forEach(item => {
        if(item.classList.contains('active')) {
            item.classList.remove('active');
        }
    });

    controllers[activeIndex].classList.add('active');
    tabs[activeIndex].classList.add('active');
}

document.querySelectorAll('.sp-link').forEach(element => { 
    element.addEventListener('click',function (e) {
        e.preventDefault();
        document.querySelector('#special-accessibility').classList.toggle('active');
        document.querySelector('html').classList.toggle('scroll-lock');
    });
});
$('body').click(function (event) {
    if(!$(event.target).closest('#special-accessibility').length && !$(event.target).is('#special-accessibility') && !$(event.target).closest('.sp-link').length && !$(event.target).is('.sp-link')) {
        $("#special-accessibility").removeClass('active');
        $('html').removeClass('scroll-lock');
    }     
});

$('#special-accessibility input').on('change', function () {
    if(this.name == 'font-size') {
        $('html').attr('data-font-size', this.value);
        Cookies.set('data-font-size', this.value , { expires: 7 });
    } 
    if(this.name == 'letter-spacing') {
        $('html').attr('data-letter-spacing', this.value);
        Cookies.set('data-letter-spacing', this.value, { expires: 7 });
    }
    if(this.name == 'removeColors') {
        if($(this).is(':checked')) {
            $('html').attr('data-remove-colors', 'on');
            Cookies.set('data-remove-colors', 'on', { expires: 7 });
        } else {
            $('html').attr('data-remove-colors', 'off');
            Cookies.set('data-remove-colors', 'off', { expires: 7 });
        }
    }
})
$('#reset-access').on('click', function(event) {
    event.preventDefault();
    Cookies.remove('data-font-size');
    Cookies.remove('data-letter-spacing');
    Cookies.remove('data-remove-colors');
    location.reload();
})