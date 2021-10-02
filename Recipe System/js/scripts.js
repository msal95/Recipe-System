/**
 * Scripts
 *
 * -------------------------------------------------------------------------------------
 * Author: Smartik
 * Author URI: http://smartik.ws/
 * Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 */
;(function( $ ) {
	
	"use strict";

$(document).ready(function(){

	/* Rw Sidebar
	------------------------------------------------*/
	$('.rw-sidebar').rw_Sidebar();
	
	/* Main menus
	------------------------------------------------*/
	$('#the-main-menu').smk_Menu();
	$('#the-user-menu').smk_Menu({
		responsive: false,
		subMenuMarkText: false
	});

	/* Smk Accordion Init
	------------------------------------------------*/
	$(".jquery_accordion").smk_Accordion();

	/* Smk Visual Select Init
	------------------------------------------------*/
	$('.visual-select').smk_VisualSelect();

	/* Carousel
	------------------------------------------------*/
	$(".carousel-posts").owlCarousel({
		items: 3,
		paginationSpeed: 300,
		rewindSpeed: 400
	});
	$('.carousel-posts-nav-prev').on('click', function(){
		$(this).parents('.grid-container').find('.carousel-posts').trigger('owl.prev');
	});
	$('.carousel-posts-nav-next').on('click', function(){
		$(this).parents('.grid-container').find('.carousel-posts').trigger('owl.next');;
	});

	/* Home Carousel
	------------------------------------------------*/
	$(".home-carousel-posts").owlCarousel({
		items: 4,
		paginationSpeed: 300,
		rewindSpeed: 400
	});
	$('.carousel-posts-nav-prev').on('click', function(){
		$(this).parents('.grid-container').find('.home-carousel-posts').trigger('owl.prev');
	});
	$('.carousel-posts-nav-next').on('click', function(){
		$(this).parents('.grid-container').find('.home-carousel-posts').trigger('owl.next');;
	});

	/* Generate random string
	------------------------------------------------*/
	var smk_theme_generate_string = function(_nr, _underscore){
		
		var possible_letters = "abcdefghijklmnopqrstuvwxyz",
			possible_nr = "0123456789",
			possible_all = "abcdefghijklmnopqrstuvwxyz0123456789",
			_new_nr, text="", text1="", text2="", text3="";

		if( _nr < 4 ) _nr = 4;

		if( _underscore ){
			_new_nr = parseInt(_nr, 10) - 2;
			for( var i=0; i < 2; i++ ){
				text1 += possible_letters.charAt(Math.floor(Math.random() * possible_letters.length));
			}
			if( _new_nr > 3 ){
				_new_nr = _new_nr - 3;
				for( var i=0; i < _new_nr; i++ ){
					text2 += possible_all.charAt(Math.floor(Math.random() * possible_all.length));
				}
				for( var i=0; i < 3; i++ ){
					text3 += possible_nr.charAt(Math.floor(Math.random() * possible_nr.length));
				}
			}
			else{
				for( var i=0; i < _new_nr; i++ ){
					text2 += possible_all.charAt(Math.floor(Math.random() * possible_all.length));
				}
			}
			
			text = text1 +'_'+ text2 + text3;
		}
		else{
			for( var i=0; i < _nr; i++ ){
				text += possible_all.charAt(Math.floor(Math.random() * possible_all.length));
			}
		}
		

		return text;
	}
	
	/* qTip Init
	------------------------------------------------*/
	$('[title]').qtip({
		position: {
			my: 'bottom center',
			at: 'top center',
		},
		style: {
			classes: 'qtip-tipsy qtip-shadow',
		},
		hide: {
			event: 'click mouseleave'
		}
	});

	/* qTip Init for comment form allowed tags
	------------------------------------------------*/
	$('.comment-form-question').each(function() {
		$(this).qtip({
			content: {
				title: $('.form-allowed-tags .ftg-title'),
				text: $('.form-allowed-tags')
			},
			position: {
				my: 'bottom center',
				at: 'top center',
			},
			style: {
				classes: 'qtip-tipsy qtip-rounded',
			},
			hide: {
				event: 'click mouseleave'
			}
		});
	});

	/* Tag index filter
	------------------------------------------------*/
	function smk_theme_keyword_index_filter(elem) {
		var value    = $(elem).val().toLowerCase(),
		    headings = $('.keywords-index-list h4');

		// Hide or show headings
		value.length > 0 ? headings.hide() : headings.show();

		// Hide or show keywords
		$(".keywords-index-list li").each(function() {
			$(this).text().toLowerCase().search(value) > -1 ? $(this).removeClass('hide-keyword') : $(this).addClass('hide-keyword');
		});
	}
	$('.keywords-filter-block .filter-keywords').on( 'keyup', function(){
		smk_theme_keyword_index_filter(this);
	});

	$('.keywords-filter-block .filter-controls').on( 'click', '.control', function(){
		$(this).parent().children('.control').removeClass('active');
		$(this).addClass('active');
		if( $(this).hasClass('block') ){
			$('.keywords-index-list').addClass('display-block');
		}
		else{
			$('.keywords-index-list').removeClass('display-block');
		}
	});

	/* Mark recipe ingredient on single recipe page
	------------------------------------------------*/
	$('.single-recipe-ingredients li').on( 'click', function(){
		$(this).toggleClass('active');
	});

	/* Submission ingredients manage
	------------------------------------------------*/
	$('.submission-form-repeatable').smk_Accordion({
		showIcon: false,
		closeAble: true
	});

	// Live update title and label on typing 
	function smk_theme_submission_form_livetext( field, section ){
		$( '.submission-form-repeatable' ).on( 'keyup', field, function(){
			var thisval = $(this).val();
			$(this).parents('.accordion_in').find( section ).text( thisval );
		});
	}
	smk_theme_submission_form_livetext('.this-section-title-field', '.section-title');
	smk_theme_submission_form_livetext('.this-section-label-field', '.section-label');

	// Delete section
	$('.submission-form-repeatable').on( 'click', '.delete-section', function(){
		$(this).parents('.accordion_in').slideUp(150, false, function(){
			$(this).remove();
		});
	});

	// Add new section
	$('.submission-form-repeatable-add-new').on( 'click', function(){
		var array_key = smk_theme_generate_string( 5, false),
		    the_ul    = $(this).prev('.submission-form-repeatable'),
		    cloned    = $(the_ul).find('.sfa-noindex').clone();
		
		$( the_ul ).append( cloned );
		cloned.removeClass('sfa-noindex');
		cloned.find('input').each(function(){
			// Update the 'rules[0]' part of the name attribute to contain the latest count 
			$(this).attr( 'name', $(this).attr( 'name' ).replace( '__noindex__', array_key ) );
		}); 

	});

	/* Profile user tabs
	------------------------------------------------*/
	function smk_theme_profile_user_tabs(){
		$('.profile-mini-menu li:not(.link) a').on('click', function(event){
			event.preventDefault();
			var theid = $(this).attr('href');

			// The menu
			$('.profile-mini-menu li').removeClass('active');
			$(this).parent().addClass('active');

			//The tabs
			$('.profile-user-tab').removeClass('active');
			$(theid).addClass('active');
		});
	}
	smk_theme_profile_user_tabs();

	/* Recipes info
	------------------------------------------------*/
	$('.recipe .recipe-info-pointer').on({
		'mouseenter': function(){
			$(this).next().addClass('active');
			$(this).prev().addClass('inactive');
		},
		'mouseleave': function(){
			$(this).prev().removeClass('inactive');
			$(this).next().removeClass('active');
		}
	});

	/* Jump to the top
	------------------------------------------------*/
	function smk_theme_jump_to_it( _selector, _speed ){
		
		_speed = parseInt(_speed, 10) === _speed ? _speed : 300;

		$( _selector ).on('click', function(event){
			event.preventDefault();
			var url = $(this).attr('href'); //cache the url. This is the comment id(parent)

			// Animate the jump
			$("html, body").animate({ 
				scrollTop: parseInt( $(url).offset().top ) - 50
			}, _speed);

		});
	}
	smk_theme_jump_to_it( '.footer-to-top', 500);

	/* Do not jump on top when the link contain only the hash(#) sign
	------------------------------------------------*/
	$('a[href="#"]').on('click', function(event){
		event.preventDefault();
		return false;
	});

	/* If the menu has empty links make them less relevant to the user
	------------------------------------------------*/
	// $('.menu ul a[href="#"]').css({
	// 	// 'text-decoration': 'line-through',
	// 	'font-style': 'italic',
	// 	'opacity': '0.8'
	// });

	/* Grid demo
	------------------------------------------------*/
	function smk_theme_grid_demo(){
		$('.demo-grid-col').each( function(index, elem){
			if( $(this).parent().hasClass('grid') ){
				var tc = $(elem).parent('.grid').attr('class').replace('grid', '');
				$(elem).append(tc);
			}
		} );

	}
	smk_theme_grid_demo();

	/* Fake bahavoir
	------------------------------------------------*/
	function smk_theme_like_favorite(){
		$('.entry-controls .entry-to-favorites, .entry-controls .entry-like').on('click', function(event){
			event.preventDefault();
			var btn = $(this),
				counter = btn.next('.control-tip'),
				count = parseInt( counter.text(), 10 );
			if( btn.hasClass('active') ){
				btn.removeClass('active');
				counter.text( count - 1 );
			}
			else{
				btn.addClass('active');
				counter.text( count + 1 );
			}
			return false;
		});
	}
	smk_theme_like_favorite();

	function smk_theme_recipe_tools(){
		$('.recipe-tools .tool:not(.share):not(.print)').on('click', function(event){
			event.preventDefault();
			
			var btn = $(this);
			btn.hasClass('active') ? btn.removeClass('active') : btn.addClass('active');

			return false;
		});
	}
	smk_theme_recipe_tools();

	function smk_theme_follow_user(){
		$('.follow-user').on( 'click', function(){
			var btn = $(this);
			if( btn.hasClass('active') ){
				btn.removeClass('green active current').addClass('blue');
				btn.find('.text').text('Follow');
				btn.find('.fa').removeClass('fa-check').addClass('fa-plus');
			}
			else{
				btn.removeClass('blue').addClass('active current green');
				btn.find('.text').text('Following');
				btn.find('.fa').removeClass('fa-plus').addClass('fa-check');
			}
		});
	}
	smk_theme_follow_user();

	function smk_theme_comment_vote(){
		$('.comment-vote .control').on( 'click', function(){
			var btn = $(this),
			    container = btn.parent(),
			    counter = container.find('.counter'),
			    total = parseInt( counter.text(), 10);

			if( btn.hasClass('active') ){
				btn.hasClass('upvote') ? counter.text( total - 1 ) : counter.text( total + 1 );
				btn.removeClass('active');
			}
			else{
				if( container.find('.control').hasClass('active') ){
					btn.hasClass('upvote') ? counter.text( total + 2 ) : counter.text( total - 2 );
				}
				else{
					btn.hasClass('upvote') ? counter.text( total + 1 ) : counter.text( total - 1 );
				}
				container.find('.control').removeClass('active');
				btn.addClass('active');
			}
		});
	}
	smk_theme_comment_vote();

});

})(jQuery);