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
	// // end animate menu

	// $('a').on('click', function(){
	// 	if($(this).attr('href').substr(0,1) == '#')
	// 	window.location.hash = $(this).attr('href');
	// });

	$('#login').on('click',function(){
		window.location.hash = 'connexion';
	});
	if (window.location.hash == '#connexion') {
		$('#login').trigger('click');
	}
	// if (window.location.hash == '#articles') {
	// 	$('#btn-2').tab('show');
	// }
	// if (window.location.hash == '#profil') {
	// 	$('#btn-4').tab('show');
	// }
	// if (window.location.hash == '#ajouter-article') {
	// 	$('#btn-2').tab('show');
	// 	$('.article-content-list').slideUp();
	// 	$('.article-content-form').slideDown();
	// }
	// if (window.location.hash == '#eleves') {
	// 	$('#btn-3').tab('show');
	// }
	// if (window.location.hash == '#ajouter-eleve') {
	// 	$('#btn-3').tab('show');
	// 	$('.student-content-list').slideUp();
	// 	$('.student-content-form').slideDown();
	// }
	
	// // hash Qcm / articles
	// if (window.location.hash == '#QCM') {
	// 	$('#btn-1').tab('show');
	// }
	// if (window.location.hash == '#ajouter-qcm') {
	// 	$('#btn-1').tab('show');
	// 	$('.questionnaire-content-list').slideUp();
	// 	$('.questionnaire-content-form').slideDown();
	// }
	// if (window.location.hash == '#QcmAnnuler' ||window.location.hash == '#QcmTous' || window.location.hash == '#QcmPublies' || window.location.hash == '#QcmBrouillons' || window.location.hash == '#QcmCorbeille' || window.location.hash == '#QcmAjouter' || window.location.hash == '#QcmAjouterQuestions' || window.location.hash == '#QcmVerification') {
	// 	$('#btn-1').tab('show');
	// 	window.location.hash = 'QCM';
	// }
	// if (window.location.hash == '#articlesAnnuler' || window.location.hash == '#articlesTous' || window.location.hash == '#articlesPublies' || window.location.hash == '#articlesBrouillons' || window.location.hash == '#articlesCorbeille' || window.location.hash == '#articlesAjouter') {
	// 	$('#btn-2').tab('show');
	// 	window.location.hash = 'articles';
	// }
	// if (window.location.hash == '#profilRemplacerPhoto') {
	// 	$('#btn-4').tab('show');
	// 	window.location.hash = 'profil';
	// }
	
	// // end hash Qcm / articles

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
					window.location.href = 'professeur/tableau-de-bord';
				} else {
					window.location.href = 'etudiant/tableau-de-bord';
				}
			} else if(data.require) {
				$('.modal').animateCss('shake');
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

	// $('#myTab a').click(function (e) {
	//   e.preventDefault();
	//   $(this).tab('show');
	// })

	// $('.link-action-tab').on('click', function(e){
	// 	e.preventDefault();
	// 	var id = $(this).attr('id').split('-');
	// 	$('#btn-'+id[1]).trigger('click');
	// });

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

	// // add / cancel
	// $('.add-q').on('click', function(){
	// 	$('.questionnaire-content-list').slideUp();
	// 	$('.questionnaire-content-form').slideDown();
	// });
	// $('.prev-q').on('click', function(){
	// 	$('.questionnaire-content-list').slideDown();
	// 	$('.questionnaire-content-single').slideUp();
	// });
	// $('.cancel-q').on('click', function(){
	// 	$('.questionnaire-content-list').slideDown();
	// 	$('.questionnaire-content-form').slideUp();
	// });
	// $('.add-a').on('click', function(){
	// 	$('.article-content-list').slideUp();
	// 	$('.article-content-form').slideDown();
	// });
	// $('.cancel-a').on('click', function(){
	// 	$('.article-content-list').slideDown();
	// 	$('.article-content-form').slideUp();
	// });
	// $('.prev-a').on('click', function(){
	// 	$('.article-content-list').slideDown();
	// 	$('.article-content-single').slideUp();
	// });
	// $('.add-s').on('click', function(){
	// 	$('.student-content-list').slideUp();
	// 	$('.student-content-form').slideDown();
	// });
	// $('.cancel-s').on('click', function(){
	// 	$('.student-content-list').slideDown();
	// 	$('.student-content-form').slideUp();
	// });
	// // end add / cancel

	// // new in dash
	// $('#new-qcm').on('click', function(e){
	// 	$('#btn-1').trigger('click');
	// 	$('.add-q').trigger('click');
	// 	e.preventDefault;
	// });
	// $('#new-article').on('click', function(e){
	// 	$('#btn-2').trigger('click');
	// 	$('.add-a').trigger('click');
	// 	e.preventDefault;
	// });
	// // new in dash

	// add questions
	$('#add-question').on('click', function(e){
		if ($('input[name="title_qcm"]').val() != '') {
			$('.error-add-questions').empty();
			$('.add-question').slideDown();
			$(this).hide();
			$('input[name="title_qcm"]').hide();
			$('.add-qcm li:first-of-type').append($('input[name="title_qcm"]').val());
			$('select[name="level_qcm"]').hide();
			$('.add-qcm li:nth-child(2)').append($('select[name="level_qcm"]').val());
			$('select[name="nbr_choice"]').hide();
			$('.add-qcm li:nth-child(3)').append($('select[name="nbr_choice"]').val());
		} else {
			$('.error-add-questions').html('<p class="has-error text-center">Vous devez ajouter un titre à vorte QCM</p>')
		}
		e.preventDefault;
	});

	$('select[name="nbr_choice"]').change(function(){
		var nbr = $(this).val();
		$('.all-choice').empty();
		var nbrQuestion = $('.new-question').length;
		for (var j = 0; j < nbrQuestion; j++) {
			for (var i = 0; i+1 <= nbr; i++) {
				$('.question-'+(j)+' .all-choice').append("<li class='choice-"+(j)+"-"+(i)+"'><input type='text' name='choice-"+(j)+"-"+(i)+"' placeholder='Choix "+(i+1)+"' class='input-grey'> <input type='radio' name='response-"+j+"' class='response'></li>")
			}
		}
		addResponse();
	});

	// add single question
	$('#add-single-question').click(function(e){
		e.preventDefault;
		var nbrQuestion = $('.new-question').length;
		$('input[name="nbr_questions"]').val(nbrQuestion+1);
		
		$('#all-question').append('<li class="question-'+(nbrQuestion)+' new-question"><input type="text" name="question-'+(nbrQuestion)+'" placeholder="Question" class="input-grey"><ul class="all-choice"></ul></li>')

		var nbr = $('select[name="nbr_choice"]').val();
		for (var i = 0; i <= nbr-1; i++) {
			$('.question-'+(nbrQuestion)+' .all-choice').append("<li class='choice-"+(nbrQuestion)+"-"+(i)+"'><input type='text' name='choice-"+(nbrQuestion)+"-"+(i)+"' placeholder='Choix "+(i+1)+"' class='input-grey'> <input type='radio' name='response-"+(nbrQuestion)+"' class='response'></li>")
		}
		addResponse();
	});
	// end add questions

	function addResponse() { 
		$('.response').click(function(){
			$(this).val($(this).prev().val());
		});
	}
	addResponse();
	
	$(window).keypress(function(e){
		if (e.which == 13) {
			return false;
		}
	});

	$('#verif-qcm').on('click', function(e){
		showLoader();
		e.preventDefault;
		error = false;
		var nbrQuestion = $('.new-question').length;
		var nbrChoice = $('select[name="nbr_choice"]').val();
		$('#error-add-qcm').empty();
		setTimeout(function(){
			for (var i = 0; i < nbrQuestion; i++) {
				valQ = $('input[name="question-'+i+'"]').val();
				response = $('input[name="response-'+i+'"]:checked').length;
				if (valQ == '' || response == 0) {
					$('#error-add-qcm').html('Vérifiez le formulaire');
					error = true;
					hideLoader();
				} else {
					for (var j = 0; j < nbrChoice; j++) {
						valC = $('input[name="choice-'+i+'-'+j+'"]').val();
						if (valC == '') {
							$('#error-add-qcm').html('Vérifiez le formulaire');
							error = true;
							hideLoader();
						}
					}
				}
			}
			if (error == false) {
				$('#verif-qcm').hide();
				$('#add-single-question').hide();
				$('#submt-qcm').show();
				$('#success-add-qcm').html('Le formulaire est valide ! vous pouvez l\'ajouter');
				$('input[type="text"]').attr('readonly','readonly');
				$('input[type="radio"]').hide();
				hideLoader();
			}
		}, 1000);
	});

	function showLoader(){
		$('#no-click-loader-search').fadeIn();
	}
	function hideLoader(){
		$('#no-click-loader-search').fadeOut();
	}

	$('#action-qcm-status a.status-q').on('click', function(e){
		e.preventDefault;
		$('table#tab-qcm tbody').hide();
		status = $(this).attr('id').substr(4);
		if (status == 'delete') $('#delete-qcms').show();
		else $('#delete-qcms').hide();
		if (status == 'all') $('.action-select').show();
		else $('.action-select').hide();
		$('#qcm-'+status).show();
	});

	$('#action-article-status a.status-a').on('click', function(e){
		e.preventDefault;
		$('table#tab-article tbody').hide();
		status = $(this).attr('id').substr(4);
		if (status == 'delete') $('#delete-articles').show();
		else $('#delete-articles').hide();
		if (status == 'all') $('.action-select').show();
		else $('.action-select').hide();
		$('#article-'+status).show();
	});

	$('input[name="selected"]').on('click', function(){
		var idSelected = $(this).val();
		current = $('#id_selected_qcm').val();
		if ($(this).prop('checked')) {
			console.log('ok')
			$('#id_selected_qcm').val(current+','+idSelected);
		} else {
			rewrite = current.replace(','+idSelected, "");
			$('#id_selected_qcm').val(rewrite);
		}
	});

	$('input[name="selected-article"]').on('click', function(){
		var idSelected = $(this).val();
		current = $('#id_selected_article').val();
		if ($(this).prop('checked')) {
			$('#id_selected_article').val(current+','+idSelected);
		} else {
			rewrite = current.replace(','+idSelected, "");
			$('#id_selected_article').val(rewrite);
		}
	});

	// $('.link-show-qcm').on('click', function(e){
	// 	$.ajax({
	// 	  type: "GET",
	// 	  url: $(this).attr('href'),
	// 	  success: function(data){
	// 	  	$('.questionnaire-content-list').slideUp();
	// 	  	$('.questionnaire-content-single').slideDown();
	// 	  	$('.title-single-qcm').empty();
	// 	  	$('.title-single-qcm').html(data.qcm.title);
	// 	  	$('.level-single-qcm').empty();
	// 	  	$('.level-single-qcm').html('Niveau : '+data.qcm.level);
	// 	  	$('.nbr_question-single-qcm').empty();
	// 	  	$('.nbr_question-single-qcm').html('Nombres de questions : '+data.qcm.nbr_question);
	// 	  	$('.nbr_choice-single-qcm').empty();
	// 	  	$('.nbr_choice-single-qcm').html('Nombres de choix : '+data.qcm.nbr_choice);
	// 	  	$('.questions-single-qcm').empty();
	// 	  	for (var i = 0; i < data.data.length; i++) {
	// 	  		question = data.data[i];
	// 	  		$('.questions-single-qcm').append('<li class="single-qcm-question-'+i+'">'+question.question.title+' :</li><ul class="single-qcm-choices-'+i+'"></ul>');
	// 	  		for (var j = 0; j < question.choices.length; j++) {
	// 	  			if (question.choices[j].title == question.question.response)
	// 	  			$('.single-qcm-choices-'+i+'').append('<li class="t-base-blue">'+question.choices[j].title+'</li>');
	// 	  			else
	// 	  			$('.single-qcm-choices-'+i+'').append('<li>'+question.choices[j].title+'</li>');
	// 	  		}
	// 	  	}
	// 	  }
	// 	});
	// 	return false;
	// });

	// $('.link-show-article').on('click', function(e){
	// 	window.location.hash = 'modifierArticle';
	// 	$.ajax({
	// 		type: "GET",
	// 		url: $(this).attr('href'),
	// 		success: function(data){
	// 			console.log(data)
	// 			$('.article-content-list').slideUp();
	// 			$('.article-content-single').slideDown();
	// 			if (data.status === 1) {
	// 				$('.status-single-article-modify').val('1');
	// 				$('.status-single-article-modify').prop('checked','checked');
	// 			}
	// 			$('.image-single-article-modify').attr('src', data.url_thumbnail);
	// 			$('.title-single-article-modify').val(data.title);
	// 			$('.content-single-article-modify').html(data.content);
	// 			$('form#article-modify').attr('action', 'article/'+data.id);
	// 		}  	
	// 	});
	// 	return false;
	// });

	// $('.add-a').on('click', function(){
	// 	$('.article-content-form input').val('');
	// 	$('.article-content-form textarea').html('');
	// 	$('.article-content-form .error').hide('');

	// });

	// if (window.location.hash == '#modifierArticle') {
	// 	$('#btn-2').tab('show');
	// 	$('.article-content-list').slideUp();
	// 	$('.article-content-single').slideDown();
	// }

	$('#user-replace-photo').on('click', function(e){
		$('.user-replace-photo').slideDown();
	});

	$('#form-user-replace-photo').submit(function(e) {
		e.preventDefault();
		var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: 'post',
            contentType: false,
            processData: false,
            dataType: 'json',
            data: data,
            success: function (response) {
                $('.avatar').attr('src', response.avatar);
                $('.user-replace-photo').slideUp();
            }
        });
	});

	// $('.link-qcm-student').on('click', function(e){
	// 	$.ajax({
	// 		type: "GET",
	// 		url: $(this).attr('href'),
	// 		success: function(data){
	// 			$('.qcm-content-list').slideUp();
	// 		  	$('.qcm-content-single').slideDown();
	// 		  	$('.title-single-qcm').empty();
	// 		  	$('.title-single-qcm').html(data.qcm.title);
	// 		  	$('.level-single-qcm').empty();
	// 		  	$('.level-single-qcm').html('Niveau : '+data.qcm.level);
	// 		  	$('.nbr_question-single-qcm').empty();
	// 		  	$('.nbr_question-single-qcm').html('Nombres de questions : '+data.qcm.nbr_question);
	// 		  	$('.nbr_choice-single-qcm').empty();
	// 		  	$('.nbr_choice-single-qcm').html('Nombres de choix : '+data.qcm.nbr_choice);
	// 		  	$('.questions-single-qcm').empty();
	// 		  	$('.questions-single-qcm').append('<input type="hidden" name="qcm_id" value="'+data.qcm.id+'">')
	// 		  	for (var i = 0; i < data.data.length; i++) {
	// 		  		question = data.data[i];
	// 		  		$('.questions-single-qcm').append('<li class="single-qcm-question-'+i+'">'+question.question.title+' :</li><ul class="single-qcm-choices-'+i+'"></ul>');
	// 		  		for (var j = 0; j < question.choices.length; j++) {
	// 		  			$('.single-qcm-choices-'+i).append('<li><input type="radio" id="question-'+i+'-'+j+'" name="question-'+question.question.id+'" value="'+question.choices[j].title+'"> <label for="question-'+i+'-'+j+'">'+question.choices[j].title+'</label></li>');
	// 		  		}
	// 		  	}
	// 		}  	
	// 	});
	// 	return false;
	// });

	// $('#student-qcm').submit(function(e) {
	// 	e.preventDefault();
	// 	var $form = $(this);
 //        var formdata = (window.FormData) ? new FormData($form[0]) : null;
 //        var data = (formdata !== null) ? formdata : $form.serialize();
 // 		$('.error').html('');
 // 		$('.score').html('')

 //        $.ajax({
 //            url: $form.attr('action'),
 //            type: 'GET',
 //            contentType: false,
 //            processData: false,
 //            dataType: 'json',
 //            data: data,
 //            success: function (response) {
 //                if (response.status == 'error') {
 //                	$('.error').html('<p class="has-error text-center">Vous devez répondre à toutes les questions</p>')
 //                } else {
 //                	$('#student-qcm input[type="submit"]').hide();
 //                	$('.score').html('Votre score : '+response.score+'/'+response.nbr_question);
 //                }
 //                console.log(response)
 //            }
 //        });
	// });

});


