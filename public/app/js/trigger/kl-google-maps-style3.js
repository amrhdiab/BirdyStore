;(function($){
	"use strict";

	$(document).ready(function() {

		/*
		Find the Latitude and Longitude of your address:
			- http://itouchmap.com/latlong.html
			- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
			- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
		
		Find settings explained:
			- https://github.com/marioestrada/jQuery-gMap

		*/
			
		// Map Markers
		var mapMarkers = [{
			address: "3 Tompkins Ave, Brooklyn, NY 11206",
			latitude: 40.699707,
			longitude: -73.947043,
			icon: {
				image: "images/map-marker.png",
				iconsize: [60, 70], // w, h
				iconanchor: [60, 70] // x, y
			}
		},{
			address: "18-77 Madison St, Flushing, NY 11385",
			latitude: 40.703871,
			longitude: -73.904729,
			icon: {
				image: "images/map-marker.png",
				iconsize: [60, 70], // w, h
				iconanchor: [60, 70] // x, y
			},
		}];
		
		// Map Color Scheme - more styles here http://snazzymaps.com/
		var mapStyles = [
		    {
		        "featureType": "landscape",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "poi",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "labels.icon",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "stylers": [
		            {
		                "hue": "#00aaff"
		            },
		            {
		                "saturation": -100
		            },
		            {
		                "gamma": 2.15
		            },
		            {
		                "lightness": 12
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "labels.text.fill",
		        "stylers": [
		            {
		                "visibility": "on"
		            },
		            {
		                "lightness": 24
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "lightness": 57
		            }
		        ]
		    }
		];
		
		// Map Initial Location
		var initLatitude = 40.699707;
		var initLongitude = -73.947043;

		// Map Extended Settings
		var map = jQuery(".th-google_map").gMap({
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true
			},
			scrollwheel: false,
			markers: mapMarkers,
			latitude: initLatitude,
			longitude: initLongitude,
			zoom: 14,
			style: mapStyles,
			draggable: Modernizr.touch ? false : true
		});

	});// end of document ready

})(jQuery);


