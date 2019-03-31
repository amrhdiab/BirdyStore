;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_testimonial_slider = function( content ){
			var elements = content.find('.testimonials_carousel');
			if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
			    $.each(elements, function(i, e){
			        var self = $(e),
			           speed = self.data('speed');
			        self.carouFredSel({
		                responsive: true,
		                items: {
		                	width: 360,
			            	visible: {
			            		min: 1,
			            		max: 1
			            	}
			            },
		                auto: {timeoutDuration: speed},
		                prev	: {
		                    button	: function(){return self.closest('.testimonials-carousel').find('.prev');},
		                    key		: "left"
		                },
		                next	: {
		                    button	: function(){return self.closest('.testimonials-carousel').find('.next');},
		                    key		: "right"
		                }
			        });
			    });
			}
		};
		var testimonial_carousel = $('.testimonials-carousel');
		if(testimonial_carousel){
			enable_testimonial_slider( testimonial_carousel );	
		}

	});// end of document ready

})(jQuery);