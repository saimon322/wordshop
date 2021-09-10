(function ($) {

    var reviews = new Swiper('.reviews-slider__container', {
        pagination: '.reviews-slider__pagination',
        paginationClickable: true,
        nextButton: '.reviews-slider__next',
        prevButton: '.reviews-slider__prev',
        loop: true,
        autoplay: 3000,
        slidesPerView: 3,
        spaceBetween: 40,
        breakpoints: {
            767: {
                slidesPerView: 1,
                spaceBetweenSlides: 10
            },
            1199: {
                slidesPerView: 2,
                spaceBetweenSlides: 30
            }
        }
    });

    var page = new Swiper('.page-slider__container', {
        pagination: '.page-slider__pagination',
        paginationClickable: true,
        nextButton: '.page-slider__next',
        prevButton: '.page-slider__prev',
        loop: true,
        autoplay: 3000,
    });

    // Only mobile works slider
    const breakpoint = window.matchMedia('(min-width:768px)');
    var works;

    const breakpointChecker = function () {
        // if larger viewport and multi-row layout needed
        if (breakpoint.matches === true) {
            // clean up old instances and inline styles when available
            if (works !== undefined) works.destroy(true, true);
            // or/and do nothing
            return;
            // else if a small viewport and single column layout needed
        } else if (breakpoint.matches === false) {
            // fire small viewport version of swiper
            return enableSwiper();
        }
    };

    const enableSwiper = function () {
        works = new Swiper('.works-slider__container', {
            loop: true,
            slidesPerView: 1,
            pagination: '.works-slider__pagination',
            paginationClickable: true,
        });
    };

    breakpointChecker();
    breakpoint.addListener(breakpointChecker);

    var partners = new Swiper('.slider-partners__container', {
        pagination: '.slider-partners__pagination',
        paginationClickable: true,
        nextButton: '.slider-partners__next',
        prevButton: '.slider-partners__prev',
        loop: true,
        autoplay: 3000,
        slidesPerView: 6,
        spaceBetween: 30,
        breakpoints: {
            // when window width is <= 320px
            460: {
                slidesPerView: 1,
                spaceBetweenSlides: 0
            },
            600: {
                slidesPerView: 2,
                spaceBetweenSlides: 10
            },
            992: {
                slidesPerView: 3,
                spaceBetweenSlides: 10
            },
            1260: {
                slidesPerView: 4,
                spaceBetweenSlides: 10
            }
        }
    });

    var banner = new Swiper('.slider-banner__container', {
        pagination: '.slider-banner__pagination',
        paginationClickable: true,
        loop: true,
        autoplay: 3000
    });

    var number = new Swiper('.slider-num__container', {
        pagination: '.slider-num__pagination',
        paginationClickable: true,
        nextButton: '.slider-num__next',
        prevButton: '.slider-num__prev',
        loop: true,
        autoplay: 3000,
        slidesPerView: 3,
        spaceBetween: 0,
        onSlideChangeEnd: function () {
            $('.slider-num__number').spincrement({
                from: 0,
                duration: 2000,
                leeway: 0
            });
        },
        breakpoints: {
            // when window width is <= 320px
            500: {
                slidesPerView: 1,
                spaceBetweenSlides: 0
            },
            992: {
                slidesPerView: 2,
                spaceBetweenSlides: 10
            }
        }
    });

    var rent = new Swiper('.slider-rent__container', {
        pagination: '.slider-rent__pagination',
        paginationClickable: true,
    });

    var rentA = new Swiper('.slider-rent__container--a', {
        pagination: '.slider-rent__pagination--a',
        paginationClickable: true,
    });
    var rentB = new Swiper('.slider-rent__container--b', {
        pagination: '.slider-rent__pagination--b',
        paginationClickable: true,
    });

    var rentC = new Swiper('.slider-rent__container--c', {
        pagination: '.slider-rent__pagination--c',
        paginationClickable: true,
    });

})(jQuery);
