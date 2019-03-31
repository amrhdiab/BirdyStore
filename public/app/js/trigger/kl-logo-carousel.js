;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_partners_logo_carousel = function( content ){
			var elements = content.find('.partners_carousel_trigger');
			if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
				$.each(elements, function(i, e){
					var self = $(e);
					self.carouFredSel({
						responsive: true,
						scroll: 1,
						auto: false,
						items: {
							width: 250,
							visible: { min: 3, max: 10 }
						},
						prev	: {
							button	: function(){return self.parents('.partners_carousel').find('.prev');},
							key		: "left"
						},
						next	: {
							button	: function(){return self.parents('.partners_carousel').find('.next');},
							key		: "right"
						}
					});
				});
			}
		};
		var logo_carousel = $('.clients-carousel');
		if(logo_carousel){
			enable_partners_logo_carousel( logo_carousel );	
		}
	});// end of document ready

})(jQuery);