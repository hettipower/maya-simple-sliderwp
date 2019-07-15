jQuery(document).ready(function($) {

	let sliderOptions = MSS_PARAM.slider_settings;
	console.log(sliderOptions);

	$('.mss_slider_wrapper').owlCarousel({
	    loop:sliderOptions.loop,
		nav:sliderOptions.navigation,
		dots:sliderOptions.dots,
	    items:1,
	    mouseDrag: sliderOptions.mouse_drag,
	    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>' , '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	    autoplay : sliderOptions.autoplay,
		autoplayHoverPause: sliderOptions.autoplay_hover_pause,
		autoplayTimeout: sliderOptions.autoplay_timeout,
		touchDrag: sliderOptions.touch_drag,
	});

});