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
	
    <div class="entry-link">
	<?php 
	$source_meta = sp_get_custom_field( 'sp_news_source', $post->ID );
	$link_meta = sp_get_custom_field( 'sp_news_file', $post->ID );
	$file_url = wp_get_attachment_image_src($link_meta, 'full'); 
	?>
    <?php if ($file_url[0] != '') :?>
    <p>
    <a href="<?php echo $file_url[0]; ?>" rel="wp-prettyPhoto" class="newspaper"><?php _e('View the source file','sptheme'); ?></a>
    <span class="news-source"><strong>Source:</strong> <?php echo $source_meta; ?></span>
    </p>
    <?php endif; ?>
    </div>

</div><!-- end .entry-body -->