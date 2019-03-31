;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_circular_carousel = function( content )
		{
			var cirContentContainer = content.find('.ca-container'),
				elements = cirContentContainer.children('.ca-wrapper');

			// do the carousel
			if(elements && elements.length && (typeof($.fn.carouFredSel) != 'undefined') )
			{
				$.each(elements, function(i, e){
			        var self = $(e),
			        	autoplay = self.attr('data-autoplay') == '1' ? true : false;;

						self.carouFredSel({
							responsive: true,
							width: '1170',
							height: 450,
							direction : "left",
							items: {
								width: 550,
								visible: {
									min: 1,
									max: 3
								}
							},
							auto: {
								play: autoplay
							},
							scroll 				: {
								items           : 1,
								easing          : "easeInOutExpo",
								duration		: 1000,
								pauseOnHover    : true,
								timeoutDuration	: parseFloat( self.attr('data-timout') )
							},
							prev : {
								button  : self.closest('.ca-container').find('.ca-nav-prev'),
								key     : "left"
							},
							next : {
								button  : self.closest('.ca-container').find('.ca-nav-next'),
								key     : "right"
							},
							swipe: {
								onTouch: true,
								onMouse: true
							}
						});
					// Open wrapper panel
					var opened = false;
					self.find('.js-ca-more').on('click', function(e){
						e.preventDefault();
						var th = $(this).closest('.ca-item'),
							thpos = th.position().left;

						if(!opened){
							self.trigger('stop');
							self.closest('.ca-container').addClass('ca--is-rolling');
							th.addClass('ca--opened');
							th.css({
								"-webkit-transform":"translateX(-"+ thpos +"px)",
								"-ms-transform":"translateX(-"+ thpos +"px)",
								"transform":"translateX(-"+ thpos +"px)"
							});
							opened = true;

						} else if(opened){

							if($(this).hasClass('js-ca-more-close')){

								self.trigger('play', true);
								self.closest('.ca-container').removeClass('ca--is-rolling');
								th.removeClass('ca--opened');
								th.css({
									"-webkit-transform":"translateX(0)",
									"-ms-transform":"translateX(0)",
									"transform":"translateX(0)"
								});
								opened = false;
							}
						}
					});
					// Close wrapper panel
					self.find('.js-ca-close').on('click', function(e){
						e.preventDefault();
						var th = $(this).closest('.ca-item');
						if(opened){
							self.trigger('play', true);
							self.closest('.ca-container').removeClass('ca--is-rolling');
							th.removeClass('ca--opened');
							th.css({
								"-webkit-transform":"translateX(0)",
								"-ms-transform":"translateX(0)",
								"transform":"translateX(0)"
							});
						}
						opened = false;
					});
				});
			}
		};
		var circular_catalogue = $('.circularcatalogue');
		if (circular_catalogue){
			enable_circular_carousel( circular_catalogue );
		}
	});// end of document ready

})(jQuery);