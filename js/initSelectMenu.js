(function($){

  $( ".anketa__container select" ).selectmenu();

  $(document).bind('gform_post_render', function(event, formId){
  	$( ".anketa__container select" ).selectmenu();
  });

  //$( ".sf-input-select" ).selectmenu({
  	// change: function( event, data ) {
  	// 	$(this).closest('form').submit();
   // 	}
  //});

  // select2 init




  $('.sf-input-select').select2().on("change", function(e) {
    // console.log("change val=" + e.val);
    $('.news__button').fadeOut('fast');
    $('.intensives__button').fadeOut('fast');
    $('.works__button').fadeOut('fast');
  })


  if ($('.sf-input-select').length > 0) {
    
    function repeatOften() {
      if ($(".sf-input-select").hasClass("select2-hidden-accessible")) {

      }else{
        $('.sf-input-select').select2().on("change", function(e) {
          // console.log("change val=" + e.val);
          $('.news__button').fadeOut('fast');
          $('.intensives__button').fadeOut('fast');
          $('.works__button').fadeOut('fast');
        })
      }
      globalID = requestAnimationFrame(repeatOften);
    }
    globalID = requestAnimationFrame(repeatOften);

  }

})(jQuery);