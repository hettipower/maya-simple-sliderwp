jQuery(document).ready(function($) {

	$('.slider_opt_radio').on('change', function(){
		var slider = $(this).val();
		slideCategory(slider);
	});


});

function slideCategory(slider){
	jQuery('.admin_option_wrapper').hide();
	if( slider == 'zoom_slider' ){
		jQuery('#zoom_slider_opt').fadeIn(600);
	}else if( slider == 'bxslider' ){
		jQuery('#bxslider_opt').fadeIn(600);
	}
}