;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_testimonial_fader = function( content ){
			var elements = content.find(".testimonials_fader_trigger");
			if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
			    $.each(elements, function(i, e){
			        var speed = $(e).data("speed");
			        $(e).carouFredSel({
			        	items: {
		                	width: 360,
		                },
			            responsive:true,
			            auto: {timeoutDuration: speed},
			            scroll: { fx: "fade", duration: 1500 }
			        });
			    });
			}
		};
		var testimonial_fader = $('.testimonials_fader');
		if(testimonial_fader){
			enable_testimonial_fader( testimonial_fader );	
		}
	});// end of document ready

})(jQuery);