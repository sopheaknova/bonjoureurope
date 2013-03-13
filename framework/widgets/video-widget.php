<?php

add_action('widgets_init', 'sp_video_widgets');

function sp_video_widgets() {
	register_widget('sp_Video_Widgets');
	}

class sp_Video_Widgets extends WP_Widget {
	
	/**
	 * Widget setup.
	 */
	function sp_Video_Widgets() {
	
		/* Widget settings. */
		$widget_ops = array('classname' => 'o2-videos', 'description' => esc_html__('A widget that allows to view video to be added to a sidebar', 'sptheme'));
		
		/* Create the widget. */
		$this->WP_Widget('o2-videos', sprintf( esc_html__('%s: Video', 'sptheme'), THEME_NAME ), $widget_ops );
		
		}
		
	function widget( $args, $instance) {
		extract ($args);
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
		$type = $instance['type'];
		$id = $instance['id'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after define by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;
?>

	<?php if($type == 'Youtube') { ?>
		<iframe width="300" height="200" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
	<?php } elseif($type == 'Vimeo') { ?>
	<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="300" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	<?php } elseif($type == 'Dialymotion') { ?>
	<iframe frameborder="0" width="300" height="200" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
	<?php } ?>

<?php 			
		/* After widget (defined by themes). */		
		echo $after_widget;
	}	
	
	/**
	 * Update the widget settings.
	 */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = strip_tags( $new_instance['type'] );
		$instance['id'] = strip_tags( $new_instance['id'] );
		
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */	
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Video', 'sptheme'),);
		$instance = wp_parse_args( (array) $instance, $defaults); ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'sptheme') ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

	<p>
<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('type', 'sptheme') ?></label>
<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
<option <?php if ( 'Youtube' == $instance['type'] ) echo 'selected="selected"'; ?>>Youtube</option>
<option <?php if ( 'Vimeo' == $instance['type'] ) echo 'selected="selected"'; ?>>Vimeo</option>
<option <?php if ( 'Dialymotion' == $instance['type'] ) echo 'selected="selected"'; ?>>Dialymotion</option>
</select>
	</p>

		<p>
	<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Video ID:', 'sptheme') ?></label>
		<input id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" class="widefat" />
		</p>

        
	   <?php 
    }
} //end class