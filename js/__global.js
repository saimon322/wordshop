;(function ($) {

$(document).ready(function() {

    //Remove placeholder on click
    $("input, textarea").each(function() {
		$(this).data('holder',$(this).attr('placeholder'));

		$(this).focusin(function(){
			$(this).attr('placeholder','');
		});

		$(this).focusout(function(){
			$(this).attr('placeholder',$(this).data('holder'));
		});
    });

	//Disable search button
	$('#searchsubmit').attr('disabled', true);
	$('#s').keyup(function() {
		if($(this).val().length != 0)
			$('#searchsubmit').attr('disabled', false);
		else
			$('#searchsubmit').attr('disabled', true);
	});



	console.log('global')

});

$(window).load(function() {

	//jQuery code goes here

});

}(jQuery));