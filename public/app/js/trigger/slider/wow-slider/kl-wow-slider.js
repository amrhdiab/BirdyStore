;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_wow_slider = function( content ){
			var elements = content.find('.th-wowslider');
			if(elements && elements.length && (typeof($.fn.wowSlider) != 'undefined') ){
			    $.each(elements, function(i, e){
			        var self = $(e);
			        self.wowSlider({
			            effect: self.attr('data-transition'),
			            duration:900,
			            delay: parseInt(self.is('[data-timeout]') ? self.attr('data-timeout') : 3000),
			            width:1170,
			            height:470,
			            cols:6,
			            autoPlay: self.is('[data-autoplay]') && self.attr('data-autoplay') == 'true' ? true : false ,
			            stopOnHover:true,
			            loop:true,
			            bullets:true,
			            caption:true,
			            controls:true,
			            captionEffect:"slide",
			            images:0,
			            onStep: function(){
							self.addClass('transitioning');
							setTimeout(function(){
								self.removeClass('transitioning');
							}, 1400);

			            }
			        });
			    });
			}
		};
		var wow_slider = $('.wowslider-container');
		if(wow_slider){
			enable_wow_slider( wow_slider );	
		}
	});// end of document ready

})(jQuery);

