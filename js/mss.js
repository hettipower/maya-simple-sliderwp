jQuery(document).ready(function($) {

	$('.mss_slider_wrapper').owlCarousel({
	    loop:true,
	    nav:true,
	    items:1,
	    mouseDrag: false,
	    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>' , '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	    autoplay : true,
	    autoplayHoverPause: true,
	});

});