/**
 * Rw sidebar jQuery Plugin v1.0
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

	$.fn.rw_Sidebar = function( options ) {
		
		/* Bind each element
		------------------------------------------------*/
		if (this.length > 1){
			this.each(function() { 
				$(this).rw_Sidebar( options );
			});
			return this;
		}
		
		/* Defaults
		------------------------------------------------*/
		var opt = $.extend({
			animationSpeed: 300,
			mainClass: '.rw-sidebar',
			mobilePointerText: '<div class="sidebar-mobile-pointer"><i class="sidebar-icon fa fa-th-list"></i></div>'
		}, options );

		/* This object
		------------------------------------------------*/
		var obj = this;

		/* See if the sidebar is open
		------------------------------------------------*/
		var isOpen = false;
		var isOpenPosition = false;

		/* Private methods: Utilities
		------------------------------------------------*/
		var util = {

			// Check if the value is set
			isset: function( str ){
				return typeof str != 'undefined' ? true : false;
			},

			// If is set use data, else set it
			setData: function( option, data_attr ){
				return util.isset( obj.data(data_attr) ) ? obj.data(data_attr) : option;
			},

		};

		/* Private methods: Do
		------------------------------------------------*/
		var _do = {

			// Prepend the mobile pointer
			mobilePointer: function(){
				if( obj.children('.sidebar-mobile-pointer').length < 1 ){
					obj.prepend( opt.mobilePointerText );
				}
			},

			// Mark position by adding a class
			markPosition: function(){
				$('.right-sidebar').find( obj ).addClass('to-the-right');
				$('.left-sidebar').find( obj ).addClass('to-the-left');
			},

			// Move the sidebar out of the window
			moveOut: function(){
				if( obj.hasClass('to-the-right') ){
					obj.find('.the-sidebar').css({
						'left': '100%'
					});
				}
				if( obj.hasClass('to-the-left') ){
					obj.find('.the-sidebar').css({
						'right': '100%'
					});
				}
			},

			// Hide the sidebar
			hideSidebar: function(the_sidebar){
				the_sidebar.css({
					'display': 'none'
				});
			},

			// Prepare body for moving out
			prepareBody: function(){
				$('body').css({
					'position': 'relative',
					'overflow': 'hidden'
				});
			},

			// Clear body CSS
			clearBodyCss: function(){
				$('body').css({
					'left': '',
					'right': '',
				});
			},
			
			// Show from left
			showFromLeft: function( sidebar_width, the_sidebar ){
				$('body').animate({
					'right': -sidebar_width
				}, opt.animationSpeed);

				the_sidebar.css('display', 'block').animate({
					'margin-right': -sidebar_width
				}, opt.animationSpeed);
			},

			// Show from right
			showFromRight: function( sidebar_width, the_sidebar ){
				$('body').animate({
					'left': -sidebar_width
				}, opt.animationSpeed);

				the_sidebar.css('display', 'block').animate({
					'margin-left': -sidebar_width
				}, opt.animationSpeed);
			},

			// Hide to left
			hideToLeft: function( the_sidebar ){
				$('body').animate({
					'right': 0
				}, 
				opt.animationSpeed, function(){ 
					_undo.prepareBody()	
				});

				the_sidebar.animate({
					'margin-right': 0
				}, opt.animationSpeed);
				
				setTimeout(function(){
					_do.clearBodyCss();
				}, opt.animationSpeed + 10);
			},

			// Hide to right
			hideToRight: function( the_sidebar ){
				$('body').animate({
					'left': 0
				}, 
				opt.animationSpeed, function(){ 
					_undo.prepareBody() 
				});
				
				the_sidebar.animate({
					'margin-left': 0
				}, opt.animationSpeed);

				setTimeout(function(){
					_do.clearBodyCss();
				}, opt.animationSpeed + 10);
			},

			// Debug
			d: function( x ){
				console.log( x );
			}
		}

		/* Private methods: Undo
		------------------------------------------------*/
		var _undo = {

			// Delete the mobile pointer
			mobilePointer: function(){
				obj.find('.sidebar-mobile-pointer').remove();
			},

			// Remove sidebar position mark
			markPosition: function(){
				obj.removeClass('to-the-left to-the-right');
			},

			// Clear body after moving in
			prepareBody: function(){
				$('body').css({
					'position': '',
					'overflow': ''
				});
			}
			
		}

		/* "Constructor"
		------------------------------------------------*/
		var init = function() {
			obj.create();
			obj.start();
			_do.d( obj );
		};

		/* Create
		------------------------------------------------*/
		this.create = function(){
			_do.mobilePointer();
			_do.markPosition();
			_do.moveOut();
		};

		/* Open the sidebar
		------------------------------------------------*/
		this.openSidebar = function( sidebar_width, the_sidebar, lr ){
			_do.prepareBody();
			_do.hideSidebar( the_sidebar );
			obj.find('.sidebar-mobile-pointer').addClass('active').html('<i class="sidebar-icon fa fa-close"></i>');
			
			if( lr == 'left' ){
				_do.showFromLeft( sidebar_width, the_sidebar );
				isOpenPosition = 'left';
			}
			else if( lr == 'right' ){
				_do.showFromRight( sidebar_width, the_sidebar );
				isOpenPosition = 'right';
			}
			isOpen = true;
		};

		/* Close the sidebar
		------------------------------------------------*/
		this.closeSidebar = function( the_sidebar, lr ){
			obj.find('.sidebar-mobile-pointer').removeClass('active').html('<i class="sidebar-icon fa fa-th-list"></i>');
			if( lr == 'left' ){
				_do.hideToLeft( the_sidebar );
			}
			else if( lr == 'right' ){
				_do.hideToRight( the_sidebar );
			}
			isOpenPosition = false;
			isOpen = false;
		};

		/* Start
		------------------------------------------------*/
		this.start = function(){
			
			// Show or hide sidebar on click
			$('.rw-sidebar').on( 'click', '.sidebar-mobile-pointer', function(){

				var this_sidebar  = $(this).parent('.rw-sidebar'),
				    the_sidebar   = this_sidebar.children('.the-sidebar'),
				    sidebar_width = the_sidebar.outerWidth(true),
				    is_active     = $(this).hasClass('active');
				
				if( this_sidebar.hasClass('to-the-right') ){
					if( is_active ){
						obj.closeSidebar(the_sidebar, 'right');
					}
					else{
						obj.openSidebar(sidebar_width, the_sidebar, 'right');
					}
				}
				else if( this_sidebar.hasClass('to-the-left') ){
					if( is_active ){
						obj.closeSidebar(the_sidebar, 'left');
					}
					else{
						obj.openSidebar(sidebar_width, the_sidebar, 'left');
					}
				}
			});

			// On resize reset
			$(window).resize(function(){
				if( isOpen ){
					if( isOpenPosition == 'right' ){
						obj.closeSidebar( $('.rw-sidebar.to-the-right .the-sidebar'), 'right' );
					}
					if( isOpenPosition == 'left' ){
						obj.closeSidebar( $('.rw-sidebar.to-the-left .the-sidebar'), 'left' );
					}
				}
			});

		};

		/* "Constructor" init
		------------------------------------------------*/
		init();
		return this;

	};

}( jQuery ));