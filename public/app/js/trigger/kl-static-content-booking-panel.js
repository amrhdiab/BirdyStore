/*
 * Initialization script for Booking panel
 */
jQuery(function($){
	"use strict";

	// Holds the days of each month
	var months = {
		'm_0': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_1': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28],
		'm_2': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_3': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
		'm_4': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_5': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
		'm_6': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_7': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_8': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
		'm_9': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		'm_10': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
		'm_11': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
	};
	// Helper method - set days accordingly to the month provided
	var setDays = function(months, selectedMonth){
		var days = months[selectedMonth];
		if(days){
			$('.rf__checkinday').empty();
			$.each(days, function(i,v){
				$('.rf__checkinday').append('<option value="'+v+'">'+v+'</option>');
			});
		}
	};
	// On change month
	$('.rf__checkinmonth').each(function(){
		$(this).on('change', function(){
			var selectedMonth = $(this).val();
			if(selectedMonth >= 0 && selectedMonth <= 11){
				selectedMonth = 'm_'+selectedMonth;
				setDays(months, selectedMonth);
			}
		});
	});
	// On Load
	setDays(months, 'm_'+0);

	/*
	 * Build search query for endpoint
	 */
	var buildEndpointSearchQuery = function(){
		var monthUrlField = "m",
			dayUrlField = "d",
			nightsUrlField = "n",
			guestsUrlField = "g",
			_mv = $('.rf__checkinmonth').val(),
			_dv = $('.rf__checkinday').val(),
			_nv = $('.rf__checkin_nights').val(),
			_gv = $('.rf__checkinguests').val(),
			_month = monthUrlField + '=' + _mv + '&',
			_day = dayUrlField + '=' + _dv + '&',
			_nights = nightsUrlField + '=' + _nv + '&',
			_guests = guestsUrlField + '=' + _gv;

		return '?' + _month + _day + _nights + _guests;
	}; 

	$('.rf__submit').on('click', function(ev){
		ev.preventDefault();
		ev.stopPropagation();
		window.location.href = buildEndpointSearchQuery();
	});
});