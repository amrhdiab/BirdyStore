/*
 * Initialization script for Showroom Carousel
 */
jQuery(function($){
	"use strict";

	/* Showroom Carousel */
	var enable_sc_showroomcarousel = function( content ){
		var elements = content.find(".sc__showroom-carousel");
		if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
			$.each(elements, function(i, e){
				var $this = $(e),
					$speed = $this.attr("data-speed"),
					$pagination = $('<div class="shcar__pagination"></div>');

				if( $this.attr("data-pag") && $this.attr("data-pag") == "1" ){
					$this.parent().prepend($pagination);
				}

				$this.carouFredSel({
					responsive:true,
					height: 220,
					scroll: { pauseOnHover: true },
					auto: { timeoutDuration: parseInt($speed) },
					items: {
						width: 280,
						visible: { min: 1, max: 3 }
					},
					pagination: {
						container: $this.parent().find('.shcar__pagination'),
						anchorBuilder: function(nr, item) {
							return '<a href="#'+nr+'"></a>';
						}
					},
					swipe: {
						onTouch: true,
						onMouse: true
					}
				});
			});
		}
	};
	var carouselWrapper = $('.sc__shcar-wrapper');
	if(carouselWrapper){
		enable_sc_showroomcarousel( carouselWrapper );	
	}
	
});