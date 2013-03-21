<?php 

add_action('widgets_init','sp_widget_post_event');

function sp_widget_post_event() {
	register_widget('sp_widget_post_event');
	
	}

class sp_widget_post_event extends WP_Widget {
	function sp_widget_post_event() {
			
		$widget_ops = array('classname' => 'posts-event-widget','description' => __('Widget display post Events from a certain category in current month','sptheme'));
		$this->WP_Widget('sp-post-event', sprintf( esc_html__('%s: Post Event by Category', 'sptheme'), THEME_NAME ), $widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$count = $instance['count'];
		$category = $instance['category'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			global $post;
?>

		<ul class="event-posts-widget">
		<?php 
        
		$args = array(
			'posts_per_page' => (int) $count,
			'post_type' => 'events',
			'tax_query' => array(
				array(
					'taxonomy' => 'events-categories',
					'field' => 'id',
					'terms' => $category
				)
			),
			'meta_query' => array(
				array(
					'key' => 'sp_event_start_date',
					'value' => date('M'),
					'compare' => 'LIKE'
				)
			),
			'orderby' => 'rand',
			'no_found_rows' => true,
		);
		
		$query = new WP_Query( $args  );
		
        if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
			$post_thumb = get_post_thumbnail_id( $post->ID );
			$image_src = wp_get_attachment_image_src($post_thumb, 'blog-post-left');
        ?>

		<li>       
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <a href="<?php get_permalink(); ?>"><img src="<?php echo $image_src[0]; ?>" /></a>
		</li>

		<?php endwhile; ?>
        <?php  else:  ?>
        <!-- Else in here -->
        <?php  endif; ?>
        <?php wp_reset_postdata(); ?>
		</ul>

<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = $new_instance['count'];
		$instance['category'] = $new_instance['category'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Events in this month','sptheme'), 
			'count' => 3,
 			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
	
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>
        <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('select category:','sptheme'); ?></label>
        <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" class="widefat">
        <?php 
			$options_categories = array();  
			$event_categories = get_terms( 'events-categories', array('order_by' => 'id') ); 
			foreach( $event_categories as $category ) {
				$options_categories[$category->term_taxonomy_id] = $category->name;
		?>
        <option <?php if ( $options_categories[$category->term_taxonomy_id] == $instance['category'] ) echo 'selected="selected"'; ?> value="<?php echo $category->term_taxonomy_id; ?>">
		<?php echo $options_categories[$category->term_taxonomy_id]; ?>
        </option>
        <?php		
			}
		?>
		</select>
		</p>
        
       <p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number Of Events:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>
   <?php  
}
	} //end class
	
	