<?php

add_action('widgets_init', 'sp_text_image_widgets');

function sp_text_image_widgets() {
	register_widget('text_image');
	}

class text_image extends WP_Widget
{
    function text_image() 
    {
        $widget_ops = array( 
            'classname' => 'text-image', 
            'description' => __( 'Arbitrary link with a simple image.', 'sptheme' )
        );

        $control_ops = array( 'id_base' => 'text-image', 'width' => 330 );

        $this->WP_Widget( 'text-image', sprintf( __( '%s: Text With Image', 'sptheme' ), THEME_NAME ), $widget_ops, $control_ops );      
        
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_script( 'media-upload' );
        add_action( 'admin_print_footer_scripts', array( &$this, 'add_script_textimage' ), 999 );
    }
    
    function add_script_textimage()
    {
        ?>   
        <script type="text/javascript">                 

            jQuery(document).ready(function($){
                             
                 $('.upload-image').live('click', function(){
                    var betterwork_this_object = $(this).prev();
                    
                    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');    
                
                    window.send_to_editor = function(html) {
                        imgurl = $('img', html).attr('src');
                        betterwork_this_object.val(imgurl);
                        
                        tb_remove();
                    }          
                    
                    return false;
                });
                
  
            });  
        </script> 
        <?php
    }
    
    function form( $instance )
    {
        global $icons_name;
        
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => '',
            'image' => '',
			'link'	=> ''
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        <p>
            <label>
                <strong><?php _e( 'Title', 'sptheme' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>                  
        
        <p>
            <label><?php _e( 'Image', 'sptheme' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
                <a href="media-upload.php?type=image&TB_iframe=true" class="upload-image button-secondary">Upload</a>
            </label>
        </p>
        
        <p>
            <label>
                <strong><?php _e( 'Link', 'sptheme' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
            </label>
        </p>
        
        <p>
        <textarea id="<?php echo $this->get_field_id( 'txt' ); ?>" name="<?php echo $this->get_field_name( 'txt' ); ?>" class="widefat" cols="20" rows="16"><?php echo $instance['txt']; ?></textarea>
        </p>
                 
        <?php
    }
    
    function widget( $args, $instance )
    {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );
		$link = esc_attr($instance['link']);
		$txt = $instance['txt'];
		
		echo $before_widget;                   
		
		/* Title of widget (before and after define by theme). */
		if ( $link ) :
			if ( $title )
				echo $before_title . '<a href="' . $link . '" title="' . $instance['title'] . '">' . $title . '</a>' . $after_title;
				
			$widget_body = '<a href="' . $link . '" title="' . $instance['title'] . '"><img src="' . aq_resize( $instance['image'], 300, 9999, true ) . '" alt="' . $instance['title'] . '" /></a>';
			echo apply_filters( 'widget_text', $widget_body );
			
		else:
			if ( $title )
				echo $before_title . $title . $after_title;
				
			$widget_body = '<img src="' . aq_resize( $instance['image'], 300, 9999, true ) . '" alt="' . $instance['title'] . '" />';
			echo apply_filters( 'widget_text', $widget_body );
		endif;
		
		echo $txt;
        
        echo $after_widget;
    }                     

    function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['image'] = $new_instance['image'];
        
        $instance['link'] = $new_instance['link'];
		
		$instance['txt'] = $new_instance['txt'];

        return $instance;
    }
    
}     
?>
