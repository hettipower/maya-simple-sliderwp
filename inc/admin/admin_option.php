<?php

add_action("admin_menu", 'setup_mss_option_page' );
function setup_mss_option_page() {
	add_menu_page('MS Slider Setting', 'Slider Settings', 'manage_options', 'mss_options', 'ms_slider_option_setting' );
}

function ms_slider_option_setting() {
	// Check that the user is allowed to update options
	if (!current_user_can('manage_options')) {
	    wp_die('You do not have sufficient permissions to access this page.');
	}

	//Options
	$optPre = '_ms_opt_';
	$slider_mode = get_option($optPre."slider_mode");
	$slider_speed = get_option($optPre.'slider_speed');
	$slider_randomStart = get_option($optPre.'slider_randomStart');
	$slider_infiniteLoop = get_option($optPre.'slider_infiniteLoop');
	$slider_easing = get_option($optPre.'slider_easing');
	$slider_adaptiveHeight = get_option($optPre.'slider_adaptiveHeight');
	$slider_responsive = get_option($optPre.'slider_responsive');
	$slider_touchEnabled = get_option($optPre.'slider_touchEnabled');
	$slider_preventDefaultSwipeX = get_option($optPre.'slider_preventDefaultSwipeX');
	$slider_preventDefaultSwipeY = get_option($optPre.'slider_preventDefaultSwipeY');
	$slider_pager = get_option($optPre.'slider_pager');
	$slider_controls = get_option($optPre.'slider_controls');
	$slider_nextText = get_option($optPre.'slider_nextText');
	$slider_prevText = get_option($optPre.'slider_prevText');
	$slider_autoControls = get_option($optPre.'slider_autoControls');
	$slider_auto = get_option($optPre.'slider_auto');
	$slider_autoDirection = get_option($optPre.'slider_autoDirection');
	$slider_autoHover = get_option($optPre.'slider_autoHover');
	$slider_height = get_option($optPre.'slider_height');
	$slider_category_opt = get_option($optPre.'slider_category_opt');
	?>
	<div class="wrap">
        <h2>Simple Slider Settings</h2> 

        <form method="POST" action="">

        	<div class="slider_opt">
	    		<table width="100%" style="text-align:left;" class="form-table">
	    			<tr>
	    				<th>Zoom Slider</th>
	    				<td><input type="radio" class="slider_opt_radio" name="slider_category_opt" value="zoom_slider" <?php echo ( $slider_category_opt == 'zoom_slider' ) ? 'checked' : '' ; ?> /></td>
	    			</tr>
	    			<tr>
	    				<th>Bxslider</th>
	    				<td><input type="radio" class="slider_opt_radio" name="slider_category_opt" value="bxslider" <?php echo ( $slider_category_opt == 'bxslider' ) ? 'checked' : '' ; ?> /></td>
	    			</tr>
	    		</table>
	    	</div>


        	<div id="zoom_slider_opt" class="admin_option_wrapper" <?php echo ( $slider_category_opt == 'zoom_slider' ) ? 'style="display:block"' : 'style="display:none"' ; ?>>
        		<table width="100%" style="text-align:left;" class="form-table">
	    			<tr>
	    				<th>Slider Height<br/><small>Type 'px' value</small></th>
	    				<td><input type="text" name="zoom_slider_height_opt" value="<?php echo $zoom_slider_height; ?>" /></td>
	    			</tr>
	    			<tr>
	    				<th>Slider Skin</th>
	    				<td>
	    					<?php $skinarr = array('generous' , 'majestic' , 'opportune'); ?>
	    					<select name="zoom_slider_skin">
	    						<option for="">Select Skin</option>
	    						<?php
	    							foreach ($skinarr as $skin) :
	    								$selectedSkin = ( $skin == $zoom_slider_skin ) ? 'selected' : '' ; 
	    						?>
	    							<option for="<?php echo $skin; ?>"><?php echo ucfirst($skin); ?></option>
	    						<?php endforeach; ?>
	    					</select>
	    				</td>
	    			</tr>
	    		</table>
        	</div>

        	<div id="bxslider_opt" class="admin_option_wrapper" <?php echo ( $slider_category_opt == 'bxslider' ) ? 'style="display:block"' : 'style="display:none"' ; ?> >
        		<h3>General Options</h3>
        		<table width="100%" style="text-align:left;" class="form-table">
        			<tr>
        				<th>Slider Height<br/><small>Type 'px' value</small></th>
        				<td><input type="text" name="slider_height_opt" value="<?php echo $slider_height; ?>" /></td>
        			</tr>
        			<tr>
        				<th>Mode<br/><small>Type of transition between slides</small></th>
        				<td>
        					<?php $sliderModeArray = array('horizontal' , 'vertical' , 'fade'); ?>
        					<select id="slider_mode_opt" name="slider_mode_opt">
        						<?php 
        							foreach ($sliderModeArray as $sliderMode) {	
        								$selected = ($slider_mode == $sliderMode) ? 'selected' : '' ;
        						?>
        							<option for="<?php echo $sliderMode; ?>" <?php echo $selected; ?>><?php echo $sliderMode; ?></option>
        						<?php } ?>
        					</select>
        				</td>
        			</tr>
        			<tr>
        				<th>Speed<br/><small>Slide transition duration (in ms)</small></th>
        				<td><input type="text" name="slider_speed_opt" value="<?php echo $slider_speed; ?>" /></td>
        			</tr>
        			<tr>
        				<th>Random Start<br/><small>Start slider on a random slide</small></th>
        				<td><input type="checkbox" name="slider_randomStart_opt" value="true" <?php if ($slider_randomStart == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Infinite Loop<br/><small>If check, clicking "Next" while on the last slide will transition to the first slide and vice-versa</small></th>
        				<td><input type="checkbox" name="slider_infiniteLoop_opt" value="true" <?php if ($slider_infiniteLoop == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Easing<br/><small>The type of "easing" to use during transitions.</small></th>
        				<td>
        					<?php $easingArray = array('linear','ease','ease-in','ease-out','ease-in-out'); ?>
        					<select id="slider_easing_opt" name="slider_easing_opt">
        						<?php 
        							foreach ($easingArray as $easing) {	 
        								$selected = ($slider_easing == $easing) ? 'selected' : '' ;
        						?>
        							<option for="<?php echo $easing; ?>" <?php echo $selected; ?>><?php echo $easing; ?></option>
        						<?php } ?>
        					</select>
        				</td>
        			</tr>
        			<tr>
        				<th>Adaptive Height<br/><small>Dynamically adjust slider height based on each slide's height</small></th>
        				<td><input type="checkbox" name="slider_adaptiveHeight_opt" value="true" <?php if ($slider_adaptiveHeight == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Responsive<br/><small>Enable or disable auto resize of the slider. Useful if you need to use fixed width sliders.</small></th>
        				<td><input type="checkbox" name="slider_responsive_opt" value="true" <?php if ($slider_responsive == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Touch Enabled<br/><small>If check, slider will allow touch swipe transitions</small></th>
        				<td><input type="checkbox" name="slider_touchEnabled_opt" value="true" <?php if ($slider_touchEnabled == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Prevent Default SwipeX<br/><small>If check, touch screen will not move along the x-axis as the finger swipes</small></th>
        				<td><input type="checkbox" name="slider_preventDefaultSwipeX_opt" value="true" <?php if ($slider_preventDefaultSwipeX == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Prevent Default SwipeY<br/><small>If check, touch screen will not move along the y-axis as the finger swipes</small></th>
        				<td><input type="checkbox" name="slider_preventDefaultSwipeY_opt" value="true" <?php if ($slider_preventDefaultSwipeY == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr> 
        		</table>

        		<hr />

        		<h3>Controls Options</h3>
        		<table width="100%" style="text-align:left;" class="form-table">
        			<tr>
        				<th>Pager<br/><small>If check, a pager will be added</small></th>
        				<td><input type="checkbox" name="slider_pager_opt" value="true" <?php if ($slider_pager == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Controls<br/><small>If check, "Next" / "Prev" controls will be added</small></th>
        				<td><input type="checkbox" name="slider_controls_opt" value="true" <?php if ($slider_controls == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Next Text<br/><small>Text to be used for the "Next" control</small></th>
        				<td><input type="text" name="slider_nextText_opt" value="<?php echo $slider_nextText; ?>" /></td>
        			</tr>
        			<tr>
        				<th>Prev Text<br/><small>Text to be used for the "Prev" control</small></th>
        				<td><input type="text" name="slider_prevText_opt" value="<?php echo $slider_prevText; ?>" /></td>
        			</tr>
        			<tr>
        				<th>Auto Controls<br/><small>If check, "Start" / "Stop" controls will be added</small></th>
        				<td><input type="checkbox" name="slider_autoControls_opt" value="true" <?php if ($slider_autoControls == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Auto<br/><small>Slides will automatically transition</small></th>
        				<td><input type="checkbox" name="slider_auto_opt" value="true" <?php if ($slider_auto == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        			<tr>
        				<th>Auto Direction<br/><small>The direction of auto show slide transitions</small></th>
        				<td>
        					<?php $autoDirectionArray = array('next','prev'); ?>
        					<select id="slider_autoDirection_opt" name="slider_autoDirection_opt">
        						<?php 
        							foreach ($autoDirectionArray as $autoDirection) { 
        								$selected = ($slider_autoDirection == $autoDirection) ? 'selected' : '' ;
        						?>
        							<option for="<?php echo $autoDirection; ?>" <?php echo $selected; ?>><?php echo $autoDirection; ?></option>
        						<?php } ?>
        					</select>
        				</td>
        			</tr>
        			<tr>
        				<th>Auto Hover<br/><small>Auto show will pause when mouse hovers over slider</small></th>
        				<td><input type="checkbox" name="slider_autoHover_opt" value="true" <?php if ($slider_autoHover == 'true' ) { ?>checked="checked"<?php }?> /></td>
        			</tr>
        		</table>
        	</div>
        	<p>
	        	<input type="hidden" name="update_settings" value="Y" />
			    <input type="submit" value="Save settings" class="button-primary"/>
			</p>
        </form>
    </div>

	<?php
		if (isset($_POST["update_settings"])) {
			//Options Value
			$slider_mode_opt = $_POST['slider_mode_opt'];
			$slider_speed_opt = $_POST['slider_speed_opt'];
			$slider_randomStart_opt = $_POST['slider_randomStart_opt'];
			$slider_infiniteLoop_opt = $_POST['slider_infiniteLoop_opt'];
			$slider_easing_opt = $_POST['slider_easing_opt'];
			$slider_adaptiveHeight_opt = $_POST['slider_adaptiveHeight_opt'];
			//$slider_video_opt = $_POST['slider_video_opt'];
			$slider_responsive_opt = $_POST['slider_responsive_opt'];
			$slider_touchEnabled_opt = $_POST['slider_touchEnabled_opt'];
			$slider_preventDefaultSwipeX_opt = $_POST['slider_preventDefaultSwipeX_opt'];
			$slider_preventDefaultSwipeY_opt = $_POST['slider_preventDefaultSwipeY_opt'];
			$slider_pager_opt = $_POST['slider_pager_opt'];
			$slider_controls_opt = $_POST['slider_controls_opt'];
			$slider_nextText_opt = $_POST['slider_nextText_opt'];
			$slider_prevText_opt = $_POST['slider_prevText_opt'];
			$slider_autoControls_opt = $_POST['slider_autoControls_opt'];
			$slider_auto_opt = $_POST['slider_auto_opt'];
			$slider_autoDirection_opt = $_POST['slider_autoDirection_opt'];
			$slider_autoHover_opt = $_POST['slider_autoHover_opt'];
			$slider_height_opt = $_POST['slider_height_opt'];
			$slider_category_opt = $_POST['slider_category_opt'];

			//Update Options
			update_option($optPre."slider_mode", $slider_mode_opt);
			update_option($optPre."slider_speed", $slider_speed_opt);

			if( $slider_randomStart_opt == 'true' ){
				update_option($optPre."slider_randomStart", $slider_randomStart_opt);
			} else {
				update_option($optPre."slider_randomStart", 'false');
			}

			if( $slider_infiniteLoop_opt == 'true' ){
				update_option($optPre."slider_infiniteLoop", $slider_infiniteLoop_opt);
			}else{
				update_option($optPre."slider_infiniteLoop", 'false');
			}

			update_option($optPre."slider_easing", $slider_easing_opt);

			if( $slider_adaptiveHeight_opt == 'true' ){
				update_option($optPre."slider_adaptiveHeight", $slider_adaptiveHeight_opt);
			}else {
				update_option($optPre."slider_adaptiveHeight", 'false');
			}

			/*if( $slider_video_opt == 'true' ){
				update_option($optPre."slider_video", $slider_video_opt);
			}else{
				update_option($optPre."slider_video", 'false');
			}*/

			if( $slider_responsive_opt == 'true' ){
				update_option($optPre."slider_responsive", $slider_responsive_opt);
			}else{
				update_option($optPre."slider_responsive", 'false');
			}

			if( $slider_touchEnabled_opt == 'true' ){
				update_option($optPre."slider_touchEnabled", $slider_touchEnabled_opt);
			}else{
				update_option($optPre."slider_touchEnabled", 'false');
			}

			if( $slider_preventDefaultSwipeX_opt == 'true' ){
				update_option($optPre."slider_preventDefaultSwipeX", $slider_preventDefaultSwipeX_opt);
			}else{
				update_option($optPre."slider_preventDefaultSwipeX", 'false');
			}

			if( $slider_preventDefaultSwipeY_opt == 'true' ){
				update_option($optPre."slider_preventDefaultSwipeY", $slider_preventDefaultSwipeY_opt);
			}else{
				update_option($optPre."slider_preventDefaultSwipeY", 'false');
			}

			if( $slider_pager_opt == 'true' ){
				update_option($optPre."slider_pager", $slider_pager_opt);
			}else{
				update_option($optPre."slider_pager", 'false');
			}

			if( $slider_controls_opt == 'true' ){
				update_option($optPre."slider_controls", $slider_controls_opt);
			}else{
				update_option($optPre."slider_controls", 'false');
			}

			update_option($optPre."slider_nextText", $slider_nextText_opt);
			update_option($optPre."slider_prevText", $slider_prevText_opt);

			if( $slider_autoControls_opt == 'true' ){
				update_option($optPre."slider_autoControls", $slider_autoControls_opt);
			}else{
				update_option($optPre."slider_autoControls", 'false');
			}

			if( $slider_auto_opt == 'true' ){
				update_option($optPre."slider_auto", $slider_auto_opt);
			}else{
				update_option($optPre."slider_auto", 'false');
			}

			update_option($optPre."slider_autoDirection", $slider_autoDirection_opt);

			if( $slider_autoHover_opt == 'true' ){
				update_option($optPre."slider_autoHover", $slider_autoHover_opt);
			}else{
				update_option($optPre."slider_autoHover", 'false');
			}

			update_option($optPre."slider_height", $slider_height_opt);
			update_option($optPre."slider_category_opt", $slider_category_opt);		

			echo '<script type="text/javascript">window.location.reload();</script>';
		}
}