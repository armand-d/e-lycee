$(document).ready(function(){

	$.fn.extend({
	    animateCss: function (animationName) {
	        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
	            $(this).removeClass('animated ' + animationName);
	        });
	    }
	});

	// animate menu
	$('#btn-search').on('click', function(e){
		$('#no-click-search').show();
		var $search = $('.content-search');
		$search.animateCss('bounceInDown');
		$search.show();
		$search.find('input').focus();
		e.preventDefault();
	});

	$('#no-click-search').on('click', function(){
		$(this).hide();
		var $search = $('.content-search');
		$search.delay(1000).queue(function() {
			$(this).hide(0);
			$(this).removeClass('animated ' + 'bounceOutUp');
			$(this).dequeue();
		});
		$search.animateCss('bounceOutUp');
	});
		// scroll
		$(window).scroll(function() {
			if ($(this).scrollTop() > '10') {
				$('header').css('padding','0.3em 0 0em 0');
				$('header .logo').css({
				    'margin-top': '-0.2em',
				    'width': '3.5em',
				    'height': '2.1em'
				})
			} else {
				$('header').css('padding','');
				$('header .logo').css({
				    'margin-top': '',
				    'width': '',
				    'height': ''
				})
			}
		});
		// end scroll
	// end animate menu


});