//Inview
// @codekit-prepend "/vendors/isotope.pkgd.min.js";

		
(function ($, root, undefined) {
	$(function () {
		"use strict"; // DOM ready, take it away


		//-- Isotope --//

	    function isoGo(){
	      var $grid = $('.isoGrid').isotope({
	        itemSelector: '.isoItem',
	        layoutMode: 'fitRows',
	        stagger: 60
	      });
	    }

	    $(window).load(function() {
	      isoGo();
	    });

	    $(window).resize(function(){
	      isoGo();
	    });


	    $('.filter-button-group button').on( 'click', function() {
	      $('.filter-button-group').find('.active').removeClass('active');
	      $(this).addClass('active');
	      var filterValue = $(this).attr('data-filter');
	      $('.isoFeed').isotope({ filter: filterValue });
	    });


	    $('.filter').on( 'click', function() {
	      var filterValue = $(this).attr('data-filter');
	      $('.isoGrid').isotope({ filter: filterValue });
	      return false;
	    });


		$('.filters-select').on( 'change', function() {
		  var filterValue = this.value;
		  $('.isoGrid').isotope({ filter: filterValue });
		});


		$('.filters .currentSelection').click(function(){
			var parent = $(this).parent('.filters');
			if(parent.hasClass('active')){
				parent.removeClass('active');
			} else {
				parent.addClass('active');
			}

			$(document).bind('click', function(e) {
			  if($(e.target).closest('.filters').length === 0) {
			    $( ".filters.active" ).removeClass('active');
			  }
			});

		});

	});



	
})(jQuery, this);