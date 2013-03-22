<?php

/* ---------------------------------------------------------------------- */
/*	Events
/* ---------------------------------------------------------------------- */

// Register Custom Post Type: 'Events'
function sp_register_post_type_events() {

	$labels = array(
		'name'               => __( 'Events', 'sptheme' ),
		'singular_name'      => __( 'Events', 'sptheme' ),
		'add_new'            => __( 'Add New', 'sptheme' ),
		'add_new_item'       => __( 'Add New Event', 'sptheme' ),
		'edit_item'          => __( 'Edit Event', 'sptheme' ),
		'new_item'           => __( 'New Event', 'sptheme' ),
		'view_item'          => __( 'View Event', 'sptheme' ),
		'search_items'       => __( 'Search Events', 'sptheme' ),
		'not_found'          => __( 'No Events found', 'sptheme' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'sptheme' ),
		'parent_item_colon'  => __( 'Parent Event:', 'sptheme' ),
		'menu_name'          => __( 'Events', 'sptheme' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'events-categories' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'events' ),
		'capability_type'     => 'post',
		'menu_position'       => null,
		'menu_icon'           => SP_BASE_URL . 'framework/assets/img/icon-event.png'
	);

	register_post_type( 'events', $args );

} 
add_action('init', 'sp_register_post_type_events');

// Register Taxonomy: 'Categories'
function sp_register_events_taxonomy_categories() {

	$labels = array(
		'name'                       => __( 'Categories', 'sptheme' ),
		'singular_name'              => __( 'Category', 'sptheme' ),
		'search_items'               => __( 'Search Categories', 'sptheme' ),
		'popular_items'              => __( 'Popular Categories', 'sptheme' ),
		'all_items'                  => __( 'All Categories', 'sptheme' ),
		'parent_item'                => __( 'Parent Category', 'sptheme' ),
		'parent_item_colon'          => __( 'Parent Category:', 'sptheme' ),
		'edit_item'                  => __( 'Edit Category', 'sptheme' ),
		'update_item'                => __( 'Update Category', 'sptheme' ),
		'add_new_item'               => __( 'Add New Category', 'sptheme' ),
		'new_item_name'              => __( 'New Category', 'sptheme' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'sptheme' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'sptheme' ),
		'choose_from_most_used'      => __( 'Choose from most used Categories', 'sptheme' ),
		'menu_name'                  => __( 'Categories', 'sptheme' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_tagcloud'     => false,
		'hierarchical'      => true,
		'rewrite'           => array( 'slug' => 'events-category' ),
		'query_var'         => true
	);

	register_taxonomy( 'events-categories', array('events'), $args );

} 
add_action( 'init', 'sp_register_events_taxonomy_categories' );

// Custom colums for 'Events'
function sp_edit_events_columns() {

	$columns = array(
		'cb'                   => '<input type="checkbox" />',
		'thumbnail'            => __( 'Thumbnail', 'sptheme' ),
		'title'                => __( 'Name', 'sptheme' ),
		'events-categories' => __( 'Categories', 'sptheme' )
	);

	return $columns;

}
add_action('manage_edit-events_columns', 'sp_edit_events_columns');

// Custom colums content for 'Events'
function sp_manage_events_columns( $column, $post_id ) {

	global $post;

	switch ( $column ) {

		case 'thumbnail':

			echo '<a href="' . get_edit_post_link( $post_id ) . '">' . get_the_post_thumbnail( $post_id, array(50, 50), array( 'title' => get_the_title( $post_id ) ) ) . '</a>';

			break;
		
		case 'events-categories':

			$terms = get_the_terms( $post_id, 'events-categories' );

			if ( empty( $terms ) )
				break;

				$out = array();

				foreach ( $terms as $term ) {
					
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'events-categories' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'events-categories', 'display' ) )
					);

				}

				echo join( ', ', $out );

			break;	

		default:
			break;
	}

}
add_action('manage_events_posts_custom_column', 'sp_manage_events_columns', 10, 2);