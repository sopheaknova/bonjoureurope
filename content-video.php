<div class="entry-body">
	<?php if(is_single()) { ?>
		<h1 class="title"><?php the_title(); ?></h1>
    <?php } else {?>
    	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		<h1 class="title"><?php the_title(); ?></h1>
	</a>
    <?php } ?>
    <div class="entry-meta">
    
        <?php echo sp_post_meta(); ?>
    
    </div><!-- end .entry-meta -->
     
    <?php
	if ( is_singular() ) {
		
	$vtype = sp_get_custom_field( 'sp_video_type', $post->ID );
	$vId = get_post_meta($post->ID, 'sp_video_id', true);
	?> 
     
    <?php if( $vId ) { ?>
    <div class="entry-video">
    <?php if ( $vtype == 'youtube' ) { ?>
    <iframe width="600" height="338" src="http://www.youtube.com/embed/<?php echo $vId; ?>?rel=0" frameborder="0" allowfullscreen></iframe>		
    <?php } elseif($vtype == 'vimeo') { ?>
	<iframe src="http://player.vimeo.com/video/<?php echo $vId; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="600" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	<?php } elseif($vtype == 'daily') { ?>
<iframe frameborder="0" width="600" height="338" src="http://www.dailymotion.com/embed/video/<?php echo $vId ?>?logo=0"></iframe>
	<?php } ?>
	</div><!-- end .entry-video -->
    <?php } 
	}
	?>

	<div class="entry-content">
	<?php echo sp_post_content(); ?>
    </div><!-- end .entry-content -->

</div><!-- end .entry-body -->