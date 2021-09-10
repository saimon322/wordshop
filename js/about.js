(function ($) {
    $(window).on("load scroll", function () {
        if ($('.partners--page').length != 0) {
            var partnersHeight = $('.partners').offset().top - $(window).scrollTop();
            if (partnersHeight <= 500) {
                $('.partners')
                    .addClass('partners--active');
            } else {
                $('.partners')
                    .removeClass('partners--active');
            }
        };
        if ($('.ten-reasons__item').length != 0) {
            $.each($('.ten-reasons__item'), function (i, elem) {
                var $elem = $(elem);
                if ($elem.offset().top - $(window).scrollTop() <= 650) {
                    $elem.addClass('ten-reasons__item--active');
                } else {
                    $elem.removeClass('ten-reasons__item--active');
                }
            });
        }
    });
})(jQuery)
