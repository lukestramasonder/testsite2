(function($) {

/* new_map */
function new_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
	    scrollwheel: false,
	    scaleControl: false,
	    streetViewControl: false,
	    styles: mapStyleGlobal
	};

	// create map
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});

	// center map
	center_map( map );

	// return
	return map;

}

/* add_marker */

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	var markerIcon = {
	        url: markerImgGlobal,
	        scaledSize: new google.maps.Size(44, 60),
			    origin: new google.maps.Point(0, 0),
			    anchor: new google.maps.Point(22,60)
	};

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		icon: markerIcon,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		infowindow = new google.maps.InfoWindow({
			content : $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.setContent($marker.html())
			infowindow.open( map, marker );

			google.maps.event.addListener(map, "click", function(event) {
			    infowindow.close();
			});
	
		});

	}

}

/* center_map */

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.setCenter( bounds.getCenter() );
	   	map.setZoom( 11 );
		map.fitBounds( bounds ); 

	}

}


/* document ready */
// global var
var map = null;
var infowindow = null;

jQuery(document).ready(function($){

	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );

	});


});

})(jQuery);