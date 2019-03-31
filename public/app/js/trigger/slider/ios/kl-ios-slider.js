;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_ios_slider = function( content ){

			function slideChange(args) {
				var theSlider = $(args.sliderObject),
					activeSlide = args.currentSlideNumber - 1,
					sliderContainer = theSlider.closest('.iosslider-slideshow');
				// console.log(args);
				// add active to bullets
				sliderContainer.find('.kl-ios-selectors-block .iosslider__bull-item').removeClass('selected');
				sliderContainer.find('.kl-ios-selectors-block .iosslider__bull-item:eq(' + activeSlide + ')').addClass('selected');
				// add active class
				theSlider.find('.iosslider__item').removeClass('kl-iosslider-active');
				theSlider.find('.iosslider__item:eq(' + activeSlide + ')').addClass('kl-iosslider-active');
			}

			function sliderLoaded(args, otherSettings) {
				var theSlider = $(args.sliderObject);
				if (otherSettings.hideControls) theSlider.addClass('hideControls');
				if (otherSettings.hideCaptions) theSlider.addClass('hideCaptions');

				if(typeof( args.currentSlideNumber ) != 'undefined') {
					slideChange(args);
				}
				theSlider.closest('.iosslider-slideshow').addClass('kl-slider-loaded');
			}

			var elements = content.find('.iosSlider');

			if(elements && elements.length && (typeof($.fn.iosSlider) != 'undefined') ){
				$.each( elements , function(i, e){
					var self = $(e),
						selfContainer = self.closest('.kl-slideshow');
			
						self.iosSlider({
							snapToChildren: true,
							desktopClickDrag: true,
							keyboardControls: true,
							autoSlide: self.data('autoplay') == '1' ? true : false,
							autoSlideTimer: self.data('trans'),
							navNextSelector: selfContainer.find('.kl-iosslider-next'),
							navPrevSelector: selfContainer.find('.kl-iosslider-prev'),
							navSlideSelector: selfContainer.find('.kl-ios-selectors-block .item'),
							scrollbar: true,
							scrollbarContainer: selfContainer.find('.scrollbarContainer'),
							scrollbarMargin: '0',
							scrollbarBorderRadius: '4px',
							onSliderLoaded: function(args){
								var otherSettings = {
									hideControls : true,
									hideCaptions : false
								};
								sliderLoaded(args, otherSettings);
							},
							onSlideChange: slideChange,
							infiniteSlider: self.data('infinite')
						});

					$( window ).on( 'debouncedresize' , function(){
						if(typeof($.fn.iosSlider) != 'undefined') {
							self.iosSlider('update');
						}
					});

				});
			}
		};
		var ios_slider_p = $('.iosslider-slideshow');
		if (ios_slider_p){
			enable_ios_slider( ios_slider_p );
		}

	});// end of document ready

})(jQuery);