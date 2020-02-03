
//@prepros-prepend lib/modernizr-2.7.1.min.js
//@prepros-prepend plugins/lazysizes.min.js
//@prepros-prepend plugins/jquery.bxslider.js



var resizeTimer;
window.addEventListener("preload", function() {
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);
});




(function ($, root, undefined) {
	$(function () {
		"use strict"; // DOM ready, take it away
		
		$(window).load(function() {
		  $("body").delay( 800 ).removeClass("preload");
		});


		$(document).ready(function(){



			$('.sliderOn').bxSlider({
				mode: 'fade',
				adaptiveHeight: 'true',
				onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
				    $('.active').removeClass('active');
				    $('.sliderOn>li').eq(currentSlideHtmlObject).addClass('active')
				},
				onSliderLoad: function () {
				    $('.sliderOn>li').eq(0).addClass('active')
				}
			});




		});



		$(window).scroll(function() {
			var scrollTop = $(window).scrollTop();
			var imgPos = scrollTop / 5 + 'px';
			$('.slideImage').find('img').css('transform', 'translateY(' + imgPos + ')');
		});

		



	    //-- SCROLLTO Links --//

		$('#pageContent a[href^="#"]').live('click',function(event){
		    event.preventDefault();
		    var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
		    //change this number to create the additional off set        
		    var customoffset = 85;
		    $('html, body').animate({scrollTop:target_offset - customoffset}, 500);
		});



		$('#customFilter').on('click',function(){
			if($(this).hasClass('opened')){
				$(this).removeClass('opened');
			} else {
				$(this).addClass('opened');
			}

			$(document).click(function(event) { 
			    if(!$(event.target).closest('#customFilter').length) {
			        if($('#customFilter .select-dropdown').is(":visible")) {
			        	$('#customFilter').removeClass('opened');
			        }
			    }        
			});
		});








	    //-- Child Navigation - May Require Doc Ready --//


        $(".childnav_toggle").click(function (e) {
            e.stopPropagation();
            $(this).toggleClass('opened');
            $(".childNav").slideToggle('fast');
        });

        $( ".childNav li.page_item_has_children" ).each(function(){
          $(this).append( "<div class='toggle'></div>" );
        });

 		$( ".childNav li.menu-item-has-children.current_page_ancestor > .toggle" ).each(function() {
      	    $( this ).addClass( "opened" );
      	});

        $( ".page_item_has_children .toggle" ).click(function (e) {
            e.stopPropagation();
            $(this).toggleClass('opened');
            $(this).siblings('.children').stop().slideToggle( 'fast');
        });

		$('li.page_item_has_children').each(function(){
			
			if($(this).children('ul').is(":visible")){
				
				$(this).children('.toggle').addClass('opened');
			}
		});

        $( ".side-nav .menu-item-has-children .toggle" ).click(function (e) {
              e.stopPropagation();
              $(this).toggleClass('opened');
              $(this).siblings('.sub-menu').stop().slideToggle( 'fast');
        });







                


	    // Hide Header on on scroll down

	    (function($){
	    	$(function(){  

		    	var didScroll = false;
		        var scroll = $(document).scrollTop();
		        var header = $('.navWrap');
		        var headerHeight = header.outerHeight(true);

		    	function scrolldeely(){

					var scrolled = $(document).scrollTop();
					var heightPlus = headerHeight + 100;


					if (scrolled < 2){
						header.removeClass('slideUp');
					} else {
						header.addClass('slideUp');
					}

		            if ((scrolled > heightPlus) && (scrolled > scroll)){
		            	header.addClass('off-canvas');
		            } else {
		            	header.removeClass('off-canvas')
		            }             

		          	scroll = $(document).scrollTop();

		    	}

		    	window.onscroll = doThisStuffOnScroll;

		    	function doThisStuffOnScroll() {
		    	    didScroll = true;
		    	}

		    	setInterval(function() {
		    	    if(didScroll) {
		    	        didScroll = false;
		    	        scrolldeely();
		    	     
		    	    }
		    	}, 100);
		       });
	    })(jQuery); 
	    // END Hide Header on on scroll down






	  	//-- Mobile sub nav toggler --//

		$('.sub-toggle').toggle(function(){
			$(this).addClass('toggled');
			var $sub = $(this).siblings('.sub-menu-wrap');
			var subHeight = $sub.children('ul').outerHeight(true);

			$sub.stop().animate({
				height:subHeight
			},150,function(){
				$(this).css('height','auto');	
			});
			
		},function(){
			$(this).removeClass('toggled');
			var $sub = $(this).siblings('.sub-menu-wrap');
			$sub.stop().animate({
				height:0
			},150);
		});







		//-- Submenu Edge detection --//

		function edgeDetect() {
			$('.sub-menu-wrap').each(function(){
		 		var dropdown = $(this);
		        var rightEdge = dropdown.width() + dropdown.offset().left;
		        var screenWidth = $(window).width();

		        if (rightEdge > screenWidth) {
		          dropdown.addClass('flipped');
		        }
		        else {
		          dropdown.removeClass('flipped');
		        }
			});
		}
		$(document).ready(edgeDetect);
		$(window).on('resize',edgeDetect);








	  	//-- Mobile Nav Activator --//

		$('.nav-activator').click(function(){

			var headHeight = $('.headerNav').height();
			var windowHeight = $(window).height() - headHeight;
			var navHeight = $(window).height();

			if(!$(this).hasClass("open")){
				if($('.searchWrap').is(":visible")){
					$('.search-act, .searchWrap').removeClass('open');
					$('.search-act, .searchWrap').addClass('close');
				}
				$('.headerNav').addClass('openNav');

				$(this).addClass('open');

				$('html').addClass('menuOpen');
				$('.navWrap').removeClass('off-canvas');

			}else{
				
				$('.headerNav').removeClass('openNav');

				$(this).removeClass("open");

				$('html').removeClass('menuOpen');
			}
		});






		//-- Search Toggle --//

		$('.search-act').click(function(){
			
			if($(this).hasClass('open')){
					$('.search-act, .searchWrap').removeClass('open');
					$('.search-act, .searchWrap').addClass('close');
			} else {
					$('.search-act, .searchWrap').removeClass('close');
					$('.search-act, .searchWrap').addClass('open');
			}

			if($('.searchWrap').is(":visible")){
				$('.searchWrap').find('input').focus();
			}

			if($('.nav-activator').hasClass('open')){
				$('.mobileWrap').stop().animate({
					height:0
				},150,function(){
					$(this).removeAttr('style');	
				});
				$('.nav-activator').removeClass("open");
				$('.nav-activator .hamburger').removeClass("is-active")
    	  	}
			return false;
		});



		//-- Hamburger Menu --//

	 	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

	    var hamburgers = document.querySelectorAll(".hamburger");
	    if (hamburgers.length > 0) {
	      forEach(hamburgers, function(hamburger) {
	        hamburger.addEventListener("click", function() {
	          this.classList.toggle("is-active");
	        }, false);
	      });
	    }



	});
})(jQuery, this);

