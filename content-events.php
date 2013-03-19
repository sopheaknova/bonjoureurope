<div class="entry-body">
	
	<h1 class="title"><?php the_title(); ?></h1>
    
    <div class="entry-meta">
    	<?php
		$neat_event = sp_get_custom_field( 'sp_neat_event', $post->ID );
		$start_date = sp_get_custom_field( 'sp_event_start_date', $post->ID );
		$end_date = sp_get_custom_field( 'sp_event_end_date', $post->ID );
		
		echo sp_events_meta($neat_event, $start_date, $end_date); 
		?>
    </div><!-- end .entry-meta --> 

	<div class="entry-content">
	<?php echo sp_post_content(); ?>
    </div><!-- end .entry-content -->

</div><!-- end .entry-body -->