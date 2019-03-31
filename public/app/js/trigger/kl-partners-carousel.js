/*
 * Initialization script for Partners Carousel
 */
jQuery(function($){
	"use strict";

	var enable_testimonials_partners = function( content ){
		var elements = content.find('.ts-pt-partners__carousel');
		if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
		    $.each(elements, function(i, e){
		        var self = $(e);
		        var highlight = function(data) {
		            var item = self.triggerHandler('currentVisible');
		            self.children('.ts-pt-partners__carousel-item').removeClass('ts-pt--active-item');
		            item.addClass('ts-pt--active-item');
		        };
		        var unhighlight = function(data) {
		            self.children('.ts-pt-partners__carousel-item').removeClass('ts-pt--active-item');
		        };
		        self.carouFredSel({
		            responsive: true,
		            items: {
		            	visible: {
		            		min: 1,
		            		max: 5
		            	}
		            },
		            scroll   : {
		                fx: 'fade',
		                duration     : 1000,
		                timeoutDuration  : 3000,
		                onBefore : unhighlight,
		                onAfter : highlight
		            },
		            auto : true,
		            onCreate : highlight
		        });
		    });
		}
	};
	var partners_carousel = $('.ts-pt-partners__carousel-wrapper');
	if(partners_carousel){
		enable_testimonials_partners( partners_carousel );	
	}

});