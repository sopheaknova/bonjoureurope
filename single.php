<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container clearfix">

		<?php if( $has_sidebar ): ?>

			<section id="main">

		<?php endif; ?>
		

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

				<?php get_template_part( 'content', get_post_format() ); ?>

			</article><!-- end .hentry -->
			
			<?php //if ( comments_open() && '0' != get_comments_number() ) comments_template( '', true ); ?>

		<?php endwhile; ?>
		

		<?php if( $has_sidebar ): ?>

			</section><!-- end #main -->

			<?php get_sidebar(); ?>

		<?php endif; ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
