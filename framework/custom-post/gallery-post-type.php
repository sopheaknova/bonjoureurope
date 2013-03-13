<?php

/* ---------------------------------------------------------------------- */
/*	Gallery
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Gallery'
function sp_register_post_type_gallery() {

	$labels = array(
		'name'               => __( 'Gallery', 'sptheme' ),
		'singular_name'      => __( 'Gallery', 'sptheme' ),
		'add_new'            => __( 'Add New Album', 'sptheme' ),
		'add_new_item'       => __( 'Add New Album', 'sptheme' ),
		'edit_item'          => __( 'Edit Album', 'sptheme' ),
		'new_item'           => __( 'New Album', 'sptheme' ),
		'view_item'          => __( 'View Album', 'sptheme' ),
		'search_items'       => __( 'Search Album', 'sptheme' ),
		'not_found'          => __( 'No Album found', 'sptheme' ),
		'not_found_in_trash' => __( 'No Album found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Album:', 'sptheme' ),
		'menu_name'          => __( 'Gallery', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title'),
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
		'rewrite'             => array( 'slug' => 'gallery' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-gallery.png'
	);

	register_post_type( 'gallery', $args );

} 
add_action('init', 'sp_register_post_type_gallery');

// Custom colums for 'gallery'
function sp_edit_gallery_columns() {

	$columns = array(
		'cb'          => '<input type="checkbox" />',
		'thumbnail'   => __( 'Cover Album', 'sptheme' ),
		'title'       => __( 'Name', 'sptheme' ),		
		'photo_number' => __( 'Photo number', 'sptheme' ),
		'shortcode'   => __( 'Shortcode', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-gallery_columns', 'sp_edit_gallery_columns');

// Custom colums content for 'gallery'
function sp_manage_gallery_columns( $column, $post_id ) {

	global $post;

	$album = get_post_meta( $post->ID, 'sp_album_images', false );
	$photo_number = count( $album );
			
	switch ( $column ) {

		case 'thumbnail':
			
			//echo wp_get_attachment_link( $album[0], array(100,50) );
			echo '<a href="' . get_edit_post_link( $post_id ) . '" title="Edit ' . get_the_title( $post_id ) . '">' . wp_get_attachment_image( $album[0], array(50, 50) ) . '</a>';

			break;
		
		case 'photo_number':
			
			echo $photo_number;

			break;
		
		case 'shortcode':
			
			echo '<span class="shortcode-field">[album_name id="'. $post->post_name . '"]</span>';

			break;	
		
		default:
			break;
	}

}
add_action('manage_gallery_posts_custom_column', 'sp_manage_gallery_columns', 10, 2);

// Sortable custom columns for 'gallery'
function sp_sortable_gallery_columns( $columns ) {

	$columns['photo_number'] = 'photo_number';

	return $columns;

}
add_action('manage_edit-gallery_sortable_columns', 'sp_sortable_gallery_columns');

// Change default title for 'gallery'
function sp_change_gallery_title( $title ){

	$screen = get_current_screen();

	if ( $screen->post_type == 'gallery' )
		$title = __('Enter gallery name here', 'sptheme');

	return $title;

}

add_filter('enter_title_here', 'sp_change_gallery_title');