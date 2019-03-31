;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_nivo_slider = function( content ){
			var elements = $('.nivoslider .nivoSlider');
			if(elements && elements.length && (typeof($.fn.nivoSlider) != 'undefined') )
			{
			    $.each(elements, function(i, e){
			        var slider = $(e),
			            transition = slider.attr('data-transition'),
			            autoslide = slider.attr('data-autoslide'),
			            pausetime = slider.attr('data-pausetime');

			        slider.nivoSlider({
			            effect:transition,
			            boxCols: 8,
			            boxRows: 4,
			            slices:15,
			            animSpeed:500,
			            pauseTime: pausetime,
			            startSlide:0,
			            directionNav:1,
			            controlNav:1,
			            controlNavThumbs:0,
			            pauseOnHover:1,
			            manualAdvance: autoslide,
			            afterLoad: function(){
			                /* slideFirst() */
			                setTimeout(function(){
			                    slider.find('.nivo-caption').animate({left:20, opacity:1}, 500, 'easeOutQuint');
			                }, 1000);
			            },
			            beforeChange: function(){
			                /* slideOut() */
			                slider.find('.nivo-caption').animate({left:120, opacity:0}, 500, 'easeOutQuint');
			            },
			            afterChange: function(){
			                /* slideIn() */
			                slider.find('.nivo-caption').animate({left:20, opacity:1}, 500, 'easeOutQuint');
			            }
			        });
			    });
			}
		};
		var nivo_slider = $('.nivo-slider');
		if (nivo_slider){
			enable_nivo_slider( nivo_slider );
		}
	});// end of document ready

})(jQuery);