/*
 * Initialization script for Recent Work Carousel
 */
jQuery(function($){
	"use strict";

	var enable_recent_work_carousel = function( content ){
		var elements = content.find('.recent_works2');
		if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
			$.each(elements, function(i, e){
				var self = $(e);
				self.carouFredSel({
					responsive: true,
					scroll: 1,
					auto: true,
					items: {
						width: 300,
						visible: { min: 1, max: 4 }
					},
					prev	: {
						button	: function(){return self.closest('.recentwork_carousel').find('.prev');},
						key		: "left"
					},
					next	: {
						button	: function(){return self.closest('.recentwork_carousel').find('.next');},
						key		: "right"
					}
				});
			});
		}
	};
	var recentwork_carousel = $('.recentwork_carousel__crsl-wrapper');
	if(recentwork_carousel){
		enable_recent_work_carousel ( recentwork_carousel );	
	}

});