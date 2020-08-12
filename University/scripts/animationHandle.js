$(document).ready(function () {
    var TL = new TimelineMax({ paused: true });
    var controller = new ScrollMagic.Controller();
    var mainNews = new TimelineMax();
    var university = new TimelineMax();
    var facultets = new TimelineMax();
    var services = new TimelineMax();
    var news = new TimelineMax();
    var navbar = $('.navbar');
    var animationSpeed = 0.75;
    var animationTimingIn = Expo.easeIn;
    var animationTimingOut = Expo.easeOut;
    sizeIt();
    var mainNewsWrapper = $('.main-news');
    var header = mainNewsWrapper.find('.header');
    var hr = mainNewsWrapper.find('hr');
    var cat_links = $('.category-panel li a:not(".dropdown a")');
    var cards = mainNewsWrapper.find('.card');
    var universitySection = $('.about-university');
    var uniHeader = universitySection.find('.header');
    var unihr = universitySection.find('hr');
    var uniText = universitySection.find('.text');
    var uniBtn = universitySection.find('.btn');
    var uniImg = universitySection.find('.university-img');
    var facultySection = $('.faculty');
    var facHeader = facultySection.find('.header');
    var fachr = facultySection.find('hr');
    var facCards = facultySection.find('.faculty-box');
    var servicesSection = $('.services');
    var serHeader = servicesSection.find('.header');
    var serhr = servicesSection.find('hr');
    var serCards = servicesSection.find('.service-box');
    var newsSection = $('.news');
    var newsHeader = newsSection.find('.header');
    var newshr = newsSection.find('hr');
    var newsCardBig = newsSection.find('.card');
    var newsCards = newsSection.find('.card-type-2');
    TL.fromTo(navbar, animationSpeed, { y: '-150%', opacity: 0, ease: animationTimingIn }, { y: '0%', opacity: 1, ease: animationTimingOut });
    TL.play();
    mainNews.fromTo(header, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }).fromTo(hr, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.58');
    var i = 0;
    while (i < cat_links.length) {
        mainNews.fromTo(cat_links[i], animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.69');
        i++;
    }
    mainNews.fromTo(cards, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.4');
    new ScrollMagic.Scene({
        triggerElement: '.a-content',
        triggerHook: 0.4
    })
        .setTween(mainNews)
        .reverse(false)
        .addTo(controller);
    university.fromTo(universitySection, .8, { x: '-100%', ease: animationTimingIn }, { x: '0%', ease: animationTimingOut }).fromTo(uniHeader, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }).fromTo(unihr, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.6').fromTo(uniText, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.6').fromTo(uniBtn, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.6').fromTo(uniImg, animationSpeed, { scaleX: .8, scaleY: .8, opacity: 0, ease: animationTimingIn }, { scaleX: 1.1, scaleY: 1.1, opacity: 1, ease: animationTimingOut }, '-=.6');
    new ScrollMagic.Scene({
        triggerElement: '.about-university',
        triggerHook: 0.6
    })
        .setTween(university)
        .reverse(false)
        .addTo(controller);
    facultets.fromTo(facHeader, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }).fromTo(fachr, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.5');
    var l = 0;
    while (l < facCards.length) {
        facultets.fromTo(facCards[l], animationSpeed, { y: 40, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.69');
        l++;
    }
    new ScrollMagic.Scene({
        triggerElement: '.faculty',
        triggerHook: 0.4
    })
        .setTween(facultets)
        .reverse(false)
        .addTo(controller);
    services.fromTo(serHeader, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }).fromTo(serhr, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.5');
    var l = 0;
    while (l < serCards.length) {
        services.fromTo(serCards[l], animationSpeed, { y: 40, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.69');
        l++;
    }
    new ScrollMagic.Scene({
        triggerElement: '.services',
        triggerHook: 0.5
    })
        .setTween(services)
        .reverse(false)
        .addTo(controller);
    news.fromTo(newsHeader, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }).fromTo(newshr, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.5').fromTo(newsCardBig, animationSpeed, { y: 10, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.5');
    var l = 0;
    while (l < newsCards.length) {
        news.fromTo(newsCards[l], animationSpeed, { y: 40, opacity: 0, ease: animationTimingIn }, { y: 0, opacity: 1, ease: animationTimingOut }, '-=.69');
        l++;
    }
    new ScrollMagic.Scene({
        triggerElement: '.news',
        triggerHook: 0.6
    })
        .setTween(news)
        .reverse(false)
        .addTo(controller);
});
function sizeIt() {
    w = window.innerWidth;
    if (w < 992) {
        controller.destroy(true);
    }
}
window.addEventListener("resize", sizeIt);
