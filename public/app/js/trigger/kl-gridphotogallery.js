/*

 * Initialization script for Grid Photo Gallery

 */

jQuery(function($){

	"use strict";

	var enable_gridphotogallery = function( content ){
		var gridPhotoGallery = content.find('.gridPhotoGallery');
		if(gridPhotoGallery && (typeof($.fn.isotope) != 'undefined')) {
			$.each(gridPhotoGallery, function(i, el) {
				var $el = $(el),
					itemWidth = Math.floor( $(el).width() / $el.attr('data-cols') ),
					doIsotope = $el.isotope({
					itemSelector : '.gridPhotoGallery__item',
					masonry: {
						columnWidth: '.gridPhotoGallery__item--sizer',
						gutter:0
					}
				});
				doIsotope.isotope('layout');
			});
		}
	};

	var grid_gallery = $('.gridPhotoGallery-container');
	if(grid_gallery){
		enable_gridphotogallery ( grid_gallery );
	}	

});



