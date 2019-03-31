/*
 * Initialization script for Weather panel
 */
jQuery(function($){
	"use strict";

	var enable_static_weather = function( elements ){
		if(elements && ( typeof($.simpleWeather) != 'undefined')){
		    $.each(elements, function(i, e){

		        var self = $(e),
		        	loc = self.attr('data-location') ? self.attr('data-location') : '';

				$.simpleWeather({
					woeid: self.attr('data-woeid'),
					location: loc,
					unit: self.attr('data-unit'),
					success: function(weather) {

						var html = '<ul class="scw_list clearfix">';

						for(var i=0;i<5;i++) {
							html += '<li><i class="wt-icon wt-icon-'+weather.code+'"></i>';
							html += '<div class="scw__degs">';
							html += '<span class="scw__high">'+weather.forecast[i].high+'&deg;<span class="uppercase">'+weather.units.temp+'</span></span>';
							html += '<span class="scw__low">'+weather.forecast[i].low+'</span>';
							html += '</div>';
							html += '<span class="scw__day">' + weather.forecast[i].day+'</span>';
							html += '<span class="scw__alt">' + weather.forecast[i].alt.high+'&deg;<span class="uppercase">'+ weather.alt.unit +'</span></span>';
							html += '</li>';
						}
						html += '</ul>';

						self.append($(html));
					},
					error: function(error) {
						jQuery(self).html('<p>'+error+'</p>');
						console.warn('Some problems: '+ error);
					}
				});
		    });
		}
	};

	var weatherWrapper = $('.sc__weather');
	if(weatherWrapper){
		enable_static_weather( weatherWrapper );	
	}
});