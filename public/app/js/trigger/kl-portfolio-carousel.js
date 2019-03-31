/*
 * Initialization script for Portfolio Carousel
 */
jQuery(function($){
	"use strict";

	var wpkznSelector = $('.ptcarousel');
	if(wpkznSelector && wpkznSelector.length > 0) {
	    if(wpkznSelector.find('li').length > 1) {
	        wpkznSelector.each(function (index, element) {
				if($(element).children().length > 1){
					$(element).carouFredSel({
						responsive: true,
						items: {width: 570},
						prev: {button: $(this).parent().find('a.prev'), key: "left"},
						next: {button: $(this).parent().find('a.next'), key: "right"},
						auto: {timeoutDuration: 5000},
						scroll: {fx: "crossfade", duration: "1500"}
					});
				}
				/* Hide controls */
				else {
					$(element).parent('.ptcarousel').find('.controls').hide();
				}
	        });
	    }
	}

});