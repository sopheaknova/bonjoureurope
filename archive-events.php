<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="<?php echo sp_check_sidebar_position(); ?>">

	<div class="container content-inner clearfix">

		<?php get_sidebar('event'); ?>
        
		<section class="main">
		
        <h1 class="title-mod"><?php _e( 'Events Archive', 'sptheme' ); ?></h1>


		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

					<?php get_template_part( 'content', 'events' ); ?>

				</article><!-- end .hentry -->

			<?php endwhile; ?>

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
		

			</section><!-- end #main -->

			<?php get_sidebar(); ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
