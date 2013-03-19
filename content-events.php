<div class="entry-body">
	
	<h1 class="title"><?php the_title(); ?></h1>
    
    <div class="entry-meta">
		<span>Event date: </span>
		<span>
		<?php 
		$long_start_date = sp_get_custom_field( 'sp_event_start_date', $post->ID ); 
		$start_date = explode('-', $long_start_date);
		echo $start_date[0] . ' ' . date( 'M', mktime(0, 0, 0, $start_date[1]) );
		?>
        </span> 
        
        <?php if ( sp_get_custom_field( 'sp_neat_event', $post->ID ) ) : ?>
        
        	<?php if ( sp_get_custom_field( 'sp_event_end_date', $post->ID ) != '' ) { ?>	
            &mdash; <span>
            <?php
			$long_end_date = sp_get_custom_field( 'sp_event_end_date', $post->ID ); 
			$end_date = explode('-', $long_end_date);
			echo $end_date[0] . ' ' . date( 'M', mktime(0, 0, 0, $end_date[1]) );
			?>
        	</span>
            <?php } ?>
            
        <?php endif; ?>
    </div><!-- end .entry-meta -->

	<div class="entry-content">
	<?php echo sp_post_content(); ?>
    </div><!-- end .entry-content -->

</div><!-- end .entry-body -->