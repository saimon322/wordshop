(function($){



$(window).scroll(function(){

if( $('.program').length != 0 ) {

  console.log($('.description-pr').offset().top - $(window).scrollTop() <= 200)

  if($('.program').offset().top - $(window).scrollTop() <= 84 ) {
    $('.teachers-pr').addClass('teachers-pr--active');
  }else {
    $('.teachers-pr').removeClass('teachers-pr--active');
  }

  if($('.works').offset().top - $(window).scrollTop() <= 593 ) {
    $('.teachers-pr').addClass('teachers-pr--active-bt');
  }else {
    $('.teachers-pr').removeClass('teachers-pr--active-bt');
  }

  if( $('.description-pr').offset().top - $(window).scrollTop() <= 400 ) {
    $('.description-pr').addClass('description-pr--active');
  }else {
    $('.description-pr').removeClass('description-pr--active');
  }

  if( $('.rules').offset().top - $(window).scrollTop() <= 600 ) {
    $('.rules').addClass('rules--active');
  }else {
    $('.rules').removeClass('rules--active');
  }

  if( $('.reviews').offset().top - $(window).scrollTop() <= 200 ) {
    $('.reviews').addClass('reviews--active');
  }else {
    $('.reviews').removeClass('reviews--active');
  }


}

});


})(jQuery)
