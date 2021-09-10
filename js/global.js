;(function ($) {

$(document).ready(function() {

    // WOW
    new WOW().init();

	$('.more-news').on('click', function(){

		console.log('global')

		var postType = $(this).attr('data-pt')

		$('.news__list').css({'opacity':' .5'})

		var data = {
		    'action' : 'ajax',
		    'pt'   : postType
		};

		$.ajax({
		    url         : site_domain.site_domain_url,
		    data        : data,
		    // method      : 'POST',
		    dataType    : 'JSON',
		    success     : function(response){

		        // console.log(response);
		        $('.news__list').html(response)

				$('.news__list').css({'opacity':' 1'});
				$('.news__button').fadeOut('fast');

		    }
		});

	});


	$('.more-intensives').on('click', function(){

		console.log('global')

		var postType = $(this).attr('data-pt')

		$('.intensives-list').css({'opacity':' .5'})

		var data = {
		    'action' : 'intensives',
		    'pt'   : postType
		};

		$.ajax({
		    url         : site_domain.site_domain_url,
		    data        : data,
		    // method      : 'POST',
		    dataType    : 'JSON',
		    success     : function(response){

		        // console.log(response);
		        $('.intensives-list').html(response)

				$('.intensives-list').css({'opacity':' 1'});
				$('.intensives__button').fadeOut('fast');

		    }
		});

	});

	
	$('.more-stories').on('click', function(){

		console.log('global')

		var postType = $(this).attr('data-pt')

		$('.news__list').css({'opacity':' .5'})

		var data = {
		    'action' : 'stories',
		    'pt'   : postType
		};

		$.ajax({
		    url         : site_domain.site_domain_url,
		    data        : data,
		    // method      : 'POST',
		    dataType    : 'JSON',
		    success     : function(response){

		        // console.log(response);
		        $('.news__list').html(response)

				$('.news__list').css({'opacity':' 1'});
				$('.news__button').fadeOut('fast');

		    }
		});

	});

	
	$('.more-category').on('click', function(){

		var category = $(this).attr('data-category');

		$('.news__list').css({'opacity':' .5'});

		var data = {
		    'action' : 'category',
		    'category'   : category,
		};

		$.ajax({
		    url         : site_domain.site_domain_url,
		    data        : data,
		    dataType    : 'JSON',
		    success     : function(response){

		      //  console.log(response);
		        $('.news__list').html(response)
				$('.news__list').css({'opacity':' 1'});
				$('.news__button').fadeOut('fast');

		    }
		});

	});

});

$(window).load(function() {

	//jQuery code goes here

});

}(jQuery));