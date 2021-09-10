(function ($) {

    // Share кнопки
    Share = {
        vkontakte: function (purl, ptitle, pimg, text) {
            url = 'http://vkontakte.ru/share.php?';
            url += 'url=' + encodeURIComponent(purl);
            url += '&title=' + encodeURIComponent(ptitle);
            url += '&description=' + encodeURIComponent(text);
            url += '&image=' + encodeURIComponent(pimg);
            url += '&noparse=true';
            Share.popup(url);
        },
        odnoklassniki: function (purl, text) {
            url = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
            url += '&st.comments=' + encodeURIComponent(text);
            url += '&st._surl=' + encodeURIComponent(purl);
            Share.popup(url);
        },
        facebook: function (purl, ptitle, pimg, text) {
            url = 'http://www.facebook.com/sharer.php?s=100';
            url += '&p[title]=' + encodeURIComponent(ptitle);
            url += '&p[summary]=' + encodeURIComponent(text);
            url += '&p[url]=' + encodeURIComponent(purl);
            url += '&p[images][0]=' + encodeURIComponent(pimg);
            Share.popup(url);
        },
        twitter: function (purl, ptitle) {
            url = 'http://twitter.com/share?';
            url += 'text=' + encodeURIComponent(ptitle);
            url += '&url=' + encodeURIComponent(purl);
            url += '&counturl=' + encodeURIComponent(purl);
            Share.popup(url);
        },
        mailru: function (purl, ptitle, pimg, text) {
            url = 'http://connect.mail.ru/share?';
            url += 'url=' + encodeURIComponent(purl);
            url += '&title=' + encodeURIComponent(ptitle);
            url += '&description=' + encodeURIComponent(text);
            url += '&imageurl=' + encodeURIComponent(pimg);
            Share.popup(url)
        },

        me: function (el) {
            console.log(el.href);
            Share.popup(el.href);
            return false;
        },

        popup: function (url) {
            window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
        }
    };



    $(window).load(function () {
        $(".loader").addClass("loader--ready");
    });


    $('.more-button').click(function () {
        $('.rules__item').removeClass('hidden');
    });

    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    $(window).on("load scroll", function () {
        if ($('.causes__item').length != 0) {
            $.each($('.causes__item'), function (i, elem) {
                var $elem = $(elem);
                if ($elem.offset().top - $(window).scrollTop() <= 650) {
                    $elem.addClass('causes__item--active');
                } else {
                    $elem.removeClass('causes__item--active');
                }
            });
        }
    });

})(jQuery);
