;(function($){
	
	"use strict";

	$(document).ready(function() {


			var sortBy = 'date', 		/* SORTING: date / name */
				sortAscending = true, 	/* SORTING ORDER: true = Ascending / false = Descending */
				theFilter = '';	        /* DEFAULT FILTERING CATEGORY */

			if(typeof(window.wpkIsotopeSortBy) !== 'undefined'){
				sortBy = window.wpkIsotopeSortBy;
			}
			if(sortBy.length > 0){
				sortBy = 'name';
			}
			if(window.location.hash.length > 0){
				var hash = window.location.hash.split('#')[1].split('=');
				if(hash[0] == 'sortBy') {
					sortBy = hash[1];
				}
				else if(hash[0] == 'sortAscending'){
					sortAscending = hash[1];
				}
			}


			var wpkznSelector = $("ul#thumbs");

			if(wpkznSelector && wpkznSelector.length > 0)
			{
				wpkznSelector.imagesLoaded( function() {
					wpkznSelector.isotope({
						itemSelector: ".item",
						animationEngine: "jquery",
						animationOptions: {
							duration: 250,
							easing: "easeOutExpo",
							queue: false
						},
						layoutMode: 'masonry',
						filter: theFilter,
						sortAscending: sortAscending,
						getSortData: {
							name: function(elem) {
								return $(elem).find('.name').text();
							},
							date: function(elem) {
								/*
									date_format: month / day / year ; eg: 10/22/2015 (10 is Month)

									** Sort doesn't work properly with Masonry Layout. If you want an accurate sorting, try changing
									** layout mode to 'fitRows', eg: layoutMode: 'fitRows',
									** http://stackoverflow.com/questions/17535498/jquery-masonry-sort-order-left-to-right-rather-than-top-to-bottom
								*/
								if($(elem).attr('data-date') && $(elem).attr('data-date').length){
									var dateStr = $(elem).attr('data-date'),
										dateArray = dateStr.split('/'),
										year = dateArray[2],
										month = dateArray[0],
										day = dateArray[1];
									return new Date(year, month, day);
								}
							}
						}
					});
					// End isotope
				});

				//#1 Filtering
				var a_elements = $('#portfolio-nav li a');
				if(a_elements && a_elements.length > 0) {
					$.each(a_elements, function (a, b) {
						$(b).on('click', function (w) {
							w.preventDefault();
							$('#portfolio-nav li').removeClass('current');
							$(b).parent().addClass('current');
							wpkznSelector.isotope({filter: $(b).data('filter')});
							wpkznSelector.isotope('updateSortData').isotope();
						});
					});
				}

				//#! Sorting (name | date)
				var b_elements = jQuery('#sortBy li a');
				if(b_elements && b_elements.length > 0){

					b_elements.removeClass('selected');
					$.each(b_elements, function(index, element) {

						var t = $(element),
							csb = t.data('optionValue');

						if(csb == sortBy){
							t.addClass('selected');
						}
						wpkznSelector.isotope({sortBy: csb});
						wpkznSelector.isotope('updateSortData').isotope();

						t.on('click', function(){
							b_elements.removeClass('selected');
							t.addClass('selected');
							csb = t.data('optionValue');

							wpkznSelector.isotope({sortBy: csb});
							wpkznSelector.isotope('updateSortData').isotope();
						});
					});
				}

				//#! Sorting Direction (asc | desc)
				var c_elements = $('#sort-direction li a');
				if(c_elements && c_elements.length > 0) {
					c_elements.removeClass('selected');
					$.each(c_elements,function(index, element) {
						var t = $(element),
							csv = t.data('optionValue');

						if(csv == sortAscending){
							t.addClass('selected');
						}

						wpkznSelector.isotope({sortAscending: sortAscending});
						wpkznSelector.isotope('updateSortData').isotope();

						t.on('click', function(){
							c_elements.removeClass('selected');
							t.addClass('selected');
							csv = t.data('optionValue');

							sortAscending = csv;
							wpkznSelector.isotope({sortAscending: csv});
							wpkznSelector.isotope('updateSortData').isotope();
						});
					});
				}
			}

	});// end of document ready

})(jQuery);