// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup').fadeIn();
	    } else {
	        jQuery('.scrollup').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});

	jQuery('.search-show').click(function(){
		jQuery(".searchform-inner").addClass('open');
		jQuery('.searchform-inner').css('visibility','visible');
	});

	jQuery('.close').click(function(){
		jQuery(".searchform-inner").removeClass('open');
		jQuery('.searchform-inner').css('visibility','hidden');
	});
});

// preloader
jQuery(function($){
	setTimeout(function(){
		$("#pre-loader").delay(1000).fadeOut("slow");
	});
});

// sticky header
(function( $ ) {
	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});
})( jQuery );

jQuery(document).ready(function() {
	var owl = jQuery('#category-section .owl-carousel');
		owl.owlCarousel({
			nav: true,
			autoplay:false,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
			navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			responsive: {
			  0: {
			    items: 1
			  },
			  600: {
			    items: 3
			  },
			  1000: {
			    items: 5
			}
		}
	})
});

( function( window, document ) {
	
	function print_on_demand_focus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const print_on_demand_search = document.querySelector( '.searchform-inner' );

			if ( ! print_on_demand_search || ! print_on_demand_search.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...print_on_demand_search.querySelectorAll( 'input, a, button' )],
				print_on_demand_lastEl = elements[ elements.length - 1 ],
				print_on_demand_firstEl = elements[0],
				print_on_demand_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && print_on_demand_lastEl === print_on_demand_activeEl ) {
				e.preventDefault();
				print_on_demand_firstEl.focus();
			}

			if ( shiftKey && tabKey && print_on_demand_firstEl === print_on_demand_activeEl ) {
				e.preventDefault();
				print_on_demand_lastEl.focus();
			}
		} );
	}

	print_on_demand_focus_search();
} )( window, document );