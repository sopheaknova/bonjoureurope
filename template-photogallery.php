<?php
/*
Template Name: Gallery Page
*/
?>

<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="<?php echo sp_check_sidebar_position(); ?>">

	<div class="container content-inner clearfix">

		<?php if( $has_sidebar ): ?>
		
		<?php get_sidebar('left'); ?>
        
			<section class="main">

		<?php endif; ?>
		

		<div class="entry-body">
        	<?php while ( have_posts() ): the_post(); ?>
        	<h1 class="page-title"><?php echo the_title(); ?></h1>	
            <?php remove_filter( 'the_content', 'wpautop' ); the_content(); ?>
			<div class="clear"></div>
			<p><?php edit_post_link( __( 'Edit', 'sptheme' ), '', '' ); ?></p>
            <?php endwhile; ?>
            
            <?php 
			$album_query = (array('post_type'=>'gallery', 'paged' => $paged, 'posts_per_page' => 14));
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			query_posts($album_query);
			
			if (have_posts()) : 
			?>
            <ul class="galleries clearfix">
            
			<?php
			while(have_posts()) : the_post();
			$post_thumb = get_post_thumbnail_id( $post->ID );
			$image_src = wp_get_attachment_image_src($post_thumb, 'large');
			$image = aq_resize( $image_src[0], 200, 130, true ); //resize & crop the image
			?>
            
			
				<li>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                </a>
                <span class="album-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
				</li>
			
            <?php endwhile; ?>
            </ul><!-- end .galleries -->
            <?php // Pagination
				if(function_exists('wp_pagenavi'))
					wp_pagenavi();
				else 
					echo sp_pagination();
			?>		
          <?php else: ?>
		
                <article id="post-0" class="post no-results not-found">
            
                    <h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>
    
                </article><!-- end .hentry -->
    
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            
        </div><!-- end .entry-body -->

		
		

		<?php if( $has_sidebar ): ?>

			</section><!-- end #main -->
			
			<?php get_sidebar(); ?>

		<?php endif; ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
