;(function($){
	"use strict";

	$(document).ready(function() {

		var enable_portfolio_slider = function( content ){

			var elements = content.find('.psl-carousel__container');

			if(elements && elements.length && (typeof($.fn.carouFredSel) != 'undefined') )
			{
			    $.each(elements, function(i, e){
			        var self = $(e);
			        var highlight = function(data) {
			            var item = self.triggerHandler('currentVisible');
			            self.children('.psl-carousel__item').removeClass('psl--active-item');
			            item.addClass('psl--active-item');
			        };
			        var unhighlight = function(data) {
			            self.children('.psl-carousel__item').removeClass('psl--active-item');
			        };
			        self.carouFredSel({
			            responsive: true,
			            width: 1140,
			            scroll   : {
			                fx: 'fade',
			                duration     : 1000,
			                timeoutDuration  : 3000,
			                onBefore : unhighlight,
			                onAfter : highlight
			            },
			            items: {
							width: 430,
							visible: { min: 1, max: 1 }
						},
			            auto : false,
			            next : {
			                button: self.closest('.psl-carousel__wrapper').find('.psl__next'),
			                key: 'right'
			            },
			            prev : {
			                button: self.closest('.psl-carousel__wrapper').find('.psl__prev'),
			                key: 'left'
			            },
			            swipe: {
			                onTouch: true,
			                onMouse: true
			            },
			            onCreate : highlight
			        });
			    });
			}
		};
		var portfolio_slider = $('.psl-carousel__wrapper');
		if (portfolio_slider){
			enable_portfolio_slider( portfolio_slider );
		}

	});// end of document ready

})(jQuery);