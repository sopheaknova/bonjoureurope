<?php 

add_action('widgets_init','sp_newsletter');

function sp_newsletter() {
	register_widget('sp_newsletter');
	}

class sp_newsletter extends WP_Widget {
	function sp_newsletter() {
			
		$widget_ops = array('classname' => 'newsletter-widget','description' => __('Widget display the Subscribe box','sptheme'));
		$this->WP_Widget('newsletter', sprintf( esc_html__('%s: Newsletter', 'sptheme'), THEME_NAME ), $widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$feed_url = $instance['feed_url'];
?>

		<div id="email-subscribe">
        <div class="icon-email-newsletter"><?php _e( 'Want to be notified when we updated? Enter your email address below to be the first to know.', 'sptheme' ); ?></div>
        <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed_url; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
            <label for="email"><?php _e( 'Email subscription', 'sptheme' ); ?></label>
            <input type="text" name="email" value="<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;" onblur="if (this.value == '') {this.value = '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;';}" onfocus="if (this.value == '<?php _e( 'Enter your email', 'sptheme' ); ?>&#8230;') {this.value = '';}" class="youremail" />
            <input type="hidden" name="loc" value="en_US"/>
			<input type="hidden" value="<?php echo $feed_url; ?>" name="uri"/>
            <input type="submit" value="signup" class="subscribe-btn" />
        </form> 
        </div><!--end #email-subscribe -->

<?php 
		/* After widget (defined by themes). */
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['feed_url'] = $new_instance['feed_url'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
			'msg' => __('Subscribe to our newsletter', 'sptheme'),
			'feed_url' => 'novacambodia'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
    	<p>
		<label for="<?php echo $this->get_field_id( 'feed_url' ); ?>"><?php _e('feedburner name: (your name without http://feeds.feedburner.com/) ', 'sptheme'); ?></label>
		<input id="<?php echo $this->get_field_id( 'feed_url' ); ?>" name="<?php echo $this->get_field_name( 'feed_url' ); ?>" value="<?php echo $instance['feed_url']; ?>" class="widefat" />
		</p>


   <?php 
}
	} //end class