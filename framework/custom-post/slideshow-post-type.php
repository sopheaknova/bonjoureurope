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
		'supports'            => array('title', 'thumbnail', 'page-attributes'),
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

/*-------------------------------------------------------------------------------*/
/*  Enable Sorting of the Slideshow 
/*-------------------------------------------------------------------------------*/

add_action('admin_menu', 'sp_slideshow_register_menu');

function sp_slideshow_register_menu() {
	$order_page 	= add_submenu_page(
						'edit.php?post_type=slideshow',
						'Order Slider',
						'Order',
						'edit_pages', 'slider-order',
						'sp_slideshow_order_page'
					);
	
	add_action( 'admin_print_scripts-'.$order_page, 'sp_slideshow_admin_print_scripts' );
}

// Save Post Data
		
add_action( 'wp_ajax_slideshow_update_post_order', 'sp_slideshow_update_post_order' );

function sp_slideshow_update_post_order() {
	global $wpdb;

	$post_type     = $_POST['postType'];
	$order        = $_POST['order'];
	
	foreach( $order as $menu_order => $post_id )
	{
		$post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
		$menu_order     = intval($menu_order);
		wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
	}

	die( '1' );
}

// Build the 'Ordering' Page
function sp_slideshow_order_page() {
	global $post;
?>
	<div class="wrap">
		<div id="icon-edit" class="icon32 icon32-posts-slideshow"><br></div><h2>Slideshow List</h2>
		<h2>Order Slideshow</h2>
		<p>Simply drag the Slideshow member up or down and they will be saved in that order.</p>
	<?php $sp_query = new WP_Query( array( 'post_type' => 'slideshow', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) );
		  if( $sp_query->have_posts() ) : ?>

		<table class="wp-list-table widefat fixed posts" id="sortable-table">
			<thead>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-photo">Thumbnail</th>
					<th class="column-name">Name</th>
				</tr>
			</thead>
			<tbody data-post-type="product">
			<?php while( $sp_query->have_posts() ) : $sp_query->the_post();
				  $custom = get_post_custom();
			?>
				<tr id="post-<?php the_ID(); ?>">
					<td class="column-order"><img src="<?php echo SP_BASE_URL . 'framework/assets/img/icon-move.png'; ?>" title="" alt="Move Icon" width="24" height="24" class="" /></td>
					<td class="column-photo"><?php echo '<a href="' . get_edit_post_link( $post->ID ) . '">' . get_the_post_thumbnail( $post->ID, array(50, 50), array( 'title' => get_the_title( $post->ID ) ) ) . '</a>'; ?></td>
					<td class="column-name"><strong><?php the_title(); ?></strong></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-photo">Thumbnail</th>
					<th class="column-name">Name</th>
				</tr>
			</tfoot>

		</table>

	<?php else: ?>

		<p>No staff members found, why not <a href="post-new.php?post_type=slideshow">create one?</a></p>

	<?php endif; ?>
	<?php wp_reset_postdata(); // Don't forget to reset again! ?>
	</div><!-- .wrap -->

<?php

}

function sp_slideshow_admin_print_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('sp_slideshow_sort', SP_BASE_URL . 'framework/assets/js/cpt-order-admin-scripts.js');
}

/*function sp_print_sort_styles() {
    wp_enqueue_style('nav-menu');
}*/
