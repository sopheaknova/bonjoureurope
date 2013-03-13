<?php

/* ---------------------------------------------------------------------- */
/*	Slideshow
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Slideshow'
function sp_register_post_type_slideshow() {

	$labels = array(
		'name'               => __( 'Slideshows', 'sptheme' ),
		'singular_name'      => __( 'Slideshow', 'sptheme' ),
		'add_new'            => __( 'Add New', 'sptheme' ),
		'add_new_item'       => __( 'Add New Slideshow', 'sptheme' ),
		'edit_item'          => __( 'Edit Slideshow', 'sptheme' ),
		'new_item'           => __( 'New Slideshow', 'sptheme' ),
		'view_item'          => __( 'View Slideshow', 'sptheme' ),
		'search_items'       => __( 'Search Slideshows', 'sptheme' ),
		'not_found'          => __( 'No Slideshows found', 'sptheme' ),
		'not_found_in_trash' => __( 'No Slideshows found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Slideshow:', 'sptheme' ),
		'menu_name'          => __( 'Slideshows', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title', 'thumbnail'),
		'taxonomies'          => array(''),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'slideshow' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-slideshow.png'
	);

	register_post_type( 'slideshow', $args );

} 
add_action('init', 'sp_register_post_type_slideshow');

// Custom colums for 'Slideshow'
function sp_edit_slideshow_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'title'       => __( 'Name', 'sptheme' ),
		'thumbnail'   => __( 'Thumbnail', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-slideshow_columns', 'sp_edit_slideshow_columns');

// Custom colums content for 'Slideshow'
function sp_manage_slideshow_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'thumbnail':
			
			/* Frist line get image from Featured Image*/
			echo '<a href="' . get_edit_post_link( $post_id ) . '">' . get_the_post_thumbnail( $post_id, array(200, 86), array( 'title' => get_the_title( $post_id ) ) ) . '</a>';

		default:
			break;
	}

}
add_action('manage_slideshow_posts_custom_column', 'sp_manage_slideshow_columns', 10, 2);

// Change default title for 'Slideshow'
function sp_change_slideshow_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'slideshow' )
		$title = __('Enter slideshow name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_slider_title');