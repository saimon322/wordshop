(function($){

  $("#date").inputmask({
    "mask": "d.m.y",
    placeholder: 'ДД.ММ.ГГГГ',
  });

  $("#phone").inputmask({
    "mask": "+7 (999) 999 - 99 - 99",
    placeholder: '+7 (___) ___ - __ - __',
  });

  $("#phone-contact").inputmask({
    "mask": "+7 (999) 999 - 99 - 99",
    placeholder: '+7 (___) ___ - __ - __',
  });

})(jQuery);
