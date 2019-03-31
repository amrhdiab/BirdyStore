;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_general_carousel = function( content ){
			var elements = content.find('.zn_general_carousel'),
				fw = this;

			if(elements && elements.length && (typeof($.fn.carouFredSel) != 'undefined') )
			{
		    	jQuery.each(elements, function(i, e){

		    		var $el = $(e);

		    		var highlight = function(data) {
			            var item = $el.triggerHandler('currentVisible');
			            $el.children('.cfs--item').removeClass('cfs--active-item');
			            item.addClass('cfs--active-item');
			        };
			        var unhighlight = function(data) {
			            $el.children('.cfs--item').removeClass('cfs--active-item');
			        };

					// Set the carousel defaults
					var defaults = {
						fancy: false, 
						transition : 'fade', 
						direction : 'left', 
						responsive: true, 
						auto: true, 
						items: {
							width: 550,
							visible: 1
					    }, 
					    scroll: {
							fx: 'fade', 
							timeoutDuration : 9000, 
							easing: 'swing', 
							onBefore : unhighlight, 
							onAfter: highlight
						}, 
						swipe: {
							onTouch: true,
							onMouse: true
						}, 
						pagination: {
							container: $el.parent().find('.cfs--pagination'),
							anchorBuilder: function(nr, item) {
								var thumb = '';
								if( $el.is("[data-thumbs]") && $el.data('thumbs') == 'zn_has_thumbs' ){
									var items = $el.children('li');
									thumb = 'style="background-image:url('+ items.eq(nr-1).attr('data-thumb') + ');"';
								}
								return '<a href="#'+nr+'" '+ thumb +'></a>';
							}
						}, 
						next : {
			                button: $el.parent().find('.cfs--next'),
			                key: 'right'
			            }, 
			            prev : {
			                button: $el.parent().find('.cfs--prev'),
			                key: 'left'
			            }, 
			            onCreate : highlight
					}

		    		if( $el.is("[data-fancy]") )
		    			defaults.fancy = $el.data('fancy');

		    		// Get the custom carousel settings from data attributes
		    		var customSettings = {
		    			scroll: {
		    				fx : $el.is("[data-transition]") ? $el.data('transition') : defaults.transition, 
		    				timeoutDuration	: $el.is("[data-timout]") ? parseFloat( $el.data('timout') ) : defaults.scroll.timeoutDuration, 
		    				easing: $el.is("[data-easing]") ? $el.data('easing') : defaults.scroll.easing, 
		    				onBefore : unhighlight, 
		    				onAfter: highlight
		    			}, 
		    			auto: {
		    				play: $el.is('[data-autoplay]') && $el.attr('data-autoplay') == '1' ? defaults.auto : false
		    			}, 
		    			direction:  $el.is("[data-direction]") ? $el.data('direction') : defaults.direction
					};

					// Special case/callback for the fancy slider
					if ( defaults.fancy ) {
						// var callback = window['slideCompleteFancy']();
						$.extend(customSettings.scroll, {
							onBefore : function(e){ slideCompleteFancy(e, $el) },
							onAfter : function(e){ slideCompleteFancy(e, $el) },
						});
					}

					// Callback function for fancy slider
					function slideCompleteFancy(args, slider) {
						var _arg = $(slider),
							slideshow =  $(slider).closest('.kl-slideshow'),
							color = $(args.items.visible).attr('data-color');

						// slideshow.animate({backgroundColor: color}, 400);
						slideshow.css({backgroundColor: color});
					}

					// Start the carousel already :)
		    		$el.imagesLoaded( function() {
					    $el.carouFredSel($.extend({}, defaults, customSettings));
					});

		    		// fix for up/down direction not riszing the slider
					if( defaults.fancy ){
						$( window ).on( 'debouncedresize' , function(){
							if( $(window).width() < 1199 ){
								$el.trigger("configuration", ["direction", "left"]);
							} else {
								$el.trigger("configuration", ["direction", "up"]);
							}
							$el.trigger('updateSizes');
						});
					}
				});
				return false;
			}
		};

		var simple_slider = $('.zn_simple_slider_container');
		if (simple_slider){
			enable_general_carousel( simple_slider );
		}
	});// end of document ready

})(jQuery);