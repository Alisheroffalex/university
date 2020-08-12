$(document).ready(()=> {
    let TL = new TimelineMax({ paused: true });
    let controller = new ScrollMagic.Controller();
    let mainNews = new TimelineMax();
    let university = new TimelineMax();
    let facultets = new TimelineMax();
    let services = new TimelineMax();
    let news = new TimelineMax();

    let navbar = $('.navbar');
    let animationSpeed = 0.75;
    let animationTimingIn = Expo.easeIn;
    let animationTimingOut = Expo.easeOut;

    sizeIt()

    let mainNewsWrapper = $('.main-news');
    let header = mainNewsWrapper.find('.header');
    let hr = mainNewsWrapper.find('hr');
    
    let cat_links = $('.category-panel li a:not(".dropdown a")');
    let cards = mainNewsWrapper.find('.card');

    let universitySection = $('.about-university');
    let uniHeader = universitySection.find('.header');
    let unihr = universitySection.find('hr');
    let uniText = universitySection.find('.text');
    let uniBtn = universitySection.find('.btn');
    let uniImg = universitySection.find('.university-img');

    let facultySection = $('.faculty');
    let facHeader = facultySection.find('.header');
    let fachr = facultySection.find('hr');
    let facCards = facultySection.find('.faculty-box');

    let servicesSection = $('.services');
    let serHeader = servicesSection.find('.header');
    let serhr = servicesSection.find('hr');
    let serCards = servicesSection.find('.service-box');

    let newsSection = $('.news');
    let newsHeader = newsSection.find('.header');
    let newshr = newsSection.find('hr');
    let newsCardBig = newsSection.find('.card');
    let newsCards = newsSection.find('.card-type-2');

    TL.fromTo(
        navbar, 
        animationSpeed, 
        {y: '-150%', opacity: 0, ease: animationTimingIn}, 
        {y: '0%', opacity: 1, ease: animationTimingOut}
    )

    TL.play();

    mainNews.fromTo(
        header,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut }
    ).fromTo(
        hr,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.58'
    )
    
    let i: number = 0;
    
    while (i < cat_links.length) {
        mainNews.fromTo(
            cat_links[i],
            animationSpeed,
            { y: 10,opacity: 0, ease: animationTimingIn },
            { y: 0, opacity: 1, ease: animationTimingOut },
            '-=.69'
        )
        i++;
    }


    

    mainNews.fromTo(
        cards,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut },
        '-=.4'
    )
  

    
    new ScrollMagic.Scene({
        triggerElement: '.a-content',
        triggerHook: 0.4
    })
        .setTween(mainNews)

        .reverse(false)
        .addTo(controller)
        

    university.fromTo(
        universitySection,
        .8,
        {x: '-100%', ease: animationTimingIn},
        {x: '0%', ease: animationTimingOut}
    ).fromTo(
        uniHeader,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut }
    ).fromTo(
        unihr,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.6'
    ).fromTo(
        uniText,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.6'
    ).fromTo(
        uniBtn,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.6'
    ).fromTo(
        uniImg,
        animationSpeed,
        { scaleX: .8,scaleY: .8,opacity: 0, ease: animationTimingIn },
        { scaleX: 1.1,scaleY: 1.1,opacity: 1, ease: animationTimingOut },
        '-=.6'
    )

    new ScrollMagic.Scene({
        triggerElement: '.about-university',
        triggerHook: 0.6
    })
        .setTween(university)
    
        .reverse(false)
        .addTo(controller)

    facultets.fromTo(
        facHeader,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut }
    ).fromTo(
        fachr,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.5'
    )
    
    let l: number = 0;
    
    while (l < facCards.length) {
        facultets.fromTo(
            facCards[l],
            animationSpeed,
            { y: 40,opacity: 0, ease: animationTimingIn },
            { y: 0, opacity: 1, ease: animationTimingOut },
            '-=.69'
        )
        l++;
    }

    new ScrollMagic.Scene({
        triggerElement: '.faculty',
        triggerHook: 0.4
    })
        .setTween(facultets)
        .reverse(false)
        .addTo(controller)


    services.fromTo(
        serHeader,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut }
    ).fromTo(
        serhr,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.5'
    )
    
    let l: number = 0;
    
    while (l < serCards.length) {
        services.fromTo(
            serCards[l],
            animationSpeed,
            { y: 40,opacity: 0, ease: animationTimingIn },
            { y: 0, opacity: 1, ease: animationTimingOut },
            '-=.69'
        )
        l++;
    }

    new ScrollMagic.Scene({
        triggerElement: '.services',
        triggerHook: 0.5
    })
        .setTween(services)
        .reverse(false)
        .addTo(controller)


    news.fromTo(
        newsHeader,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0, opacity: 1, ease: animationTimingOut }
    ).fromTo(
        newshr,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.5'
    ).fromTo(
        newsCardBig,
        animationSpeed,
        { y: 10,opacity: 0, ease: animationTimingIn },
        { y: 0,opacity: 1, ease: animationTimingOut },
        '-=.5'
    )
    
    let l: number = 0;
    
    while (l < newsCards.length) {
        news.fromTo(
            newsCards[l],
            animationSpeed,
            { y: 40,opacity: 0, ease: animationTimingIn },
            { y: 0, opacity: 1, ease: animationTimingOut },
            '-=.69'
        )
        l++;
    }

    new ScrollMagic.Scene({
        triggerElement: '.news',
        triggerHook: 0.6
    })
        .setTween(news)
        .reverse(false)
        .addTo(controller)
    
})

function sizeIt() {
    w = window.innerWidth;
    if (w < 992) {
        controller.destroy(true)
    }
  }
  
  window.addEventListener("resize", sizeIt);