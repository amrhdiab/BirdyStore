;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_icarousel = function( content ){
			var elements = content.find('.th-icarousel');
			if(elements && elements.length && (typeof($.fn.iCarousel) != 'undefined') ){
				$.each(elements, function(i, e){
					var element = $(e),
						carouselSettings = {
							easing: 'easeInOutQuint',
							pauseOnHover: true,
							timerPadding: 0,
							timerStroke: 4,
							timerBarStroke: 0,
							animationSpeed: 700,
							nextLabel: "",
        					previousLabel: "",
							autoPlay: element.is("[data-autoplay]") ? element.data('autoplay') : true,
							slides: element.is("[data-slides]") ? element.data('slides') : 7,
							pauseTime: element.is("[data-timeout]") ? element.data('timeout') : 5000,
							perspective: element.is("[data-perspective]") ? element.data('perspective') : 75,
							slidesSpace: element.is("[data-slidespaces]") ? element.data('slidespaces') : 300,
							direction: element.is("[data-direction]") ? element.data('direction') : "ltr",
							timer: element.is("[data-timer]") ? element.data('timer') : "Bar",
							timerOpacity: element.is("[data-timeropc]") ? element.data('timeropc') : 0.4,
							timerDiameter: element.is("[data-timerdim]") ? element.data('timerdim') : 220,
							keyboardNav: element.is("[data-keyboard]") ? element.data('keyboard') : true,
							mouseWheel: element.is("[data-mousewheel]") ? element.data('mousewheel') : true,
							timerColor: element.is("[data-timercolor]") ? element.data('timercolor') : "#FFF",
							timerPosition: element.is("[data-timerpos]") ? element.data('timerpos') : "bottom-center",
							timerX: element.is("[data-timeroffx]") ? element.data('timeroffx') : 0,
							timerY: element.is("[data-timeroffy]") ? element.data('timeroffy') : -20
						};

					// Start the carousel already :)
					if(typeof($.fn.iCarousel) != 'undefined') {
			    		element.imagesLoaded( function() {
						    element.iCarousel(carouselSettings);
						});
					}
				});
			}
		};
		var i_slider = $('.kl-icarousel-container');
		if (i_slider){
			enable_icarousel( i_slider );
		}
	});// end of document ready

})(jQuery);