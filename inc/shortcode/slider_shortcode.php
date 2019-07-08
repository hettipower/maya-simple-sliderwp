<?php

function ms_slider_shortcode() {
	ob_start();
	ms_slider_fields();
	return ob_get_clean();
}
add_shortcode('ms_slider', 'ms_slider_shortcode');

// Today News Fields
function ms_slider_fields() {

	$prefix = 'mss_cmb_';	
	$the_query = new WP_Query( array(
		'post_type' => 'ms-slider',
		'posts_per_page' => -1,
	) );
	if ( $the_query->have_posts() ) :
	?>
	<div id="maya_simple_slider">
		<div class="mss_slider_wrapper owl-carousel owl-theme">
			<?php  while ( $the_query->have_posts() ) : $the_query->the_post();	 ?>
				<div <?php post_class('ms_slider item'); ?>>
					<?php
						$image = wp_get_attachment_url( get_post_meta( get_the_ID(), $prefix.'slider_image_id', 1 ), 'full' );
						$text_position = get_post_meta( get_the_ID(), $prefix.'content_position', true );
						$content = get_the_content();
						if( $image ){
							echo '<img id="mss_img_'.get_the_ID().'" src="'.$image.'" />';
						} 
					?>	
					<?php if( $content ){ ?>
						<div class="ms_content_wrpper <?php echo $text_position; ?>">
							<div class="ms_content"><?php echo $content; ?></div>
						</div>
					<?php } ?>		
				</div>
			<?php endwhile; ?>			
	    </div>
	</div>
	<?php endif; wp_reset_query();

}