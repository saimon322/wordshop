(function($){

    var setTimeoutConst,
        delay = 200,
        headerHeight = $('.header').innerHeight();

    $("#menu-main-menu > li.menu-item:has('.sub-menu')").hover(function(){
        setTimeoutConst = setTimeout($.proxy(function(){
            let subMenu = $(this).children('.sub-menu');
            let newHeight = headerHeight + subMenu.innerHeight() - 15;
            $('.header').stop().addClass('header--on').css({"height": newHeight});
            subMenu.stop().addClass('sub-menu--active');
        },this), delay);
    },function(){
        clearTimeout(setTimeoutConst);
        $('.header').stop().removeClass('header--on').css({"height": headerHeight});
        $(this).children('.sub-menu').stop().removeClass('sub-menu--active');
    });

    $(window).on("load scroll", function(){
        if ($(document).scrollTop() > 0) {
            $(".header").addClass("header--scroll");
        } else {
            $(".header").removeClass("header--scroll");
        }
    })


    $('#dl-menu').dlmenu();
    $('.menu-icon').click(function(){
        $('.header-m').toggleClass('header-m--active');
    });

    $(".header-m").click(function(){
        $('.header-m').removeClass('header-m--active');
    })

})(jQuery);


