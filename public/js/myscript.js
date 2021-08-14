$('.owl-carousel.banner').owlCarousel({
    loop: true,
    dots: true,
    margin: 10,
    autoplay: true,
    autoplaySpeed: 1500,
    autoplayTimeout: 3500,
    autoplayHoverPause: true,
    slideTransition: 'linear',
    responsive:{
0:{
    items:1
},
600:{
    items:1
},
1000:{
    items:1
}
}
});
$('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
});

$('.owl-carousel.laris').owlCarousel({
        loop: true,
        dots: true,
        margin: 10,
        autoplay: false,
        autoplaySpeed: 5000,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        responsive:{
    0:{
        items:2
    },
    600:{
        items:3
    },
    1000:{
        items:5
    }
    }
    });

    $('.owl-carousel.promo').owlCarousel({
        loop: true,
        dots: true,
        margin: 10,
        autoplay: false,
        autoplaySpeed: 5000,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        responsive:{
    0:{
        items:2
    },
    600:{
        items:3
    },
    1000:{
        items:5
    }
    }
    });

    $('.owl-carousel.rekomen').owlCarousel({
        dots: true,
        margin: 10,
        responsive:{
    0:{
        items:1
    },
    600:{
        items:2
    },
    1000:{
        items:3
    }
    }
    });