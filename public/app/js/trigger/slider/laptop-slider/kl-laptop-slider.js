;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_laptop_slider = function( content ){

			function slideChange(args) {
				var iosSlider = args.sliderContainerObject,
					detailsBlock = iosSlider.attr('data-details');

				// Details blocks
				if(typeof detailsBlock != 'undefined'){
					$(detailsBlock).find('.ls_slide_item-details').removeClass('selected');
					$(detailsBlock).find('.ls_slide_item-details:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
				}
				// bullets
				$(iosSlider).closest('.ls__laptop-mask').find('.ls__nav .ls__nav-item').removeClass('selected');
				$(iosSlider).closest('.ls__laptop-mask').find('.ls__nav .ls__nav-item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

				// Item active class
				$(iosSlider).find('.ls__slider-item').removeClass('item--active');
				$(iosSlider).find('.ls__slider-item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('item--active');
			}

			function sliderLoaded(args) {
				slideChange(args);
				args.sliderContainerObject.closest('.kl-slideshow').addClass('kl-slider-loaded');
			}

			var elements = content.find('.zn_laptop_slider');

			if(elements && elements.length && elements.find('.ls__slider-item').length){
				$.each( elements , function(i, e){
					var self = $(e);
					if(typeof($.fn.iosSlider) != 'undefined') {
						self.iosSlider({
							autoSlide: true,
							snapToChildren: true,
							desktopClickDrag: true,
							keyboardControls: true,
							navNextSelector: self.closest('.ls__laptop-mask').find('.ls__arrow-right'),
							navPrevSelector: self.closest('.ls__laptop-mask').find('.ls__arrow-left'),
							navSlideSelector: self.closest('.ls__laptop-mask').find('.ls__nav .ls__nav-item'),
							scrollbar: false,
							onSliderLoaded: sliderLoaded,
							onSlideChange: slideChange,
							infiniteSlider: true
						});
					}
					$( window ).on( 'debouncedresize' , function(){
						if(typeof($.fn.iosSlider) != 'undefined') {
							self.iosSlider('update');
						}
					}).trigger('debouncedresize');
				});
			}

			// Prevent default for bullet navigation
			$( content ).find('.ls__nav-item').click(function(e){ return false; });
		};
		var laptop_slider = $('.kl-slideshow');
		if (laptop_slider){
			enable_laptop_slider( laptop_slider );
		}
	});// end of document ready

})(jQuery);