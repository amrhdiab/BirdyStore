/*
 * Initialization script for Screenshot Carousel
 */
jQuery(function($){
	"use strict";

	var carousel = $('.thescreenshot');
	if(carousel){
		var enable_screenshot_box = function( content ){
			var elements = content.find('.screenshot-carousel');
			if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
				$.each(elements, function(i, e){
					var self = $(e),
						_pDataAttr = self.attr('data-carousel-pagination');

					var options = {
						scroll: { fx: "crossfade", duration: "1500" },
						auto: true,
						responsive: true,
						prev : {
							button	: function(){return self.closest('.thescreenshot').find('.prev');},
							key		: "left"
						},
						next : {
							button	: function(){return self.closest('.thescreenshot').find('.next');},
							key		: "right"
						}
					};

					if(typeof(_pDataAttr) != 'undefined'){
						options['pagination'] = _pDataAttr;
					}

					self.imagesLoaded( function() {
						self.carouFredSel(options);
					});

				});
			}
		};
		enable_screenshot_box( carousel );
	}

});