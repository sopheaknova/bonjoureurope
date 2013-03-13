<?php 

add_action('widgets_init','sp_training_register_widget');

function sp_training_register_widget() {
	register_widget('sp_training_register_widget');
	}

class sp_training_register_widget extends WP_Widget {
	function sp_training_register_widget() {
			
		$widget_ops = array('classname' => 'services-signup-widget','description' => __('Widget display as text and html','sptheme'));
		$this->WP_Widget('welcome-msg', sprintf( esc_html__('%s: Register for traning', 'sptheme'), THEME_NAME ), $widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$txt = $instance['txt'];
		$signup_btn = $instance['signup_btn'];
		$link_btn = $instance['link_btn'];
		
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		echo $txt; 
	?>
        <a class="button large" href="<?php echo $link_btn; ?>"><?php echo $signup_btn; ?></a>
	<?php	
		 echo $after_widget;
		
		/* After widget (defined by themes). */
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['txt'] = $new_instance['txt'];
		$instance['signup_btn'] = $new_instance['signup_btn'];
		$instance['link_btn'] = $new_instance['link_btn'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Please join us!','sptheme'),
			'txt' => '',
			'signup_btn' => __('REGISTER TODAY','sptheme'),
			'link_btn' => ''
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>
        
    	<p>
        <textarea id="<?php echo $this->get_field_id( 'txt' ); ?>" name="<?php echo $this->get_field_name( 'txt' ); ?>" class="widefat" cols="20" rows="16"><?php echo $instance['txt']; ?></textarea>
        </p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'signup_btn' ); ?>"><?php _e('Button text:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'signup_btn' ); ?>" name="<?php echo $this->get_field_name( 'signup_btn' ); ?>" value="<?php echo $instance['signup_btn']; ?>" class="widefat" />
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'link_btn' ); ?>"><?php _e('Button link:','sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'link_btn' ); ?>" name="<?php echo $this->get_field_name( 'link_btn' ); ?>" value="<?php echo $instance['link_btn']; ?>" class="widefat" />
		</p>


   <?php 
}
	} //end class