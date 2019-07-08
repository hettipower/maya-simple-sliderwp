<?php



	

// Register Custom Post Type

function ms_slider_func() {



	$labels = array(

		'name'                  => _x( 'Sliders', 'Post Type General Name', 'wp-plugin' ),

		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'wp-plugin' ),

		'menu_name'             => __( 'Slider', 'wp-plugin' ),

		'name_admin_bar'        => __( 'Slider', 'wp-plugin' ),

		'archives'              => __( 'Item Archives', 'wp-plugin' ),

		'parent_item_colon'     => __( 'Parent Item:', 'wp-plugin' ),

		'all_items'             => __( 'All Items', 'wp-plugin' ),

		'add_new_item'          => __( 'Add New Item', 'wp-plugin' ),

		'add_new'               => __( 'Add New', 'wp-plugin' ),

		'new_item'              => __( 'New Item', 'wp-plugin' ),

		'edit_item'             => __( 'Edit Item', 'wp-plugin' ),

		'update_item'           => __( 'Update Item', 'wp-plugin' ),

		'view_item'             => __( 'View Item', 'wp-plugin' ),

		'search_items'          => __( 'Search Item', 'wp-plugin' ),

		'not_found'             => __( 'Not found', 'wp-plugin' ),

		'not_found_in_trash'    => __( 'Not found in Trash', 'wp-plugin' ),

		'featured_image'        => __( 'Featured Image', 'wp-plugin' ),

		'set_featured_image'    => __( 'Set featured image', 'wp-plugin' ),

		'remove_featured_image' => __( 'Remove featured image', 'wp-plugin' ),

		'use_featured_image'    => __( 'Use as featured image', 'wp-plugin' ),

		'insert_into_item'      => __( 'Insert into item', 'wp-plugin' ),

		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-plugin' ),

		'items_list'            => __( 'Items list', 'wp-plugin' ),

		'items_list_navigation' => __( 'Items list navigation', 'wp-plugin' ),

		'filter_items_list'     => __( 'Filter items list', 'wp-plugin' ),

	);

	$args = array(

		'label'                 => __( 'Slider', 'wp-plugin' ),

		'description'           => __( 'Slider', 'wp-plugin' ),

		'labels'                => $labels,

		'supports'              => array( 'title', 'editor' ),

		'hierarchical'          => false,

		'public'                => true,

		'show_ui'               => true,

		'show_in_menu'          => true,

		'menu_position'         => 5,

		'menu_icon'             => 'dashicons-format-gallery',

		'show_in_admin_bar'     => true,

		'show_in_nav_menus'     => true,

		'can_export'            => true,

		'has_archive'           => true,		

		'exclude_from_search'   => true,

		'publicly_queryable'    => true,

		'capability_type'       => 'post',

	);

	register_post_type( 'ms-slider', $args );



}

add_action( 'init', 'ms_slider_func', 0 );



function ms_slider_type_metaboxes( $meta_boxes ) {

	$prefix = 'mss_cmb_'; // Prefix for all fields

	$meta_boxes['ms_slider_type_content'] = array(

    	'id' => 'ms_slider_type_content',

	    'title' => 'Slider Content',

	    'pages' => array('ms-slider'), 

		'context' => 'normal',

		'priority' => 'high',

		'show_names' => true, 

		'fields' => array(

			array(

			    'name' => 'Slider Image',

			    'desc' => 'Upload an image.',

			    'id' => $prefix . 'slider_image',

			    'type' => 'file',

			    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )

			),

			/*array(

			    'name' => 'Slider Video',

			    'desc' => 'Upload a video.',

			    'id' => $prefix . 'slider_video',

			    'type' => 'file',

			    'allow' => array( 'attachment' ) // limit to just attachments with array( 'attachment' )

			),*/

			array(

			    'name'    => 'Slider Content Position',

			    'desc'    => 'Select Position',

			    'id'      => $prefix . 'content_position',

			    'type'    => 'select',

			    'options' => array(

			        'left_side' => __( 'Left', 'cmb2' ),

			        'right_side'   => __( 'Right', 'cmb2' ),

			        'center'     => __( 'Center', 'cmb2' ),

			    ),

			    'default' => 'custom',

			),

		),

	);

	

	return $meta_boxes;

}

add_filter( 'cmb_meta_boxes' , 'ms_slider_type_metaboxes' );