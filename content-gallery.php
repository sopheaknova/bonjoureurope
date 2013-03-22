<div class="entry-body">
	<?php if(is_single()) { ?>
		<h1 class="title"><?php the_title(); ?></h1>
    <?php } else {?>
    	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		<h1 class="title"><?php the_title(); ?></h1>
	</a>
    <?php } ?>

	<div class="entry-content">
	<?php echo sp_post_content(); ?>
    </div><!-- end .entry-content -->
    <div class="clear"></div>
    
    <ul class="galleries clearfix">
    <?php 
	$output = '';
	$album_imgs =  rwmb_meta( 'sp_album_images', $args = array('type' => 'plupload_image') ); 
	foreach ( $album_imgs as $image )
	{
		$output .= '<li>';	
		$output .= '<a href="'. $image['full_url'] .  '" rel="wp-prettyPhoto[gallery]">';
		$output .= '<img src="' . aq_resize( $image['full_url'], 200, 130, true ) . '" />';
		$output .= '</a></li>';
	}
	echo $output;
	?>
    </ul><!-- end .galleries -->

</div><!-- end .entry-body -->