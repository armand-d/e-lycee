$(document).ready(function(){

	$.ajaxSetup(
	{
	    headers:
	    {
	        'X-CSRF-Token': $('input[name="_token"]').val()
	    }
	});

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

	$('#login').on('click',function(){
		window.location.hash = 'connexion';
	});
	if (window.location.hash == '#connexion') {
		$('#login').trigger('click');
	}

	// ajax login

	$('#form-login').submit(function(e) {
		var password = $("#form-login input[name='password']");
		var username = $("#form-login input[name='username']");
		
		password.removeClass('has-error');	
		username.removeClass('has-error');
		password.prev().html('');	
		username.prev().html('');	
		$('#error-login').html('');

		$.post($(this).attr('action'), $(this).serialize())
		.done(function(data) {
			if(data.ok) {
				if(data.ok == 'teacher') {
					window.location.href = 'professeur';
				} else {
					window.location.href = 'etudiant';
				}
			} else if(data.require) {
				$('.modal').animateCss('shake');
				console.log(data.require);
				if(data.require.password)
					password.addClass('has-error');
					password.prev().html(data.require.password);	
				if(data.require.username) 
					username.addClass('has-error');
					username.prev().html(data.require.username);	
			} else if(data.response == 'fail') {
				$('.modal').animateCss('shake');
				$('#error-login').html('Identifiant ou mot de passe incorrect.');
			}
		});
		e.preventDefault();
	});
	// end ajax login

	// menu caret
	var active = false;
	$('#menu-caret').on('click', function(){
		$('.menu-caret').slideToggle();
		if (!active) {
			$('#menu-caret').css('color', '#366dff');
			$(this).html('<i class="fa fa-close"></i>')
			active = true;
		} else {
			$('#menu-caret').css('color', '#525252');
			$(this).html('<i class="fa fa-caret-down"></i>')
			active = false;
		}
	});
	// end menu caret

	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})

	$('.link-action-tab').on('click', function(e){
		e.preventDefault();
		var id = $(this).attr('id').split('-');
		$('#btn-'+id[1]).trigger('click');
	});

	$('.status-q').on('click', function(e){
		$('.status-q').removeClass('active-status-q');
		$(this).addClass('active-status-q');
		e.preventDefault
	});
	$('.status-a').on('click', function(e){
		$('.status-a').removeClass('active-status-a');
		$(this).addClass('active-status-a');
		e.preventDefault
	});

	// add / cancel
	$('.add-q').on('click', function(){
		console.log('ok')
		$('.questionnaire-content-list').slideUp();
		$('.questionnaire-content-form').slideDown();
	});
	$('.cancel-q').on('click', function(){
		console.log('ok')
		$('.questionnaire-content-list').slideDown();
		$('.questionnaire-content-form').slideUp();
	});
	$('.add-a').on('click', function(){
		console.log('ok')
		$('.article-content-list').slideUp();
		$('.article-content-form').slideDown();
	});
	$('.cancel-a').on('click', function(){
		console.log('ok')
		$('.article-content-list').slideDown();
		$('.article-content-form').slideUp();
	});
	// end add / cancel

	// new in dash
	$('#new-qcm').on('click', function(e){
		$('#btn-1').trigger('click');
		$('.add-q').trigger('click');
		e.preventDefault;
	});
	$('#new-article').on('click', function(e){
		$('#btn-2').trigger('click');
		$('.add-a').trigger('click');
		e.preventDefault;
	});
	// new in dash

});