<?php
// Register Custom Post Type
function ms_slider_func() {
	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'maya' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'maya' ),
		'menu_name'             => __( 'Slider', 'maya' ),
		'name_admin_bar'        => __( 'Slider', 'maya' ),
		'archives'              => __( 'Item Archives', 'maya' ),
		'parent_item_colon'     => __( 'Parent Item:', 'maya' ),
		'all_items'             => __( 'All Items', 'maya' ),
		'add_new_item'          => __( 'Add New Item', 'maya' ),
		'add_new'               => __( 'Add New', 'maya' ),
		'new_item'              => __( 'New Item', 'maya' ),
		'edit_item'             => __( 'Edit Item', 'maya' ),
		'update_item'           => __( 'Update Item', 'maya' ),
		'view_item'             => __( 'View Item', 'maya' ),
		'search_items'          => __( 'Search Item', 'maya' ),
		'not_found'             => __( 'Not found', 'maya' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maya' ),
		'featured_image'        => __( 'Featured Image', 'maya' ),
		'set_featured_image'    => __( 'Set featured image', 'maya' ),
		'remove_featured_image' => __( 'Remove featured image', 'maya' ),
		'use_featured_image'    => __( 'Use as featured image', 'maya' ),
		'insert_into_item'      => __( 'Insert into item', 'maya' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'maya' ),
		'items_list'            => __( 'Items list', 'maya' ),
		'items_list_navigation' => __( 'Items list navigation', 'maya' ),
		'filter_items_list'     => __( 'Filter items list', 'maya' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'maya' ),
		'description'           => __( 'Slider', 'maya' ),
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

add_action( 'cmb2_admin_init', 'ms_slider_metaboxes' );
function ms_slider_metaboxes() {

	$prefix = 'mss_cmb_'; // Prefix for all fields
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'ms_slider_type_content',
		'title'         => __( 'Slider Content', 'maya' ),
		'object_types'  => array( 'ms-slider', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Slider Image', 'maya' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'maya' ),
		'id' => $prefix . 'slider_image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Slider Image (Mobile)', 'maya' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'maya' ),
		'id' => $prefix . 'slider_image_mobile',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name'             => esc_html__( 'Slider Content Position', 'maya' ),
		'desc'             => esc_html__( 'Select Position', 'maya' ),
		'id'               => $prefix . 'content_position',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'left_side' => esc_html__( ' Left', 'maya' ),
			'right_side'   => esc_html__( 'Right', 'maya' ),
			'center'     => esc_html__( 'Center', 'maya' ),
		),
	) );

}